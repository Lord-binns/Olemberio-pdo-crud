<?php
require_once('config.php');
session_start();

// Check if user_id is set in session
if (!isset($_SESSION['user_id'])) {
    die('Error: User not logged in.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Check if required POST parameters are set
        if (!isset($_POST['purchase_id'])) {
            throw new Exception('Purchase ID not found in POST data.');
        }
        if (!isset($_POST['product_name'])) {
            throw new Exception('Product name not found in POST data.');
        }
        if (!isset($_POST['amount'])) {
            throw new Exception('Amount not found in POST data.');
        }
        if (!isset($_POST['payment_method'])) {
            throw new Exception('Payment method not found in POST data.');
        }

        $stmt = $pdo->prepare("INSERT INTO payments (user_id, payment_item_name, payment_price, payment_status, payment_method, transaction_id, created_at) VALUES (:user_id, :product_name, :amount, 'Pending', :payment_method, NULL, NOW())");

        // Bind parameters
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':product_name', $_POST['product_name']);
        $stmt->bindParam(':amount', $_POST['amount']);
        $stmt->bindParam(':payment_method', $_POST['payment_method']);

        // Execute the query
        $stmt->execute();

        header("Location: payment_confirmation.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
