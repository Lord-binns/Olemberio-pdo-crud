<?php
require_once('../pages/config.php');
session_start();

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $input = json_decode(file_get_contents('php://input'), true);
        
        // Ensure input is an array of products
        if (!is_array($input)) {
            throw new Exception('Invalid input format');
        }

        // Begin transaction
        $pdo->beginTransaction();

        foreach ($input as $item) {
            $products_id = $item['id'] ?? null;
            $product_name = $item['title'] ?? null;
            $amount = $item['rrp'] ?? null;
            $quantity = $item['quantity'] ?? 1;
            $user_id = $_SESSION['user_id'] ?? 1; // Replace with actual user ID logic

            if (!$products_id || !$product_name || !$amount) {
                throw new Exception('Invalid input data');
            }

            $stmt = $pdo->prepare("INSERT INTO payments (products_id, payment_item_name, payment_price, payment_quantity, created_at, user_id) 
                                   VALUES (:products_id, :product_name, :amount, :quantity, current_timestamp(), :user_id)");

            $stmt->bindParam(':products_id', $products_id, PDO::PARAM_INT);
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

            if (!$stmt->execute()) {
                throw new Exception('Failed to insert payment into database');
            }
        }

        // Commit transaction
        $pdo->commit();
        echo json_encode(['success' => true, 'payment_id' => $pdo->lastInsertId()]);
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
