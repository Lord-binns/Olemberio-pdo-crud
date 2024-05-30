<?php
session_start();
require_once '../pages/config.php';

// Check if payment_id is set in session
if (!isset($_SESSION['payment_id'])) {
    die("Payment ID is not set. Please complete the payment process first.");
}

// Retrieve the payment_id from session
$payment_id = $_SESSION['payment_id'];

// Initialize variables with empty values
$city = $street = $house_number = "";
$city_err = $street_err = $house_number_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate city
    if (isset($_POST["city"])) {
        $input_city = trim($_POST["city"]);
        if (empty($input_city)) {
            $city_err = "Please select a city.";
        } else {
            $city = $input_city;
        }
    } else {
        $city_err = "City is required.";
    }

    // Validate street
    if (isset($_POST["street"])) {
        $input_street = trim($_POST["street"]);
        if (empty($input_street)) {
            $street_err = "Please enter your street.";
        } else {
            $street = $input_street;
        }
    } else {
        $street_err = "Street is required.";
    }

    // Validate house number
    if (isset($_POST["house_number"])) {
        $input_house_number = trim($_POST["house_number"]);
        if (empty($input_house_number)) {
            $house_number_err = "Please enter your house number.";
        } else {
            $house_number = $input_house_number;
        }
    } else {
        $house_number_err = "House number is required.";
    }

    // Check input errors before inserting in database
    if (empty($city_err) && empty($street_err) && empty($house_number_err)) {
        // Prepare an insert statement without payment_id
        $sql = "INSERT INTO address (city, street, house_number) VALUES (:city, :street, :house_number)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":street", $street);
            $stmt->bindParam(":house_number", $house_number);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to Logistics page or wherever needed
                header("location: ../pages/Logistics.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1.bg-success {
            background-color: #2ecc71;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-success {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-success:hover {
            background-color: #28a745;
        }
        .text-danger {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="bg-success" style="background-color: #2ecc71; color: white; padding: 10px; border-radius: 5px; text-align: center;">Address</h1>
    <p>Please enter your shipping details.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="city">City</label>
            <select class="form-control" id="city" name="city">
                <option value=""></option>
                <option value="Manolo Fortich" <?php echo ($city == "Manolo Fortich") ? 'selected' : ''; ?>>Manolo Fortich</option>
                <option value="Cagayan de Oro" <?php echo ($city == "Cagayan de Oro") ? 'selected' : ''; ?>>Cagayan de Oro</option>
                <option value="Metro Manila" <?php echo ($city == "Metro Manila") ? 'selected' : ''; ?>>Metro Manila</option>
                <option value="Cebu City" <?php echo ($city == "Cebu City") ? 'selected' : ''; ?>>Cebu City</option>
                <option value="Butuan City" <?php echo ($city == "Butuan City") ? 'selected' : ''; ?>>Butuan City</option>
                <option value="Davao City" <?php echo ($city == "Davao City") ? 'selected' : ''; ?>>Davao City</option>
            </select>
            <span class="text-danger"><?php echo $city_err; ?></span>
        </div>
        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street" value="<?php echo htmlspecialchars($street); ?>">
            <span class="text-danger"><?php echo $street_err; ?></span>
        </div>
        <div class="form-group">
            <label for="house_number">House Number</label>
            <input type="text" class="form-control" id="house_number" name="house_number" value="<?php echo htmlspecialchars($house_number); ?>">
            <span class="text-danger"><?php echo $house_number_err; ?></span>
        </div>
        <button type="submit" class="btn btn-success">Continue</button>
    </form>
</div>
</body>
</html>
