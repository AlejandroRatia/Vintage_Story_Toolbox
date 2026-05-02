<?php
class Item {
  private int $id;
  private string $name;
  private string $category;
  private bool $isCraftable;
  private ?array $images;
  private ?array $availableMaterials;

  public function __construct(array $data) {
    $this->id                 = $data['id'];
    $this->name               = $data['name'];
    $this->category           = $data['category'];
    $this->isCraftable        = (bool) $data['isCraftable'];
    $this->images             = isset($data['images']) ? json_decode($data['images'], true) : null;
    $this->availableMaterials = isset($data['available_materials']) ? json_decode($data['available_materials'], true) : null;
  }

  // Getters
  public function getId(): int { return $this->id; }
  public function getName(): string { return $this->name; }
  public function getCategory(): string { return $this->category; }
  public function isCraftable(): bool { return $this->isCraftable; }
  public function getImages(): ?array { return $this->images; }
  public function getFirstImage(): ?string { return $this->images[0] ?? null; }
  public function getAvailableMaterials(): ?array { return $this->availableMaterials; }
  public function isBaseItem(): bool { return !$this->isCraftable; }

  // Métodos estáticos BBDD
  public static function getAll(PDO $db): array {
    try {
      $stmt = $db->prepare("SELECT * FROM ITEM ORDER BY category ASC, name ASC");
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return array_map(fn($row) => new self($row), $rows);
    } catch (PDOException $e) {
      throw new Exception("Error al obtener items: " . $e->getMessage());
    }
  }

  public static function getById(PDO $db, int $id): ?self {
    try {
      $stmt = $db->prepare("SELECT * FROM ITEM WHERE id = :id");
      $stmt->execute([':id' => $id]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row ? new self($row) : null;
    } catch (PDOException $e) {
      throw new Exception("Error al obtener item: " . $e->getMessage());
    }
  }

  public static function search(PDO $db, string $name): array {
    try {
      $stmt = $db->prepare("SELECT * FROM ITEM WHERE name LIKE :name ORDER BY name ASC LIMIT 20");
      $stmt->execute([':name' => '%' . $name . '%']);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return array_map(fn($row) => new self($row), $rows);
    } catch (PDOException $e) {
      throw new Exception("Error al buscar items: " . $e->getMessage());
    }
  }

  public static function getCraftable(PDO $db): array {
    try {
      $stmt = $db->prepare("SELECT * FROM ITEM WHERE isCraftable = TRUE ORDER BY category ASC, name ASC");
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return array_map(fn($row) => new self($row), $rows);
    } catch (PDOException $e) {
      throw new Exception("Error al obtener items fabricables: " . $e->getMessage());
    }
  }
}
?>