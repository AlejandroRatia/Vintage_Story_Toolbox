<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generador de Hojas de Ruta · VST</title>
  <link rel="stylesheet" href="/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/css/auxCSS.css">
</head>
<body>
  <nav class="vst-navbar px-4 py-3 d-flex align-items-center justify-content-between" role="navigation" aria-label="Navegación principal">
    <a href="index.php?controller=route&action=selector" class="vst-brand fs-5">VSToolbox</a>
    <div class="d-flex align-items-center gap-3">
      <button class="vst-btn-outline" onclick="toggleExpandAll()" id="expandAllBtn">Expandir todo</button>
      <button class="vst-btn-danger" onclick="vaciarPlanificador()" id="clearBtn" style="display:none;">Vaciar</button>
      <a href="index.php?controller=route&action=selector" aria-label="Volver al inicio">← Volver</a>
    </div>
  </nav>

  <main class="container py-4" role="main">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <div>
        <h1 class="fs-4 fw-bold mb-1 vst-brand">Generador de Hojas de Ruta</h1>
        <p class="vst-text-muted mb-0" style="font-size: 14px;">Selecciona los objetos que quieres fabricar.</p>
      </div>
      <button class="vst-btn" onclick="abrirPanel()" aria-label="Abrir panel de búsqueda">
        + Añadir objeto
      </button>
    </div>

    <div id="globalCard" style="display:none;" class="vst-card rounded-3 p-4 mb-4">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="fs-6 fw-bold mb-0 vst-brand">Materiales base totales</h2>
        <span class="vst-text-muted" style="font-size: 12px;">Suma de todos los objetos</span>
      </div>
      <div id="globalMaterials" class="row g-2"></div>
    </div>

    <div id="itemCards"></div>

    <div id="emptyState" class="text-center py-5">
      <p class="vst-text-muted" style="font-size: 14px;">No hay objetos en el planificador.<br>Pulsa "+ Añadir objeto" para empezar.</p>
    </div>
  </main>

  <div id="searchPanel" style="display:none;" role="dialog" aria-modal="true" aria-label="Panel de búsqueda">
    <div id="searchPanelOverlay" onclick="cerrarPanel()"></div>
    <div id="searchPanelContent">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="fs-6 fw-bold mb-0 vst-brand">Seleccionar objeto</h2>
        <button onclick="cerrarPanel()" class="vst-btn-close" aria-label="Cerrar panel">✕</button>
      </div>
      <div class="mb-3">
        <input type="text"
          id="searchInput"
          class="vst-input"
          placeholder="Buscar objeto..."
          oninput="buscarItems(this.value)"
          aria-label="Buscar objeto">
      </div>
      <div id="searchSpinner" class="vst-spinner mx-auto mb-3" role="status" aria-label="Buscando..."></div>
      <div id="searchResults"></div>
    </div>
  </div>

  <script src="/public/js/bootstrap.bundle.min.js"></script>
  <script>
    // Estado
    let plannerData  = {};   // { itemId: { id, name, image, quantity, tree, baseMaterials } }
    let allExpanded  = false;
    let searchTimer  = null;

    // Panel de búsqueda
    function abrirPanel() {
      document.getElementById('searchPanel').style.display = 'flex';
      document.getElementById('searchInput').focus();
      document.getElementById('searchResults').innerHTML = '';
      document.getElementById('searchInput').value = '';
    }

    function cerrarPanel() {
      document.getElementById('searchPanel').style.display = 'none';
    }

    // Buscar con debounce
    function buscarItems(query) {
      clearTimeout(searchTimer);
      if (query.length < 2) {
        document.getElementById('searchResults').innerHTML = '';
        return;
      }
      document.getElementById('searchSpinner').style.display = 'block';
      searchTimer = setTimeout(async () => {
        try {
          const res = await fetch(`index.php?controller=crafting&action=buscar&nombre=${encodeURIComponent(query)}`);
          const items = await res.json();
          renderSearchResults(items);
        } catch (e) {
          document.getElementById('searchResults').innerHTML =
            '<p class="vst-text-muted" style="font-size:13px;">Error al buscar.</p>';
        } finally {
          document.getElementById('searchSpinner').style.display = 'none';
        }
      }, 300);
    }

    function renderSearchResults(items) {
      const container = document.getElementById('searchResults');
      if (items.length === 0) {
        container.innerHTML = '<p class="vst-text-muted" style="font-size:13px;">No se encontraron resultados.</p>';
        return;
      }

      container.innerHTML = items.map(item => `
        <div class="vst-search-result" onclick="seleccionarItem(${item.id}, '${escapeHtml(item.name)}', '${escapeHtml(item.image || '')}')">
          <div class="d-flex align-items-center gap-3">
            <div class="vst-item-thumb">
              ${item.image
                  ? `<img src="/public/images/${item.image}" alt="${escapeHtml(item.name)}" width="32" height="32" style="object-fit:contain;">`
                  : `<div class="vst-item-thumb-placeholder"></div>`
              }
            </div>
            <div>
              <div style="font-size:14px; color:var(--vst-text);">${escapeHtml(item.name)}</div>
              <div style="font-size:11px; color:var(--vst-text-muted);">${escapeHtml(item.category)}</div>
            </div>
          </div>
          ${plannerData[item.id] ? '<span class="vst-badge-added">Añadido</span>' : ''}
        </div>
      `).join('');
    }

    // Seleccionar item del panel
    async function seleccionarItem(id, name, image) {
      // Si ya está, solo cerramos el panel
      if (plannerData[id]) {
        cerrarPanel();
        return;
      }

      try {
        // Pedir árbol al servidor
        const res = await fetch(`index.php?controller=crafting&action=arbol&id=${id}&cantidad=1`);
        const data = await res.json();

        // Añadir al planificador de sesión
        const formData = new FormData();
        formData.append('id', id);
        formData.append('cantidad', 1);
        await fetch('index.php?controller=crafting&action=añadir', { method: 'POST', body: formData });

        // Guardar en estado local
        plannerData[id] = {
          id, name, image,
          quantity: 1,
          tree: data.tree,
          baseMaterials: data.baseMaterials
        };

        cerrarPanel();
        renderAll();

      } catch (e) {
        console.error('Error al añadir item:', e);
      }
    }

    // Cambiar cantidad de un item
    async function cambiarCantidad(id, quantity) {
      quantity = Math.max(1, parseInt(quantity) || 1);

      try {
        const res = await fetch(`index.php?controller=crafting&action=arbol&id=${id}&cantidad=${quantity}`);
        const data = await res.json();

        plannerData[id].quantity     = quantity;
        plannerData[id].tree         = data.tree;
        plannerData[id].baseMaterials = data.baseMaterials;

        renderAll();
      } catch (e) {
        console.error('Error al actualizar cantidad:', e);
      }
    }

    // Eliminar item
    async function eliminarItem(id) {
      const formData = new FormData();
      formData.append('id', id);
      await fetch('index.php?controller=crafting&action=eliminar', { method: 'POST', body: formData });

      delete plannerData[id];
      renderAll();
    }

    // Vaciar planificador
    async function vaciarPlanificador() {
      if (!confirm('¿Vaciar el planificador?')) return;
      await fetch('index.php?controller=crafting&action=vaciar', { method: 'POST' });
      plannerData = {};
      renderAll();
    }

    // Expandir / colapsar árbol
    function toggleTree(id) {
      const treeEl = document.getElementById(`tree_${id}`);
      const btnEl  = document.getElementById(`treebtn_${id}`);
      if (!treeEl) return;
      const isHidden = treeEl.style.display === 'none';
      treeEl.style.display = isHidden ? 'block' : 'none';
      btnEl.textContent = isHidden ? '▲ Ocultar árbol' : '▼ Ver árbol';
    }

    function toggleExpandAll() {
      allExpanded = !allExpanded;
      Object.keys(plannerData).forEach(id => {
        const treeEl = document.getElementById(`tree_${id}`);
        const btnEl  = document.getElementById(`treebtn_${id}`);
        if (treeEl) treeEl.style.display = allExpanded ? 'block' : 'none';
        if (btnEl)  btnEl.textContent = allExpanded ? '▲ Ocultar árbol' : '▼ Ver árbol';
      });
      document.getElementById('expandAllBtn').textContent = allExpanded ? 'Colapsar todo' : 'Expandir todo';
    }

    // Renderizar todo
    function renderAll() {
      const items = Object.values(plannerData);
      const isEmpty = items.length === 0;

      document.getElementById('emptyState').style.display  = isEmpty ? 'block' : 'none';
      document.getElementById('globalCard').style.display  = isEmpty ? 'none'  : 'block';
      document.getElementById('clearBtn').style.display    = isEmpty ? 'none'  : 'block';
      document.getElementById('expandAllBtn').style.display = isEmpty ? 'none' : 'inline-block';

      if (!isEmpty) {
        renderGlobalMaterials(items);
        renderItemCards(items);
      } else {
        document.getElementById('itemCards').innerHTML = '';
      }
    }

    // Card global de materiales
    function renderGlobalMaterials(items) {
      const global = {};
      items.forEach(item => {
        Object.entries(item.baseMaterials).forEach(([name, mat]) => {
          if (global[name]) {
            global[name].quantity += mat.quantity;
          } else {
            global[name] = { ...mat };
          }
        });
      });

      const container = document.getElementById('globalMaterials');
      container.innerHTML = Object.values(global).map(mat => `
        <div class="col-6 col-md-4 col-lg-3">
          <div class="vst-material-chip">
            ${mat.image
                ? `<img src="/public/images/${mat.image}" alt="${escapeHtml(mat.name)}" width="24" height="24" style="object-fit:contain;">`
                : ''
              }
            <span style="font-size:13px;">${escapeHtml(mat.name)}</span>
            <span class="vst-result-value" style="font-size:14px;">×${mat.quantity}</span>
          </div>
        </div>
      `).join('');
    }

    // Cards individuales
    function renderItemCards(items) {
      const container = document.getElementById('itemCards');
      container.innerHTML = items.map(item => `
        <div class="vst-card rounded-3 p-4 mb-3">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center gap-3">
                ${item.image
                  ? `<img src="/public/images/${item.image}" alt="${escapeHtml(item.name)}" width="40" height="40" style="object-fit:contain;">`
                  : ''
                }
              <div>
                <div class="fw-bold" style="color:var(--vst-text);">${escapeHtml(item.name)}</div>
                <div class="d-flex align-items-center gap-2 mt-1">
                  <span class="vst-text-muted" style="font-size:12px;">Cantidad:</span>
                  <input type="number"
                    value="${item.quantity}"
                    min="1"
                    class="vst-input-sm"
                    onchange="cambiarCantidad(${item.id}, this.value)"
                    aria-label="Cantidad de ${escapeHtml(item.name)}">
                </div>
              </div>
            </div>
            <button onclick="eliminarItem(${item.id})" class="vst-btn-close" aria-label="Eliminar ${escapeHtml(item.name)}">✕</button>
          </div>

          <!-- Materiales base del item -->
          <div class="mb-3">
            <div class="vst-text-muted mb-2" style="font-size:12px;">Materiales base:</div>
            <div class="d-flex flex-wrap gap-2">
              ${Object.values(item.baseMaterials).map(mat => `
                  <div class="vst-material-chip-sm">
                    ${mat.image
                      ? `<img src="/public/images/${mat.image}" alt="${escapeHtml(mat.name)}" width="18" height="18" style="object-fit:contain;">`
                      : ''
                    }
                    <span>${escapeHtml(mat.name)} ×${mat.quantity}</span>
                  </div>
              `).join('')}
            </div>
          </div>

          <!-- Botón árbol -->
          <button id="treebtn_${item.id}" class="vst-btn-outline" onclick="toggleTree(${item.id})">
            ▼ Ver árbol
          </button>

          <!-- Árbol de fabricación -->
          <div id="tree_${item.id}" style="display:none;" class="mt-3">
            <div class="vst-tree-container">
              ${renderTreeNode(item.tree)}
            </div>
          </div>
        </div>
      `).join('');
    }

    // Renderizar nodo del árbol (recursivo)
    function renderTreeNode(node) {
      const hasChildren = node.children && node.children.length > 0;
      return `
        <div class="vst-tree-node">
          <div class="vst-tree-item">
            ${node.image
              ? `<img src="/public/images/${node.image}" alt="${escapeHtml(node.name)}" width="28" height="28" style="object-fit:contain;">`
              : ''
            }
            <span style="font-size:13px; color:var(--vst-text);">${escapeHtml(node.name)}</span>
            <span class="vst-result-value" style="font-size:13px;">×${node.quantity}</span>
          </div>
          ${hasChildren ? `
            <div class="vst-tree-children">
              <div class="vst-tree-arrow">→</div>
              <div class="vst-tree-branch">
                ${node.children.map(child => renderTreeNode(child)).join('')}
              </div>
            </div>
          ` : ''}
        </div>
      `;
    }

    // Utilidades
    function escapeHtml(str) {
      if (!str) return '';
      return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }

    // Inicializar con datos de sesión si los hay
    <?php if (!empty($plannerItems)): ?>
    (async () => {
      const sessionItems = <?= json_encode(array_values($plannerItems)) ?>;
      for (const item of sessionItems) {
        try {
          const res = await fetch(`index.php?controller=crafting&action=arbol&id=${item.id}&cantidad=${item.quantity}`);
          const data = await res.json();
          plannerData[item.id] = {
            id: item.id,
            name: item.name,
            image: item.image,
            quantity: item.quantity,
            tree: data.tree,
            baseMaterials: data.baseMaterials
          };
        } catch(e) {
          console.error('Error al restaurar item de sesión:', e);
        }
      }
      renderAll();
    })();
    <?php endif; ?>
  </script>
</body>
</html>