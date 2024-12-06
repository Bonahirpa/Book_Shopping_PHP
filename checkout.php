<?php
    session_start();
    // Check if there is any item in the cart before showing the form
    if (empty($_SESSION['cart'])) {
        echo "Your cart is empty! Please add some items before checking out.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/checkout-style.css">
</head>
<body>
    <header>
        <h1>Checkout</h1>
        <nav>
            <a href="cart.php">Back to Cart</a>
        </nav>
    </header>

    <div class="checkout-form">
        <form action="php/process-payment.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="address">Shipping Address:</label>
            <textarea name="address" id="address" required></textarea>

            <!-- Hidden fields to pass the book_id of the items in the cart -->
            <?php
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    // Assuming each book item in the cart has a unique 'id' field
                    echo '<input type="hidden" name="book_id[]" value="' . $item['id'] . '">';
                }
            }
            ?>

            <input type="submit" value="Submit Payment">
        </form>
    </div>

    <footer>
        <p>© 2024 Book Shopping Project</p>
    </footer>

    <!-- Optional JavaScript validation -->
    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var address = document.getElementById('address').value;

            if (!name || !email || !address) {
                alert('Please fill out all fields.');
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
