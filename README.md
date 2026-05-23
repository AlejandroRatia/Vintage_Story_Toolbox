# 🪓 Vintage Story Toolbox

> Herramientas web para planificar la fabricación de objetos en [Vintage Story](https://www.vintagestory.at/)

[![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.8-7952B3?logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![Docker](https://img.shields.io/badge/Docker-ready-2496ED?logo=docker&logoColor=white)](https://www.docker.com/)
[![License: CC BY-SA 3.0](https://img.shields.io/badge/License-CC%20BY--SA%203.0-lightgrey)](http://creativecommons.org/licenses/by-sa/3.0/es/)

---

## 🌐 Demo en producción

**[vintagestorytoolbox.infinityfreeapp.com](https://vintagestorytoolbox.infinityfreeapp.com)**

---

## 📖 Descripción

Vintage Story Toolbox (VST) es una aplicación web que facilita la planificación de recursos en el videojuego Vintage Story. El juego cuenta con un sistema de fabricación complejo donde obtener un objeto puede requerir múltiples procesos encadenados. VST recopila todas esas ramificaciones en una única hoja de ruta visual.

### Herramientas disponibles

| Herramienta | Descripción |
|---|---|
| ⚗️ **Calculadora de aleaciones** | Dado un metal y una cantidad de lingotes, calcula las pepitas, unidades equivalentes, tandas de crisol necesarias y la composición detallada por componente para aleaciones. |
| 🗺️ **Generador de hojas de ruta** | Busca objetos del juego y genera su árbol de fabricación completo (izquierda → derecha), desde el producto final hasta los materiales base, con un planificador de sesión para varios objetos simultáneos. |

---

## 🚀 Instalación local

### Requisitos previos

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) (v24.x o superior)
- [Git](https://git-scm.com/)
- Navegador moderno (Chrome, Firefox, Edge u Opera)

### Pasos

```bash
# 1. Clonar el repositorio
git clone https://gitlab.com/AlejandroRatia/vintage_story_toolbox.git
cd vintage_story_toolbox

# 2. Configurar las variables de entorno
cp .env.example .env

# 3. Arrancar los contenedores
docker compose up -d --build

# 4. Inicializar la base de datos
docker exec -i [nombre_contenedor_mysql] mysql -u root -padmin Vintage_Story_Toolbox < Ratia_Alejandro_bd.sql

# 5. Acceder a la aplicación
# http://localhost:8080
```

### Variables de entorno (`.env`)

| Variable | Valor por defecto | Descripción |
|---|---|---|
| `DB_HOST` | `db` | Servicio MySQL en Docker Compose |
| `DB_PORT` | `3306` | Puerto de MySQL |
| `DB_NAME` | `Vintage_Story_Toolbox` | Nombre de la base de datos |
| `DB_USER` | `root` | Usuario de MySQL |
| `DB_PASSWORD` | `admin` | Contraseña de MySQL |
| `APP_PORT` | `8080` | Puerto de acceso a la app |

---

## 🏗️ Arquitectura

El proyecto sigue el patrón **MVC** con un Front Controller único (`index.php`) que enruta las peticiones mediante `?controller=X&action=Y`.

```
VintageStoryToolbox/
├── docker/
│   └── Dockerfile
├── public/
│   ├── css/          # Bootstrap + estilos propios
│   ├── images/       # Imágenes del juego por categoría
│   └── js/           # Bootstrap bundle
├── src/
│   ├── config/
│   │   └── conexionBD.php        # Conexión PDO
│   ├── controllers/
│   │   ├── alloyController.php   # Calculadora de aleaciones
│   │   ├── craftingController.php # Generador de hojas de ruta
│   │   └── routeController.php   # Navegación entre vistas
│   ├── models/
│   │   ├── Metal.php             # Lógica de cálculo + constantes
│   │   ├── Item.php              # Objetos del juego
│   │   ├── CraftingRecipe.php    # Recetas de fabricación
│   │   ├── RecipeComponent.php   # Ingredientes de una receta
│   │   ├── CraftingTree.php      # Árbol recursivo de fabricación
│   │   └── Planner.php           # Gestión de $_SESSION
│   └── views/
│       ├── selector.php          # Pantalla de inicio
│       ├── calculadoraA.php      # Vista calculadora
│       └── generadorHR.php       # Vista generador
├── .env.example
├── index.php                     # Front Controller
├── php.ini
└── Ratia_Alejandro_bd.sql        # Export de la base de datos
```

### Enrutamiento

```
?controller=route&action=selector   → Pantalla de inicio (por defecto)
?controller=alloy&action=index      → Calculadora de aleaciones
?controller=alloy&action=calcular   → Cálculo (devuelve JSON)
?controller=crafting&action=index   → Generador de hojas de ruta
?controller=crafting&action=buscar  → Búsqueda de items (JSON)
?controller=crafting&action=arbol   → Árbol de fabricación (JSON)
?controller=crafting&action=añadir  → Añadir al planificador (POST)
?controller=crafting&action=eliminar → Eliminar del planificador (POST)
?controller=crafting&action=vaciar  → Vaciar planificador (POST)
```

---

## 🗄️ Base de datos

La base de datos `Vintage_Story_Toolbox` contiene cuatro tablas:

| Tabla | Registros | Descripción |
|---|---|---|
| `ITEM` | 158 | Todos los objetos del juego (materiales, herramientas, armas, armaduras...) |
| `CRAFTING_RECIPE` | 29 | Recetas de fabricación con estaciones de trabajo |
| `RECIPE_COMPONENT` | 39 | Ingredientes de cada receta (genera la recursividad del árbol) |
| `METAL` | 20 | Metales y aleaciones con composición en JSON |

### Constantes del juego (`Metal.php`)

```php
UNITS_PER_NUGGET      = 5    // 1 pepita = 5 unidades
NUGGETS_PER_INGOT     = 20   // 1 lingote = 20 pepitas
UNITS_PER_INGOT       = 100  // 1 lingote = 100 unidades
MAX_NUGGETS_PER_BATCH = 512  // Crisol: 4 ranuras × 128 pepitas
MAX_NUGGETS_PER_SLOT  = 128  // Capacidad por ranura
SLOTS_PER_CRUCIBLE    = 4    // Ranuras del crisol
```

---

## ♿ Accesibilidad

El proyecto implementa el nivel de conformidad **WCAG 2.1 AA**:

- ✅ Textos alternativos en todas las imágenes informativas
- ✅ Navegación completa por teclado
- ✅ Atributos ARIA en componentes dinámicos (`aria-label`, `aria-live`, `role`)
- ✅ Estructura semántica HTML5 (`header`, `main`, `nav`, `section`)
- ✅ Contraste texto/fondo superior a 4.5:1

---

## 🛠️ Stack tecnológico

| Tecnología | Versión | Uso |
|---|---|---|
| PHP | 8.2 | Backend y lógica de negocio (MVC) |
| MySQL | 8.0 | Base de datos relacional |
| Bootstrap | 5.3.8 | Framework CSS |
| Docker + Compose | Latest | Entorno de desarrollo |
| PDO | PHP 8.2 | Acceso a datos con sentencias preparadas |
| Git / GitLab | Latest | Control de versiones |
| InfinityFree | SaaS | Despliegue en producción |

---

## 📜 Licencia

Esta obra está bajo una licencia [Reconocimiento-Compartir bajo la misma licencia 3.0 España de Creative Commons](http://creativecommons.org/licenses/by-sa/3.0/es/).

---

## 👤 Autor

**Alejandro Ratia Rodríguez**  
Ciclo Formativo de Grado Superior — Desarrollo de Aplicaciones Web  
IES «Venancio Blanco» · Salamanca · Curso 2025/2026
