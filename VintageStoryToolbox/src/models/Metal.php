<?php

class Metal {

  private int $id;
  private string $name;
  private float $meltingPoint;
  private array $images;
  private bool $isAlloy;
  private ?array $composition;

  // Constantes fijas del juego
  const UNITS_PER_NUGGET    = 5;
  const NUGGETS_PER_INGOT   = 20;
  const UNITS_PER_INGOT     = 100;
  const MAX_INGOTS_PER_BATCH = 25;

  public function __construct(array $data) {
    $this->id          = $data['id'];
    $this->name        = $data['name'];
    $this->meltingPoint = $data['melting_point'];
    $this->images      = json_decode($data['images'], true) ?? [];
    $this->isAlloy     = (bool) $data['is_alloy'];
    $this->composition = isset($data['composition']) ? json_decode($data['composition'], true) : null;
  }

  // Getters
  public function getId(): int { return $this->id; }
  public function getName(): string { return $this->name; }
  public function getMeltingPoint(): float { return $this->meltingPoint; }
  public function getImages(): array { return $this->images; }
  public function isAlloy(): bool { return $this->isAlloy; }
  public function getComposition(): ?array { return $this->composition; }

  // Lógica de negocio
  public function calculateNuggets(int $quantity): int {
    return $quantity * self::NUGGETS_PER_INGOT;
  }

  public function calculateUnits(int $quantity): int {
    return $quantity * self::UNITS_PER_INGOT;
  }

  public function calculateBatches(int $quantity): int {
    return (int) ceil($quantity / self::MAX_INGOTS_PER_BATCH);
  }

  // Calcula los nuggets necesarios de cada componente para una aleación
  public function calculateCompositionNuggets(int $quantity): ?array {
    if (!$this->isAlloy || !$this->composition) return null;

    $totalNuggets = $quantity * self::NUGGETS_PER_INGOT;
    $result = [];

    foreach ($this->composition as $metal => $percentage) {
      if (is_array($percentage)) {
        // Rango: devuelve mínimo y máximo
        $result[$metal] = [
        'min' => (int) floor($totalNuggets * $percentage[0] / 100),
        'max' => (int) ceil($totalNuggets * $percentage[1] / 100)
        ];
      } else {
        $result[$metal] = (int) ($totalNuggets * $percentage / 100);
      }
    }
    return $result;
  }

  // Métodos estáticos para acceso a BBDD
  public static function getAll(PDO $db): array {
    try {
      $stmt = $db->prepare("SELECT * FROM METAL ORDER BY name ASC");
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return array_map(fn($row) => new self($row), $rows);
    } catch (PDOException $e) {
      throw new Exception("Error al obtener metales: " . $e->getMessage());
    }
  }

  public static function getById(PDO $db, int $id): ?self {
    try {
      $stmt = $db->prepare("SELECT * FROM METAL WHERE id = :id");
      $stmt->execute([':id' => $id]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row ? new self($row) : null;
    } catch (PDOException $e) {
      throw new Exception("Error al obtener metal: " . $e->getMessage());
    }
  }
}
?>