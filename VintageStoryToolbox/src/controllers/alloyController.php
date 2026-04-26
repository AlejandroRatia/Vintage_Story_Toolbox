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

    $id       = isset($_GET['id'])      ? (int) $_GET['id']       : null;
    $quantity = isset($_GET['cantidad']) ? (int) $_GET['cantidad'] : null;

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

        $totalNuggets = $quantity * Metal::NUGGETS_PER_INGOT;

        // Composición personalizada o por defecto
        $customComp = isset($_GET['custom_composition'])
            ? json_decode($_GET['custom_composition'], true)
            : null;

        $composition = null;
        if ($metal->isAlloy()) {
            if ($customComp) {
                // Usar porcentajes personalizados del usuario
                $composition = [];
                foreach ($customComp as $metalName => $pct) {
                    $composition[$metalName] = [
                        'percent' => $pct,
                        'nuggets' => (int) round($totalNuggets * $pct / 100)
                    ];
                }
            } else {
                $composition = $metal->calculateCompositionNuggets($quantity);
            }
        }

        // Calcular tandas con composición real
        $batchComp = $customComp ?? null;
        if (!$customComp && $metal->isAlloy() && $metal->getComposition()) {
            // Convertir rangos a punto medio para el cálculo
            $batchComp = [];
            foreach ($metal->getComposition() as $m => $pct) {
                $batchComp[$m] = is_array($pct) ? ($pct[0] + $pct[1]) / 2 : $pct;
            }
        }

        echo json_encode([
            'metal'       => $metal->getName(),
            'ingots'      => $quantity,
            'nuggets'     => $totalNuggets,
            'units'       => $quantity * Metal::UNITS_PER_INGOT,
            'batches'     => $metal->calculateBatches($quantity, $batchComp),
            'is_alloy'    => $metal->isAlloy(),
            'composition' => $composition
        ]);

    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Error interno del servidor']);
    }
  }
}
?>