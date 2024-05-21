<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment and Accounting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #f8f9fa;">

<div style="max-width: 600px; margin: 0 auto; padding: 50px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

    <a href="../index.php" class="btn btn-danger is-pulled-right mb-3">Back</a> <!-- Back Button -->

    <h1 style="text-align: center; margin-bottom: 30px;">Payment And Accounting</h1>

    <div style="margin-bottom: 30px;">
        <div style="background-color: #d6dce3; padding: 20px; border-radius: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
            <p style="text-align: center; color: #ff3700; margin-bottom: 20px;"> Note: Items Purchased in Lord-binns Shop are non-refundable </p>
            <form>
                <div style="margin-bottom: 20px;">
                    <label for="brewing-vessel" style="font-weight: bold; color: #0e0e0e;">Gold Vessel Number (Card Number)</label>
                    <input type="text" id="brewing-vessel" class="form-control" style="width: 100%;" placeholder="Enter your  Gold vessel number">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="moon-cycle" style="font-weight: bold; color: #080808;"> Moon Cycle (Date)</label>
                    <input type="text" id="moon-cycle" class="form-control" style="width: 100%;" placeholder="MM/YYYY">
                </div>
                <div style="margin-bottom: 20px;">
                    <label for="cauldron-cvv" style="font-weight: bold; color: #0e0e0e;"> Magic Value (CVV)</label>
                    <input type="text" id="cauldron-cvv" class="form-control" style="width: 100%;" placeholder=" Magic verification Number">
                </div>
                <a href="Logistics.html" class="btn btn-danger btn-block">Pay Now</a>
            </form>
        </div>
    </div>

</div>

</body>
</html>
