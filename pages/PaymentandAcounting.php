<?php
require_once('config.php');
session_start();

if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM payments WHERE payment_id = :payment_id");
        $stmt->bindParam(':payment_id', $payment_id, PDO::PARAM_INT);
        $stmt->execute();
        $purchase = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($purchase) {
            $product_name = $purchase['payment_item_name'];
            $amount = $purchase['payment_price'];
            $quantity = $purchase['payment_quantity'];
        } else {
            $error_message = "Purchase not found. Please check your payment ID.";
        }
    } catch (PDOException $e) {
        $error_message = "Error: " . $e->getMessage();
    }
} else {
    $error_message = "Invalid request. Payment ID is missing.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #e0f7fa; font-family: 'Nunito', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { max-width: 400px; padding: 30px; background-color: #ffffff; border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .container:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; margin-bottom: 20px; color: #00796b; font-weight: 700; }
        .form-label { font-weight: 600; color: #004d40; }
        .form-control, .form-select { border-radius: 10px; border: 1px solid #b2dfdb; padding: 10px; margin-bottom: 15px; transition: border-color 0.3s ease; }
        .form-control:focus, .form-select:focus { border-color: #00796b; box-shadow: none; }
        .btn-primary { width: 100%; padding: 12px; background-color: #00796b; border: none; border-radius: 10px; color: #fff; cursor: pointer; transition: background-color 0.3s ease; }
        .btn-primary:hover { background-color: #004d40; }
        .alert { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Form</h1>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php else: ?>
            <form id="paymentForm">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product_name); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($amount); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select class="form-select" id="payment_method" name="payment_method">
                        <option value="GCash">GCash</option>
                        <option value="PayMaya">PayMaya</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Credit Card">Credit Card</option>
                    </select>
                </div>
                <input type="hidden" name="purchase_id" value="<?php echo htmlspecialchars($payment_id); ?>">
                <button type="submit" class="btn btn-primary">Submit Payment</button>
            </form>
            <div id="successMessage" class="alert alert-success" role="alert" style="display:none;">
                Payment Successful! Redirecting...
            </div>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#paymentForm').on('submit', function(e) {
                e.preventDefault();
                $('#successMessage').fadeIn();
                setTimeout(function() {
                    window.location.href = '../pages/address.php';
                }, 2000);
            });
        });
    </script>
</body>
</html>