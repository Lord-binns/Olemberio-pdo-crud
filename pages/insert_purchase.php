<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../pages/config.php');
session_start();

$response = array('success' => false, 'payment_id' => null, 'message' => '');

try {
    $input = file_get_contents('php://input');
    $cartItems = json_decode($input, true);

    if (json_last_error() !== JSON_ERROR_NONE || !is_array($cartItems)) {
        throw new Exception('Invalid cart data.');
    }

    $pdo->beginTransaction();

    $sql = "INSERT INTO payments (payment_item_name, payment_price, payment_quantity, products_id) VALUES (:itemName, :itemPrice, :itemQuantity, :productId)";
    $stmt = $pdo->prepare($sql);

    foreach ($cartItems as $item) {
        $stmt->bindParam(':itemName', $item['title']);
        $stmt->bindParam(':itemPrice', $item['rrp']);
        $stmt->bindParam(':itemQuantity', $item['quantity']);
        $stmt->bindParam(':productId', $item['products_id']);
        if (!$stmt->execute()) {
            throw new Exception('Failed to insert cart item.');
        }
    }

    $pdo->commit();

    $paymentId = $pdo->lastInsertId();

    $response['success'] = true;
    $response['payment_id'] = $paymentId;
} catch (Exception $e) {
    $pdo->rollBack();
    $response['message'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
?>
