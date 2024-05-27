<?php
// Include config file
require_once '../pages/config.php';

// Define variables and initialize with empty values
$city = $street = $house_number = "";
$city_err = $street_err = $house_number_err = "";

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

    // Check input errors before inserting in database
    if (empty($city_err) && empty($street_err) && empty($house_number_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO address (city, street, house_number) VALUES (:city, :street, :house_number)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":street", $street);
            $stmt->bindParam(":house_number", $house_number);

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
    <link rel="stylesheet" href="../css/address.css">
</head>
<body>
<div class="container">
    <h1>Address</h1>
    <p>Please enter your shipping details.</p>
    <hr />
    <form action="address.php" method="post">
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
        <hr>
        <button type="submit" class="btn btn-primary">Continue</button>
    </form>
</div>
</body>
</html>
