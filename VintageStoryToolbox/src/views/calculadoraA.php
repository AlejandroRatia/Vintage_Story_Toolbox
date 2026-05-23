<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Aleaciones · VST</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/auxCSS.css">
    <link rel="icon" type="image/png" href="/public/images/misc/icon.ico">
</head>
<body>

    <nav class="vst-navbar px-4 py-3 d-flex align-items-center justify-content-between" role="navigation" aria-label="Navegación principal">
        <a href="index.php?controller=route&action=selector" class="vst-brand fs-5">VSToolbox</a>
        <a href="index.php?controller=route&action=selector" aria-label="Volver al inicio">← Volver</a>
    </nav>

    <main class="container py-5" style="max-width: 620px;" role="main">

        <h1 class="fs-4 fw-bold mb-1 vst-brand">Calculadora de Aleaciones</h1>
        <p class="vst-text-muted mb-4" style="font-size: 14px;">
            Selecciona un metal, introduce la cantidad de lingotes y ajusta las proporciones.
        </p>

        <section class="vst-card rounded-3 p-4 mb-4" aria-label="Formulario de cálculo">

            <div class="mb-3">
                <label for="metalSelect" class="form-label vst-text-muted" style="font-size: 13px;">Metal</label>
                <select id="metalSelect" class="vst-select" aria-required="true" onchange="onMetalChange()">
                    <option value="">-- Selecciona un metal --</option>
                    <?php foreach ($metals as $metal): ?>
                        <option value="<?= $metal->getId() ?>"
                                data-alloy="<?= $metal->isAlloy() ? 'true' : 'false' ?>"
                                data-composition="<?= htmlspecialchars(json_encode($metal->getComposition())) ?>">
                            <?= htmlspecialchars($metal->getName()) ?>
                            <?= $metal->isAlloy() ? '(Aleación)' : '' ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div id="metalError" class="text-danger mt-1" style="font-size: 12px; display:none;">
                    Por favor selecciona un metal.
                </div>
            </div>

            <div class="mb-4">
                <label for="quantityInput" class="form-label vst-text-muted" style="font-size: 13px;">Cantidad de lingotes</label>
                <input type="number" id="quantityInput" class="vst-input" placeholder="Ej: 10" min="1" aria-required="true" oninput="onQuantityChange()">
                <div id="quantityError" class="text-danger mt-1" style="font-size: 12px; display:none;">
                    Introduce una cantidad válida (mayor que 0).
                </div>
            </div>

            <div id="compositionSliders" style="display:none;" class="mb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <span class="vst-text-muted" style="font-size: 13px;">Proporciones de la aleación</span>
                </div>
                <div id="slidersContainer"></div>
                <div class="mt-3 p-3 rounded-2" style="background: var(--vst-bg); border: 1px solid var(--vst-border);">
                    <div class="d-flex justify-content-between" style="font-size: 13px;">
                        <span class="vst-text-muted">Total porcentaje:</span>
                        <span id="totalPercent" class="vst-result-value" style="font-size: 16px;">100%</span>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <button id="calcBtn" class="vst-btn" onclick="calcular()" aria-label="Calcular materiales necesarios">
                    Calcular
                </button>
                <div id="spinner" class="vst-spinner" role="status" aria-label="Calculando..."></div>
                <span id="errorMsg" class="text-danger" style="font-size: 13px; display:none;"></span>
            </div>

        </section>

        <section id="resultSection" style="display:none;" aria-live="polite" aria-label="Resultados del cálculo">

            <h2 class="fs-6 fw-bold mb-3 vst-brand">Resultado</h2>

            <div class="vst-card rounded-3 p-4 mb-3">
                <div class="row g-3 text-center">
                    <div class="col-4">
                        <div class="vst-result-card">
                            <div class="vst-result-value" id="resIngots">—</div>
                            <div class="vst-result-label">Lingotes</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="vst-result-card">
                            <div class="vst-result-value" id="resNuggets">—</div>
                            <div class="vst-result-label">Pepitas totales</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="vst-result-card">
                            <div class="vst-result-value" id="resUnits">—</div>
                            <div class="vst-result-label">Unidades</div>
                        </div>
                    </div>
                </div>

                <hr class="vst-divider my-3">

                <div class="text-center">
                    <div class="vst-result-value" id="resBatches">—</div>
                    <div class="vst-result-label">Tandas de crisol necesarias</div>
                </div>
            </div>

            <div id="compositionResult" style="display:none;">
                <h2 class="fs-6 fw-bold mb-3 vst-brand">Pepitas por componente</h2>
                <div class="vst-card rounded-3 p-4">
                    <div id="compositionResultList"></div>
                </div>
            </div>

        </section>

    </main>

    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script>
        const NUGGETS_PER_INGOT    = 20;
        const UNITS_PER_INGOT      = 100;
        const MAX_NUGGETS_PER_SLOT = 128;
        const SLOTS_PER_CRUCIBLE   = 4;
        const MAX_NUGGETS_PER_BATCH = MAX_NUGGETS_PER_SLOT * SLOTS_PER_CRUCIBLE; // 512

        let currentComposition = null;
        let sliderValues = {};
        let isUpdating = false;

        // Al cambiar el metal
        function onMetalChange() {
            const select = document.getElementById('metalSelect');
            const opt = select.options[select.selectedIndex];
            const isAlloy = opt.dataset.alloy === 'true';
            const compRaw = opt.dataset.composition;

            document.getElementById('compositionSliders').style.display = 'none';
            document.getElementById('resultSection').style.display = 'none';
            currentComposition = null;
            sliderValues = {};

            if (isAlloy && compRaw && compRaw !== 'null') {
                currentComposition = JSON.parse(compRaw);
                buildSliders();
                document.getElementById('compositionSliders').style.display = 'block';
            }
        }

        // Al cambiar la cantidad
        function onQuantityChange() {
            if (currentComposition) updateSliderLabels();
        }

        // Construir sliders
        function buildSliders() {
            const container = document.getElementById('slidersContainer');
            container.innerHTML = '';
            sliderValues = {};

            const metals = Object.keys(currentComposition);

            // Valor inicial: mínimo de cada componente
            metals.forEach(metal => {
                const range = currentComposition[metal];
                sliderValues[metal] = Array.isArray(range) ? range[0] : range;
            });

            // El componente con rango más alto absorbe el resto hasta llegar a 100
            const total = Object.values(sliderValues).reduce((s, v) => s + v, 0);
            const remainder = 100 - total;

            if (remainder !== 0) {
                // Encontrar el componente ajustable con mayor rango
                const adjustable = metals.filter(m => Array.isArray(currentComposition[m]));
                if (adjustable.length > 0) {
                    // Ordenar por rango máximo descendente
                    adjustable.sort((a, b) => currentComposition[b][1] - currentComposition[a][1]);
                    const biggest = adjustable[0];
                    const range = currentComposition[biggest];
                    sliderValues[biggest] = Math.min(range[1], Math.max(range[0], sliderValues[biggest] + remainder));
                }
            }

            // Normalizar para que sumen exactamente 100
            normalizeToHundred();

            metals.forEach(metal => {
                const range = currentComposition[metal];
                const isFixed = !Array.isArray(range);
                const min = isFixed ? range : range[0];
                const max = isFixed ? range : range[1];

                const div = document.createElement('div');
                div.className = 'mb-4';
                div.innerHTML = `
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span style="font-size: 14px; color: var(--vst-text);">${metal}</span>
                        <div class="d-flex align-items-center gap-2">
                            <span style="font-size: 12px; color: var(--vst-text-muted);">${min}% – ${max}%</span>
                            <span id="pct_${metal}" class="vst-result-value" style="font-size: 16px; min-width: 48px; text-align:right;">
                                ${sliderValues[metal]}%
                            </span>
                        </div>
                    </div>
                    <input type="range"
                           id="slider_${metal}"
                           class="vst-slider"
                           min="${min}"
                           max="${max}"
                           step="1"
                           value="${sliderValues[metal]}"
                           ${isFixed ? 'disabled' : ''}
                           oninput="onSliderChange('${metal}', this.value)">
                    <div class="d-flex justify-content-between mt-1" style="font-size: 11px; color: var(--vst-text-muted);">
                        <span>${min}%</span>
                        <span id="nuggets_${metal}" style="color: var(--vst-gold);">— pepitas</span>
                        <span>${max}%</span>
                    </div>
                `;
                container.appendChild(div);
            });

            updateSliderLabels();
        }

        // Mover un slider
        function onSliderChange(changedMetal, newValue) {
            if (isUpdating) return;
            isUpdating = true;

            newValue = parseInt(newValue);
            const oldValue = sliderValues[changedMetal];
            const delta = newValue - oldValue;

            // Metales ajustables excepto el que se está moviendo
            const others = Object.keys(currentComposition).filter(m => {
                if (m === changedMetal) return false;
                return Array.isArray(currentComposition[m]);
            });

            // Intentar distribuir el delta entre los otros
            let remaining = -delta;
            let actuallyDistributed = 0;

            for (let i = 0; i < others.length; i++) {
                const m = others[i];
                const range = currentComposition[m];
                const min = range[0];
                const max = range[1];

                // Cuánto puede absorber este slider
                const canAbsorb = remaining > 0
                    ? max - sliderValues[m]   // puede subir hasta max
                    : sliderValues[m] - min;  // puede bajar hasta min

                const share = i === others.length - 1
                    ? remaining  // el último absorbe todo lo que queda
                    : Math.round(remaining / (others.length - i));

                const actualShare = remaining > 0
                    ? Math.min(share, canAbsorb)
                    : Math.max(share, -canAbsorb);

                sliderValues[m] = sliderValues[m] + actualShare;
                actuallyDistributed += actualShare;
                remaining -= actualShare;

                const slider = document.getElementById(`slider_${m}`);
                if (slider) slider.value = sliderValues[m];
            }

            // Si no se pudo distribuir todo el delta, revertir el slider al máximo posible
            if (remaining !== 0) {
                const corrected = oldValue + delta + remaining;
                newValue = corrected;
            }

            sliderValues[changedMetal] = newValue;
            const slider = document.getElementById(`slider_${changedMetal}`);
            if (slider) slider.value = newValue;

            updateSliderLabels();
            isUpdating = false;
        }

        // Normalizar para que sumen 100
        function normalizeToHundred() {
            const metals = Object.keys(sliderValues);
            const total = metals.reduce((s, m) => s + sliderValues[m], 0);
            if (total === 100) return;

            // Ajustar el último metal ajustable
            const adjustable = metals.filter(m => Array.isArray(currentComposition[m]));
            if (adjustable.length === 0) return;

            const last = adjustable[adjustable.length - 1];
            const range = currentComposition[last];
            const corrected = sliderValues[last] + (100 - total);
            sliderValues[last] = Math.min(range[1], Math.max(range[0], corrected));
        }

        // Actualizar etiquetas de pepitas
        function updateSliderLabels() {
            const qty = parseInt(document.getElementById('quantityInput').value) || 0;
            const totalNuggets = qty * NUGGETS_PER_INGOT;

            let total = 0;
            Object.keys(sliderValues).forEach(metal => {
                const pct = sliderValues[metal];
                total += pct;
                const nuggets = qty > 0 ? Math.round(totalNuggets * pct / 100) : 0;

                const pctEl = document.getElementById(`pct_${metal}`);
                const nugEl = document.getElementById(`nuggets_${metal}`);
                if (pctEl) pctEl.textContent = pct + '%';
                if (nugEl) nugEl.textContent = qty > 0 ? nuggets + ' pepitas' : '— pepitas';
            });

            document.getElementById('totalPercent').textContent = total + '%';
        }

        // Calcular
        async function calcular() {
            const metalSelect   = document.getElementById('metalSelect');
            const quantityInput = document.getElementById('quantityInput');
            const metalError    = document.getElementById('metalError');
            const quantityError = document.getElementById('quantityError');
            const spinner       = document.getElementById('spinner');
            const calcBtn       = document.getElementById('calcBtn');
            const errorMsg      = document.getElementById('errorMsg');

            metalError.style.display    = 'none';
            quantityError.style.display = 'none';
            errorMsg.style.display      = 'none';

            let valid = true;
            if (!metalSelect.value) {
                metalError.style.display = 'block';
                valid = false;
            }
            const qty = parseInt(quantityInput.value);
            if (!qty || qty <= 0) {
                quantityError.style.display = 'block';
                valid = false;
            }
            if (!valid) return;

            // Validar composición si es aleación
            if (currentComposition) {
                const total = Object.values(sliderValues).reduce((s, v) => s + v, 0);
                if (total !== 100) {
                    errorMsg.textContent = 'La composición debe sumar exactamente 100%.';
                    errorMsg.style.display = 'block';
                    return;
                }
            }

            spinner.style.display = 'block';
            calcBtn.disabled = true;

            try {
                // Construir URL con composición personalizada si es aleación
                let url = `index.php?controller=alloy&action=calcular&id=${metalSelect.value}&cantidad=${qty}`;
                if (currentComposition) {
                    url += '&custom_composition=' + encodeURIComponent(JSON.stringify(sliderValues));
                }

                const res = await fetch(url);
                if (!res.ok) {
                    const err = await res.json();
                    throw new Error(err.error || 'Error desconocido');
                }

                const data = await res.json();
                mostrarResultado(data);

            } catch (e) {
                errorMsg.textContent = e.message;
                errorMsg.style.display = 'block';
            } finally {
                spinner.style.display = 'none';
                calcBtn.disabled = false;
            }
        }

        // Mostrar resultado
        function mostrarResultado(data) {
            document.getElementById('resultSection').style.display = 'block';
            document.getElementById('resIngots').textContent  = data.ingots;
            document.getElementById('resNuggets').textContent = data.nuggets;
            document.getElementById('resUnits').textContent   = data.units;
            document.getElementById('resBatches').textContent = data.batches;

            const compResult = document.getElementById('compositionResult');
            const compList   = document.getElementById('compositionResultList');

            if (data.is_alloy && data.composition) {
                compList.innerHTML = '';
                for (const [metal, amount] of Object.entries(data.composition)) {
                    const row = document.createElement('div');
                    row.className = 'vst-composition-row';
                    if (typeof amount === 'object') {
                        row.innerHTML = `
                            <span style="font-size:14px;">${metal}</span>
                            <span class="vst-result-value" style="font-size:16px;">
                                ${amount.nuggets} pepitas (${amount.percent}%)
                            </span>`;
                    } else {
                        row.innerHTML = `
                            <span style="font-size:14px;">${metal}</span>
                            <span class="vst-result-value" style="font-size:16px;">
                                ${amount} pepitas
                            </span>`;
                    }
                    compList.appendChild(row);
                }
                compResult.style.display = 'block';
            } else {
                compResult.style.display = 'none';
            }

            document.getElementById('resultSection').scrollIntoView({ behavior: 'smooth' });
        }
    </script>

</body>
</html>