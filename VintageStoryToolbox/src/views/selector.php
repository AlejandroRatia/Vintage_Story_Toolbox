<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vintage Story Toolbox</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/auxCSS.css">
    <link rel="icon" type="image/png" href="/public/images/misc/icon.ico">
</head>
<body>
    <main class="d-flex flex-column align-items-center justify-content-center min-vh-100 px-3" role="main">

        <div class="mb-3" aria-hidden="true">
            <img src="/public/images/misc/vintagestorytoolbox.png"
                 alt="Logo de Vintage Story Toolbox"
                 width="400" height="400"
                 style="filter: drop-shadow(0 2px 8px rgba(200,160,112,0.3));">
        </div>

        <h1 class="fs-4 fw-bold text-center mb-1 vst-brand">
            Vintage Story Toolbox
        </h1>
        <p class="text-center mb-4 vst-text-muted" style="font-size: 14px;">
            Selecciona una herramienta para comenzar
        </p>

        <hr class="vst-divider" style="width: 200px;">

        <nav aria-label="Herramientas disponibles" class="mt-4">
            <div class="row g-3" style="max-width: 480px;">

                <div class="col-6">
                    <a href="index.php?controller=alloy&action=index"
                       class="d-flex flex-column align-items-start gap-2 p-3 rounded-3 text-decoration-none h-100 vst-card"
                       aria-label="Abrir calculadora de aleaciones">
                        <div class="p-2 rounded-2 vst-icon-bg" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="13" width="5" height="6" rx="1" fill="#C8A070"/>
                                <rect x="9" y="9" width="5" height="10" rx="1" fill="#D4B896"/>
                                <rect x="15" y="5" width="4" height="14" rx="1" fill="#C8A070"/>
                                <line x1="3" y1="4" x2="19" y2="4" stroke="#C8A070" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <p class="fw-medium mb-0" style="font-size: 15px;">Calculadora de aleaciones</p>
                        <p class="mb-0 vst-text-muted" style="font-size: 13px; line-height: 1.5;">
                            Calcula pepitas, unidades y tandas a partir de lingotes.
                        </p>
                    </a>
                </div>

                <div class="col-6">
                    <a href="index.php?controller=route&action=generador"
                       class="d-flex flex-column align-items-start gap-2 p-3 rounded-3 text-decoration-none h-100 vst-card"
                       aria-label="Abrir generador de hojas de ruta">
                        <div class="p-2 rounded-2 vst-icon-bg" aria-hidden="true">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="11" r="2.5" fill="#C8A070"/>
                                <circle cx="11" cy="6" r="2.5" fill="#D4B896"/>
                                <circle cx="11" cy="16" r="2.5" fill="#D4B896"/>
                                <circle cx="18" cy="11" r="2.5" fill="#C8A070"/>
                                <line x1="6.5" y1="11" x2="8.5" y2="7.5" stroke="#D4B896" stroke-width="1.2"/>
                                <line x1="6.5" y1="11" x2="8.5" y2="14.5" stroke="#D4B896" stroke-width="1.2"/>
                                <line x1="13.5" y1="7.5" x2="15.5" y2="10" stroke="#D4B896" stroke-width="1.2"/>
                                <line x1="13.5" y1="14.5" x2="15.5" y2="12" stroke="#D4B896" stroke-width="1.2"/>
                            </svg>
                        </div>
                        <p class="fw-medium mb-0" style="font-size: 15px;">Generador de hojas de ruta</p>
                        <p class="mb-0 vst-text-muted" style="font-size: 13px; line-height: 1.5;">
                            Planifica materiales y árboles de fabricación.
                        </p>
                    </a>
                </div>

            </div>
        </nav>

        <footer class="mt-5">
            <p class="vst-text-muted text-center" style="font-size: 12px;">
                Vintage Story Toolbox · Proyecto académico DAW/DAM
            </p>
        </footer>

    </main>

    <script src="/public/js/bootstrap.bundle.min.js"></script>
</body>
</html>