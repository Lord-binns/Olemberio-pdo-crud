<?php
require_once('../pages/config.php');
session_start();

header('Content-Type: application/json'); // Ensure the response is in JSON format

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Decode the incoming JSON request
        $input = json_decode(file_get_contents('php://input'), true);
        
        // Retrieve data from the request
        $product_id = $input['product_id'] ?? null;
        $product_name = $input['product_name'] ?? null;
        $amount = $input['amount'] ?? null;

        // Validate input data
        if (!$product_id || !$product_name || !$amount) {
            throw new Exception('Invalid input');
        }

        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO payments (payment_item_name, payment_price, payment_quantity, created_at) 
                               VALUES (:product_name, :amount, 1, current_timestamp())");

        // Bind parameters
        $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);

        // Execute query
        if ($stmt->execute()) {
            $payment_id = $pdo->lastInsertId();
            echo json_encode(['success' => true, 'payment_id' => $payment_id]);
        } else {
            throw new Exception('Failed to insert payment into database.');
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
