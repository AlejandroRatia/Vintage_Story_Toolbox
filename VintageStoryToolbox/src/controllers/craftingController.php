<?php
require_once __DIR__ . '/../models/Item.php';
require_once __DIR__ . '/../models/CraftingRecipe.php';
require_once __DIR__ . '/../models/RecipeComponent.php';
require_once __DIR__ . '/../models/CraftingTree.php';
require_once __DIR__ . '/../models/Planner.php';
require_once __DIR__ . '/../config/conexionBD.php';

class craftingController {

  private PDO $db;

  public function __construct() {
    $this->db = Database::conectar();
  }

  // Vista principal del generador
  public function index(): void {
    try {
      $plannerItems = Planner::getAll();
      require_once __DIR__ . '/../views/generadorHR.php';
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['error' => 'Error al cargar el generador']);
    }
  }

  // Buscar items por nombre
  public function buscar(): void {
    header('Content-Type: application/json');
    $name = isset($_GET['nombre']) ? trim($_GET['nombre']) : '';

    if (strlen($name) < 2) {
      echo json_encode([]);
      return;
    }

    try {
      $items = Item::search($this->db, $name);
      $result = array_map(fn($item) => [
        'id'          => $item->getId(),
        'name'        => $item->getName(),
        'category'    => $item->getCategory(),
        'image'       => $item->getFirstImage(),
        'isCraftable' => $item->isCraftable()
      ], $items);
      echo json_encode($result);
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['error' => 'Error al buscar items']);
    }
  }

  // Generar árbol de fabricación
  public function arbol(): void {
    header('Content-Type: application/json');
    $itemId   = isset($_GET['id'])       ? (int) $_GET['id']       : null;
    $quantity = isset($_GET['cantidad']) ? (int) $_GET['cantidad'] : 1;

    if (!$itemId) {
      http_response_code(400);
      echo json_encode(['error' => 'ID de item requerido']);
      return;
    }

    try {
      $item = Item::getById($this->db, $itemId);
      if (!$item) {
        http_response_code(404);
        echo json_encode(['error' => 'Item no encontrado']);
        return;
      }

      $tree = new CraftingTree($this->db, $item, $quantity);
      echo json_encode([
        'tree'          => $tree->build(),
        'baseMaterials' => $tree->getBaseMaterials()
      ]);
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['error' => 'Error al generar árbol']);
    }
  }

  // Añadir item al planificador
  public function añadir(): void {
    header('Content-Type: application/json');
    $itemId   = isset($_POST['id'])       ? (int) $_POST['id']       : null;
    $quantity = isset($_POST['cantidad']) ? (int) $_POST['cantidad'] : 1;

    if (!$itemId) {
      http_response_code(400);
      echo json_encode(['error' => 'ID de item requerido']);
      return;
    }

    try {
      $item = Item::getById($this->db, $itemId);
      if (!$item) {
        http_response_code(404);
        echo json_encode(['error' => 'Item no encontrado']);
        return;
      }

      Planner::add($itemId, $item->getName(), $item->getFirstImage() ?? '', $quantity);
      echo json_encode(['success' => true, 'planner' => Planner::getAll()]);
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['error' => 'Error al añadir item']);
    }
  }

  // Eliminar item del planificador
  public function eliminar(): void {
    header('Content-Type: application/json');
    $itemId = isset($_POST['id']) ? (int) $_POST['id'] : null;

    if (!$itemId) {
      http_response_code(400);
      echo json_encode(['error' => 'ID de item requerido']);
      return;
    }

    Planner::remove($itemId);
    echo json_encode(['success' => true, 'planner' => Planner::getAll()]);
  }

  // Vaciar planificador
  public function vaciar(): void {
    header('Content-Type: application/json');
    Planner::clear();
    echo json_encode(['success' => true]);
  }

  // Obtener estado del planificador
  public function planificador(): void {
    header('Content-Type: application/json');
    echo json_encode(Planner::getAll());
  }
}
?>