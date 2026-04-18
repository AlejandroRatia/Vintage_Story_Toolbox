<?php

require_once __DIR__ . '/../models/Metal.php';
require_once __DIR__ . '/../config/conexionBD.php';

class alloyController {

  private PDO $db;

  public function __construct() {
    $this->db = Database::conectar();
  }

  public function index(): void {
    try {
      $metals = Metal::getAll($this->db);
      require_once __DIR__ . '/../views/calculadoraA.php';
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['error' => 'Error al cargar los metales']);
    }
  }

  public function calcular(): void {
    header('Content-Type: application/json');

    $id = isset($_GET['id'])      ? (int) $_GET['id']       : null;
    $quantity = isset($_GET['cantidad']) ? (int) $_GET['cantidad'] : null;

    // Validación
    if (!$id || !$quantity) {
      http_response_code(400);
      echo json_encode(['error' => 'Parámetros inválidos']);
      return;
    }

    if ($quantity <= 0) {
      http_response_code(400);
      echo json_encode(['error' => 'La cantidad debe ser mayor que cero']);
      return;
    }

    try {
        $metal = Metal::getById($this->db, $id);

        if (!$metal) {
          http_response_code(404);
          echo json_encode(['error' => 'Metal no encontrado']);
          return;
        }

        $response = [
          'metal'       => $metal->getName(),
          'ingots'      => $quantity,
          'nuggets'     => $metal->calculateNuggets($quantity),
          'units'       => $metal->calculateUnits($quantity),
          'batches'     => $metal->calculateBatches($quantity),
          'is_alloy'    => $metal->isAlloy(),
          'composition' => $metal->calculateCompositionNuggets($quantity)
        ];

      echo json_encode($response);

    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(['error' => 'Error interno del servidor']);
    }
  }
}
?>