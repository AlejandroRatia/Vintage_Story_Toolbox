<?php

class Metal {

  private int $id;
  private string $name;
  private float $meltingPoint;
  private ?string $ingotImage;
  private ?string $nuggetImage;
  private bool $isAlloy;
  private ?array $composition;

  const UNITS_PER_NUGGET     = 5;
  const NUGGETS_PER_INGOT    = 20;
  const UNITS_PER_INGOT      = 100;
  const MAX_NUGGETS_PER_BATCH = 512; // 4 ranuras × 128 pepitas
  const MAX_NUGGETS_PER_SLOT  = 128;
  const SLOTS_PER_CRUCIBLE    = 4;

  public function __construct(array $data) {
    $this->id          = $data['id'];
    $this->name        = $data['name'];
    $this->meltingPoint = $data['melting_point'];
    $this->ingotImage  = $data['ingot_image']  ?? null;
    $this->nuggetImage = $data['nugget_image'] ?? null;
    $this->isAlloy     = (bool) $data['is_alloy'];
    $this->composition = isset($data['composition']) ? json_decode($data['composition'], true) : null;
  }

  // Getters
  public function getId(): int { return $this->id; }
  public function getName(): string { return $this->name; }
  public function getMeltingPoint(): float { return $this->meltingPoint; }
  public function getIngotImage(): ?string { return $this->ingotImage; }
  public function getNuggetImage(): ?string { return $this->nuggetImage; }
  public function isAlloy(): bool { return $this->isAlloy; }
  public function getComposition(): ?array { return $this->composition; }

  // Lógica de negocio
  public function calculateNuggets(int $quantity): int {
    return $quantity * self::NUGGETS_PER_INGOT;
  }

  public function calculateUnits(int $quantity): int {
    return $quantity * self::UNITS_PER_INGOT;
  }

  public function calculateBatches(int $quantity, ?array $customComposition = null): int {
    $totalNuggets = $quantity * self::NUGGETS_PER_INGOT;

    // Si no es aleación, cálculo simple
    if (!$this->isAlloy || (!$this->composition && !$customComposition)) {
        return (int) ceil($totalNuggets / self::MAX_NUGGETS_PER_BATCH);
    }

    // Usar composición personalizada o la por defecto
    $comp = $customComposition ?? $this->composition;

    // Calcular ranuras necesarias por componente
    $totalSlots = 0;
    foreach ($comp as $metal => $pct) {
        // Aceptar tanto porcentaje directo como rango (usar punto medio)
        if (is_array($pct)) {
            $pct = ($pct[0] + $pct[1]) / 2;
        }
        $nuggetsForMetal = $totalNuggets * $pct / 100;
        $slotsForMetal = ceil($nuggetsForMetal / self::MAX_NUGGETS_PER_SLOT);
        $totalSlots += $slotsForMetal;
    }

    return (int) ceil($totalSlots / self::SLOTS_PER_CRUCIBLE);
  }

  public function calculateCompositionNuggets(int $quantity): ?array {
    if (!$this->isAlloy || !$this->composition) return null;

    $totalNuggets = $quantity * self::NUGGETS_PER_INGOT;
    $result = [];

    foreach ($this->composition as $metal => $percentage) {
      if (is_array($percentage)) {
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