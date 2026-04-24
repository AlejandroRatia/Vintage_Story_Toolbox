<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Aleaciones · VST</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/auxCSS.css">
</head>
<body>

    <nav class="vst-navbar px-4 py-3 d-flex align-items-center justify-content-between" role="navigation" aria-label="Navegación principal">
        <a href="index.php?controller=route&action=selector" class="vst-brand fs-5">
            VSToolbox
        </a>
        <a href="index.php?controller=route&action=selector" aria-label="Volver al inicio">
            ← Volver
        </a>
    </nav>

    <main class="container py-5" style="max-width: 560px;" role="main">

        <h1 class="fs-4 fw-bold mb-1 vst-brand">
            Calculadora de Aleaciones
        </h1>
        <p class="vst-text-muted mb-4" style="font-size: 14px;">
            Selecciona un metal e introduce la cantidad de lingotes que quieres producir.
        </p>

        <section class="vst-card rounded-3 p-4 mb-4" aria-label="Formulario de cálculo">

            <div class="mb-3">
                <label for="metalSelect" class="form-label vst-text-muted" style="font-size: 13px;">
                    Metal
                </label>
                <select id="metalSelect" class="vst-select" aria-required="true">
                    <option value="">-- Selecciona un metal --</option>
                    <?php foreach ($metals as $metal): ?>
                        <option value="<?= $metal->getId() ?>"
                                data-alloy="<?= $metal->isAlloy() ? 'true' : 'false' ?>">
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
                <label for="quantityInput" class="form-label vst-text-muted" style="font-size: 13px;">
                    Cantidad de lingotes
                </label>
                <input type="number"
                       id="quantityInput"
                       class="vst-input"
                       placeholder="Ej: 10"
                       min="1"
                       aria-required="true">
                <div id="quantityError" class="text-danger mt-1" style="font-size: 12px; display:none;">
                    Introduce una cantidad válida (mayor que 0).
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
                            <div class="vst-result-label">Pepitas</div>
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

            <div id="compositionSection" style="display:none;">
                <h2 class="fs-6 fw-bold mb-3 vst-brand">Composición de la aleación</h2>
                <div class="vst-card rounded-3 p-4">
                    <p class="vst-text-muted mb-3" style="font-size: 13px;">
                        Pepitas necesarias de cada componente:
                    </p>
                    <div id="compositionList"></div>
                </div>
            </div>

        </section>

    </main>

    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script>
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

            spinner.style.display = 'block';
            calcBtn.disabled = true;

            try {
                const res = await fetch(
                    `index.php?controller=alloy&action=calcular&id=${metalSelect.value}&cantidad=${qty}`
                );

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

        function mostrarResultado(data) {
            document.getElementById('resultSection').style.display = 'block';
            document.getElementById('resIngots').textContent  = data.ingots;
            document.getElementById('resNuggets').textContent = data.nuggets;
            document.getElementById('resUnits').textContent   = data.units;
            document.getElementById('resBatches').textContent = data.batches;

            const compSection = document.getElementById('compositionSection');
            const compList    = document.getElementById('compositionList');

            if (data.is_alloy && data.composition) {
                compList.innerHTML = '';
                for (const [metal, amount] of Object.entries(data.composition)) {
                    const row = document.createElement('div');
                    row.className = 'vst-composition-row';
                    if (typeof amount === 'object') {
                        row.innerHTML = `
                            <span style="font-size:14px;">${metal}</span>
                            <span class="vst-result-value" style="font-size:16px;">
                                ${amount.min} – ${amount.max} pepitas
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
                compSection.style.display = 'block';
            } else {
                compSection.style.display = 'none';
            }

            document.getElementById('resultSection').scrollIntoView({ behavior: 'smooth' });
        }
    </script>

</body>
</html>