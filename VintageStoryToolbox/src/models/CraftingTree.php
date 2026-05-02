<?php
require_once __DIR__ . '/Item.php';
require_once __DIR__ . '/CraftingRecipe.php';
require_once __DIR__ . '/RecipeComponent.php';

class CraftingTree {

  private Item $item;
  private int $quantity;
  private array $nodes;
  private PDO $db;

  public function __construct(PDO $db, Item $item, int $quantity) {
    $this->db = $db;
    $this->item = $item;
    $this->quantity = $quantity;
    $this->nodes = [];
  }

  public function build(): array {
    return $this->buildNode($this->item, $this->quantity);
  }

  private function buildNode(Item $item, int $quantity): array {
    $node = [
      'id' => $item->getId(),
      'name' => $item->getName(),
      'image' => $item->getFirstImage(),
      'quantity' => $quantity,
      'children' => []
    ];

    if (!$item->isCraftable()) return $node;

    $recipe = CraftingRecipe::getByItemId($this->db, $item->getId());
    if (!$recipe) return $node;

    $node['stations'] = $recipe->getStations();
    $components = RecipeComponent::getByRecipeId($this->db, $recipe->getId());

    foreach ($components as $component) {
      $childItem = Item::getById($this->db, $component->getItemId());
      if ($childItem) {
        $node['children'][] = $this->buildNode($childItem, $component->getQuantity() * $quantity);
      }
    }

    return $node;
  }

  public function getBaseMaterials(): array {
    $tree = $this->build();
    $materials = [];
    $this->collectBaseMaterials($tree, $materials);
    return $materials;
  }

  private function collectBaseMaterials(array $node, array &$materials): void {
    if (empty($node['children'])) {
      $key = $node['name'];
      if (isset($materials[$key])) {
        $materials[$key]['quantity'] += $node['quantity'];
      } else {
        $materials[$key] = [
          'name'     => $node['name'],
          'image'    => $node['image'],
          'quantity' => $node['quantity']
        ];
      }
      return;
    }

    foreach ($node['children'] as $child) {
      $this->collectBaseMaterials($child, $materials);
    }
  }
}
?>