<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link to your CSS file should be placed inside the head tag -->
    <link rel="stylesheet" href="../css/address.css">
</head>
<div class="container">
  <h1>Address</h1>
  <p>Please enter your shipping details.</p>
  <hr />
  <div class="form">
    
  <div class="fields fields--2">
    <label class="field">
      <span class="field__label" for="firstname">First name</span>
      <input class="field__input" type="text" id="firstname" value="Yellow" />
    </label>
    <label class="field">
      <span class="field__label" for="lastname">Last name</span>
      <input class="field__input" type="text" id="lastname" value="Kitty" />
    </label>
  </div>
  <label class="field">
    <span class="field__label" for="country">City</span>
    <select class="field__input" id="country">
      <option value=""></option>
      <option value="unitedstates">Manolo Fortich</option>
      <option value="unitedstates">Cagayan de oro</option>
      <option value="unitedstates"> Metro Manila</option>
      <option value="unitedstates">Cebu city</option>
      <option value="unitedstates">Butuan City</option>
      <option value="unitedstates"> Davao city</option>
    </select>
  </label>
  <label class="field">
    <span class="field__label" for="address">Street</span>
    <input class="field__input" type="text" id="address" />
  </label>
  <div class="fields fields--3">
    <label class="field">
      <span class="field__label" for="zipcode">House number</span>
      <input class="field__input" type="text" id="zipcode" />
    </label>
 
    </label>
  </div>
  </div>
  <hr>
  <a href="Logistics.php">
  <button class="button">Continue</button>
</a>

</div>