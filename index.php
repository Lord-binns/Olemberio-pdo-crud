<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <style>
        /* Define a class for the grid */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Responsive grid with minimum item width of 250px */
            gap: 20px; /* Gap between grid items */
            padding: 20px; /* Add padding around the grid container */
            width: 80%; /* Set width to 80% */
        }


        /* Style for individual cards */
        .card {
            width: 100%; /* Ensure cards take full width of their container */
        }

        .card-img-top{
            width: 100%; /* Ensure the image fills its container */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover; /* Ensure the image covers the entire container */
        }
        /* Style for the cart */
        #cartContainer {
            position: fixed;
            top: 4em;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Bootstrap
    </a>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
</nav>
<body>

    <div id="productsDisplay" class="card-grid"></div>
    <!-- Cart Display Area -->
    <div id="cartContainer"></div>

    <script>
        fetch('./products/products-api.php')
            .then(response => response.json())
            .then(data => {
                const booksContainer = document.getElementById('productsDisplay');
                data.forEach(product => {
                    const cardHTML = `
                    

                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="${product.img}">
                            <div class="card-body">
                                <h5 class="card-title">${product.title}</h5><br>Price: ₱${product.rrp}<br>
                                <p class="card-text">${product.description}.</p>
                                <p class="card-text"<br>Quantity: ${product.quantity}</p>
                                 <button class="btn btn-success" onclick="addToCart(${product.id})">
                                    <i class="fas fa-cart-plus"></i> <!-- Add to Cart icon -->
                                Add to Cart
                            </button>
                            </div>
                    </div>

                    `;
                    booksContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        // Function to add a product to the cart
        function addToCart(productId) {
            // Here, you can implement your logic to add the product with the given ID to the cart
            console.log(`Product with ID ${productId} added to cart`);
            // For example, you can send an AJAX request to your server to update the cart
        }

        // Function to display the cart with the items added and deduct the values from the quantity data field
        function displayCart() {
            // Here, you can implement the logic to display the cart with the items added and update the quantity data field
        }

        // Initialize cart object
    let cart = {};

    // Function to add a product to the cart
    function addToCart(productId) {
        // Add the product to the cart
        if (cart[productId]) {
            cart[productId]++;
        } else {
            cart[productId] = 1;
        }
        // Display the updated cart
        displayCart();
    }

    // Function to display the cart with the items added and deduct the values from the quantity data field
    function displayCart() {
        const cartContainer = document.getElementById('cartContainer');
            let cartHTML = '<h3>Cart</h3>';
            // Iterate over the cart items and display them
            for (const [productId, quantity] of Object.entries(cart)) {
                cartHTML += `<p>Product ID: ${productId}, Quantity: ${quantity}</p>`;
                // Here, you can update the quantity data field for the corresponding product
            }
            // Update the cart display
            cartContainer.innerHTML = cartHTML;
    }

    </script>
</body>
</html>