<?php
class RecipeComponent {
  private int $id;
  private int $recipeId;
  private int $itemId;
  private int $quantity;

  public function __construct(array $data) {
    $this->id = $data['id'];
    $this->recipeId = $data['recipe_id'];
    $this->itemId = $data['item_id'];
    $this->quantity = $data['quantity'];
  }

  public function getId(): int { return $this->id; }
  public function getRecipeId(): int { return $this->recipeId; }
  public function getItemId(): int { return $this->itemId; }
  public function getQuantity(): int { return $this->quantity; }

  public static function getByRecipeId(PDO $db, int $recipeId): array {
    try {
      $stmt = $db->prepare("SELECT * FROM RECIPE_COMPONENT WHERE recipe_id = :recipe_id");
      $stmt->execute([':recipe_id' => $recipeId]);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return array_map(fn($row) => new self($row), $rows);
    } catch (PDOException $e) {
      throw new Exception("Error al obtener componentes: " . $e->getMessage());
    }
  }
}
?>