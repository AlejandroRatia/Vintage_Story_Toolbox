<?php
class CraftingRecipe {
  private int $id;
  private int $itemId;
  private ?array $stations;
  private ?array $availableMaterials;

  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->itemId = $data['item_id'];
    $this->stations = isset($data['stations']) ? json_decode($data['stations'], true) : null;
    $this->availableMaterials = isset($data['available_materials']) ? json_decode($data['available_materials'], true) : null;
  }

  public function getId(): int { return $this->id; }
  public function getItemId(): int { return $this->itemId; }
  public function getStations(): ?array { return $this->stations; }
  public function getAvailableMaterials(): ?array { return $this->availableMaterials; }

  public static function getByItemId(PDO $db, int $itemId): ?self {
    try {
      $stmt = $db->prepare("SELECT * FROM CRAFTING_RECIPE WHERE item_id = :item_id");
      $stmt->execute([':item_id' => $itemId]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row ? new self($row) : null;
    } catch (PDOException $e) {
      throw new Exception("Error al obtener receta: " . $e->getMessage());
    }
  }
}
?>