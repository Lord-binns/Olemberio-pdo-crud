<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$product_name = $product_description = $product_retail_price = "";
$product_name_err = $product_description_err = $product_retail_price_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["product_name"]);
    if(empty($input_product_name)){
        $name_err = "Please enter a product_name.";
    } elseif(!filter_var($input_product_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $product_name_err = "Please enter a valid product_name.";
    } else{
        $product_name = $input_product_name;
    }
    
    // Validate address
    $input_product_description = trim($_POST["product_description"]);
    if(empty($input_product_description)){
        $product_description_err = "Please enter a product_description.";     
    } else{
        $product_description = $input_product_description;
    }
    
    // Validate salary
    $input_product_retail_price = trim($_POST["product_retail_price"]);
    if(empty($input_product_retail_price)){
        $product_retail_price_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_product_retail_price)){
        $product_retail_price_err = "Please enter a positive integer value.";
    } else{
        $product_retail_price = $input_product_retail_price;
    }
    
    // Check input errors before inserting in database
    if(empty($product_name_err) && empty($product_description_err) && empty($product_retail_price_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO products (product_name, product_description, product_retail_price) VALUES (:product_name, :product_description, :product_retail_price)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":product_name", $param_name);
            $stmt->bindParam(":product_description", $param_address);
            $stmt->bindParam(":product_retail_price", $param_salary);
            
            // Set parameters
            $param_name = $product_name;
            $param_address = $product_descrciption;
            $param_product_retail_price = $product_retail_price;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
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
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add a Product record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>ProductName</label>
                            <input type="text" name="product_name" class="form-control <?php echo (!empty($product_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_name; ?>">
                            <span class="invalid-feedback"><?php echo $product_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product_Description</label>
                            <textarea name="product_description" class="form-control <?php echo (!empty($product_description_err)) ? 'is-invalid' : ''; ?>"><?php echo $product_description; ?></textarea>
                            <span class="invalid-feedback"><?php echo $product_description_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Product_Retail_Price</label>
                            <input type="text" name="product_retail_price" class="form-control <?php echo (!empty($product_retail_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_retail_price; ?>">
                            <span class="invalid-feedback"><?php echo $product_retail_price_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>