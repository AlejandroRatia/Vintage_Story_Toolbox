<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vintage Story Toolbox</title>
    <link rel="stylesheet" href="public/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.rtl.min.css.map">
</head>
<body>
  <main class="d-flex flex-column align-items-center justify-content-center min-vh-100 px-3" role="main">
  <div class="mb-4 p-3 border rounded-3 bg-light" style="width: 96px; height: 96px; display: flex; align-items: center; justify-content: center;">
    <img src="public/images/logo.png" alt="Logo de Vintage Story" width="64" height="64">
    <!-- Sustituir por el logo real cuando esté disponible -->
  </div>

  <h1 class="fs-4 fw-medium text-center mb-1">Vintage Story Toolbox</h1>
  <p class="text-secondary text-center mb-4" style="font-size: 14px;">Selecciona una herramienta para comenzar</p>

    <nav aria-label="Herramientas disponibles">
      <div class="row g-3" style="max-width: 480px;">

        <div class="col-6">
          <a href="index.php?page=calculadora"
            class="d-flex flex-column align-items-start gap-2 p-3 border rounded-3 text-decoration-none h-100"
            aria-label="Abrir calculadora de aleaciones">
              <div class="p-2 rounded-2" style="background: #E6F1FB;" aria-hidden="true">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="3" y="13" width="5" height="6" rx="1" fill="#185FA5"/>
                    <rect x="9" y="9" width="5" height="10" rx="1" fill="#378ADD"/>
                    <rect x="15" y="5" width="4" height="14" rx="1" fill="#185FA5"/>
                    <line x1="3" y1="4" x2="19" y2="4" stroke="#378ADD" stroke-width="1.5" stroke-linecap="round"/>
                  </svg>
              </div>
              <p class="fw-medium mb-0" style="font-size: 15px; color: inherit;">Calculadora de aleaciones</p>
              <p class="mb-0 text-secondary" style="font-size: 13px; line-height: 1.5;">Calcula pepitas, unidades y tandas a partir de lingotes.</p>
          </a>
        </div>

        <div class="col-6">
            <a href="index.php?page=generador"
              class="d-flex flex-column align-items-start gap-2 p-3 border rounded-3 text-decoration-none h-100"
              aria-label="Abrir generador de hojas de ruta">
                <div class="p-2 rounded-2" style="background: #E1F5EE;" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="4" cy="11" r="2.5" fill="#0F6E56"/>
                        <circle cx="11" cy="6" r="2.5" fill="#1D9E75"/>
                        <circle cx="11" cy="16" r="2.5" fill="#1D9E75"/>
                        <circle cx="18" cy="11" r="2.5" fill="#0F6E56"/>
                        <line x1="6.5" y1="11" x2="8.5" y2="7.5" stroke="#1D9E75" stroke-width="1.2"/>
                        <line x1="6.5" y1="11" x2="8.5" y2="14.5" stroke="#1D9E75" stroke-width="1.2"/>
                        <line x1="13.5" y1="7.5" x2="15.5" y2="10" stroke="#1D9E75" stroke-width="1.2"/>
                        <line x1="13.5" y1="14.5" x2="15.5" y2="12" stroke="#1D9E75" stroke-width="1.2"/>
                    </svg>
                </div>
                <p class="fw-medium mb-0" style="font-size: 15px; color: inherit;">Generador de hojas de ruta</p>
                <p class="mb-0 text-secondary" style="font-size: 13px; line-height: 1.5;">Planifica materiales y árboles de fabricación.</p>
            </a>
        </div>

      </div>
    </nav>
  </main>

<script src="public/js/bootstrap.bundle.min.js"></script>
</body>
</html>