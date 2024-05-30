<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f8f9fa; padding-top: 20px; }
        .navbar { margin-bottom: 20px; }
        .card-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; padding: 20px; margin: 0 auto; width: 80%; }
        .card { width: 100%; border: none; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.2s; }
        .card:hover { transform: scale(1.05); }
        .card-img-top { width: 100%; height: 200px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px; }
        .card-body { text-align: center; }
        .card-title { font-size: 1.2rem; font-weight: bold; }
        .card-text { font-size: 0.9rem; color: #555; }
        .btn-success { width: 100%; margin-top: 10px; border-radius: 5px; }
        #cartContainer { position: fixed; top: 4em; right: 20px; background-color: #fff; border: 1px solid #ddd; padding: 20px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); z-index: 999; border-radius: 10px; width: 300px; }
        #cartContainer h3 { margin-bottom: 15px; }
        #cartContainer p { margin: 5px 0; }
    </style>
</head>
<body>
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
    <div id="productsDisplay" class="card-grid"></div>
    <div id="cartContainer">
        <h3>Cart</h3>
        <div id="cartModalBody"></div>
        <p id="totalPrice">Total Price: ₱0</p>
        <button id="buyButton" class="btn btn-success">Purchase</button>
    </div>

    <script>
        fetch('./products/products-api.php')
            .then(response => response.json())
            .then(data => {
                const productsContainer = document.getElementById('productsDisplay');
                data.forEach(product => {
                    const cardHTML = `
                        <div class="card">
                            <img class="card-img-top" src="${product.img}" alt="${product.title}">
                            <div class="card-body">
                                <h5 class="card-title">${product.title}</h5>
                                <p class="card-text">${product.description}</p>
                                <p class="card-text">Price: ₱${product.rrp}</p>
                                <p class="card-text">Quantity: ${product.quantity}</p>
                                <button class="btn btn-success" onclick="addToCart(${product.products_id}, '${product.title}', ${product.rrp})">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    `;
                    productsContainer.innerHTML += cardHTML;
                });
            })
            .catch(error => console.error('Error:', error));

        let cart = JSON.parse(localStorage.getItem('cart')) || {};

        function addToCart(products_id, productName, productPrice) {
            if (cart[products_id]) {
                cart[products_id].quantity++;
            } else {
                cart[products_id] = { products_id, name: productName, quantity: 1, price: productPrice };
            }
            displayCart();
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function removeFromCart(products_id) {
            if (cart[products_id]) {
                if (cart[products_id].quantity > 1) {
                    cart[products_id].quantity--;
                } else {
                    delete cart[products_id];
                }
            }
            displayCart();
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function increaseQuantity(products_id) {
            if (cart[products_id]) {
                cart[products_id].quantity++;
            }
            displayCart();
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        function displayCart() {
            const cartModalBody = document.getElementById('cartModalBody');
            const totalPriceElement = document.getElementById('totalPrice');
            let cartHTML = '';
            let totalPrice = 0;

            for (const products_id in cart) {
                const product = cart[products_id];
                const productTotal = product.quantity * product.price;
                totalPrice += productTotal;
                cartHTML += `
                    <div>
                        <p>${product.name} - Quantity: ${product.quantity} - Total: ₱${productTotal.toFixed(2)}</p>
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${products_id})">-</button>
                        <button class="btn btn-secondary btn-sm" onclick="increaseQuantity(${products_id})">+</button>
                    </div>
                `;
            }

            cartModalBody.innerHTML = cartHTML;
            totalPriceElement.innerHTML = `Total Price: ₱${totalPrice.toFixed(2)}`;
        }

        document.getElementById('buyButton').addEventListener('click', () => {
            const cart = JSON.parse(localStorage.getItem('cart'));
            window.location.href = 'pages/PaymentandAcounting.php?cart=' + encodeURIComponent(JSON.stringify(cart));
        });

        // Display cart on initial load
        displayCart();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
