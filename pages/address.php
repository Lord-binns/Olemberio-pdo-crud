<?php
// Include config file
require_once '../pages/config.php';

// Define variables and initialize with empty values
$city = $street = $house_number = $payments_id = "";
$city_err = $street_err = $house_number_err = $payments_id_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate city
    $input_city = trim($_POST["city"]);
    if (empty($input_city)) {
        $city_err = "Please select a city.";
    } else {
        $city = $input_city;
    }

    // Validate street
    $input_street = trim($_POST["street"]);
    if (empty($input_street)) {
        $street_err = "Please enter your street.";
    } else {
        $street = $input_street;
    }

    // Validate house number
    $input_house_number = trim($_POST["house_number"]);
    if (empty($input_house_number)) {
        $house_number_err = "Please enter your house number.";
    } else {
        $house_number = $input_house_number;
    }

    // Validate payments_id
    if (isset($_POST["payments_id"]) && !empty(trim($_POST["payments_id"]))) {
        $payments_id = trim($_POST["payments_id"]);
    } else {
        $payments_id_err = "Payment ID is required.";
    }

    // Check input errors before inserting in database
    if (empty($city_err) && empty($street_err) && empty($house_number_err) && empty($payments_id_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO address (city, street, house_number, payments_id) VALUES (:city, :street, :house_number, :payments_id)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":street", $street);
            $stmt->bindParam(":house_number", $house_number);
            $stmt->bindParam(":payments_id", $payments_id);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to Logistics page
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
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .text-danger {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Address</h1>
    <p>Please enter your shipping details.</p>
    <form action="address.php" method="post">
        <!-- Hidden input for payments_id -->
        <input type="hidden" name="payments_id" value="<?php echo isset($_POST['payments_id']) ? htmlspecialchars($_POST['payments_id']) : ''; ?>">

        <div class="form-group">
            <label for="city">City</label>
            <select class="form-control" id="city" name="city">
                <option value=""></option>
                <option value="Manolo Fortich">Manolo Fortich</option>
                <option value="Cagayan de Oro">Cagayan de Oro</option>
                <option value="Metro Manila">Metro Manila</option>
                <option value="Cebu City">Cebu City</option>
                <option value="Butuan City">Butuan City</option>
                <option value="Davao City">Davao City</option>
            </select>
            <span class="text-danger"><?php echo $city_err; ?></span>
        </div>
        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" class="form-control" id="street" name="street" value="">
            <span class="text-danger"><?php echo $street_err; ?></span>
        </div>
        <div class="form-group">
            <label for="house_number">House Number</label>
            <input type="text" class="form-control" id="house_number" name="house_number" value="">
            <span class="text-danger"><?php echo $house_number_err; ?></span>
        </div>
        <button type="submit" class="btn btn-primary">Continue</button>
    </form>
</div>
</body>
</html>
