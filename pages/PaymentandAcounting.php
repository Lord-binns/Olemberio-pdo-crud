<?php
session_start();
require_once 'config.php';

// Check if cart data is set
if (!isset($_GET['cart'])) {
    die("Cart data is not set.");
}

// Decode the cart data
$cart = json_decode(urldecode($_GET['cart']), true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Invalid cart data.");
}

// Check if the cart is an array
if (!is_array($cart)) {
    die("Invalid cart format.");
}

$products = [];
$totalPrice = 0;

try {
    $pdo->beginTransaction();

    // Insert each cart item into the payments table
    foreach ($cart as $item) {
        // Validate cart item fields
        if (!isset($item['products_id'], $item['name'], $item['quantity'], $item['price'])) {
            die("Invalid item format in cart.");
        }

        // Ensure values are of correct type
        $products_id = htmlspecialchars($item['products_id']);
        $name = htmlspecialchars($item['name']);
        $quantity = filter_var($item['quantity'], FILTER_VALIDATE_INT);
        $price = filter_var($item['price'], FILTER_VALIDATE_FLOAT);

        if ($quantity === false || $price === false) {
            die("Invalid quantity or price.");
        }

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO payments (payment_item_name, payment_price, payment_quantity, created_at, products_id) VALUES (:name, :price, :quantity, NOW(), :products_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':products_id', $products_id);
        $stmt->execute();

        // Store inserted item details
        $products[] = [
            'products_id' => $products_id,
            'name' => $name,
            'quantity' => $quantity,
            'price' => $price,
        ];

        // Calculate total price
        $totalPrice += $quantity * $price;
    }

    // Commit the transaction
    $pdo->commit();

    // Retrieve the last inserted payment_id for this session
    $lastPaymentId = $pdo->lastInsertId();
    $_SESSION['payment_id'] = $lastPaymentId;

} catch (Exception $e) {
    $pdo->rollBack();
    die("Error processing payment: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment and Accounting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #2ecc71; /* Green background color */
            font-family: 'Arial', sans-serif;
            padding-top: 50px; /* to adjust for fixed navbar */
            color: #ffffff; /* White text */
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; /* White background for card */
            color: #000000; /* Black text */
        }
        .card-body {
            padding: 20px;
        }
        .total-price {
            font-size: 1.2rem;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn-proceed {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #ffffff; /* White button background */
            color: #2ecc71; /* Green button text */
            border: 2px solid #ffffff; /* White button border */
            transition: background-color 0.3s ease;
        }
        .btn-proceed:hover {
            background-color: #2ecc71; /* Green background on hover */
            color: #ffffff; /* White text on hover */
        }
        .how-to-pay {
            margin-top: 20px;
        }
        .how-to-pay h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .how-to-pay p {
            font-size: 1.1rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center mb-4">Payment and Accounting</h1>
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Cart Items</h3>
            <?php foreach ($products as $product): ?>
                <p><?php echo $product['name']; ?> (<?php echo $product['quantity']; ?>) - ₱<?php echo number_format($product['quantity'] * $product['price'], 2); ?></p>
            <?php endforeach; ?>
            <p class="total-price">Total Price: ₱<?php echo number_format($totalPrice, 2); ?></p>
        </div>
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
    <form action="address.php" method="post">
        <input type="hidden" name="payment_id" value="<?php echo htmlspecialchars($lastPaymentId); ?>">
        <button type="submit" class="btn btn-proceed mt-3">Proceed to Address</button>
    </form>
    <div class="how-to-pay">
       
        <p>To complete your order, please proceed by clicking the "Proceed to Address" button above. This will take you to the next step to enter your shipping details.</p>
        <p>Thank you for shopping with us!</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.com/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
