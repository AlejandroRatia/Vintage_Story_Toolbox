<?php
class Planner {
  public static function init(): void {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
    if (!isset($_SESSION['planner'])) {
      $_SESSION['planner'] = [];
    }
  }

  public static function add(int $itemId, string $name, string $image, int $quantity): void {
    self::init();
    $_SESSION['planner'][$itemId] = [
      'id'       => $itemId,
      'name'     => $name,
      'image'    => $image,
      'quantity' => $quantity
    ];
  }

  public static function remove(int $itemId): void {
    self::init();
    unset($_SESSION['planner'][$itemId]);
  }

  public static function clear(): void {
    self::init();
    $_SESSION['planner'] = [];
  }

  public static function getAll(): array {
    self::init();
    return $_SESSION['planner'];
  }

  public static function isEmpty(): bool {
    self::init();
    return empty($_SESSION['planner']);
  }
}
?>