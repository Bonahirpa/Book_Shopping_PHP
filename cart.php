<?php
session_start();

// Array of books with id, title, author, price, and image
$books = [
    ['id' => 1, 'title' => 'The Warrior', 'author' => 'James', 'price' => '15.99', 'image' => 'istockphoto-96441090-612x612.jpg'],
    ['id' => 2, 'title' => 'Rich Dad', 'author' => 'Robert', 'price' => '20.99', 'image' => 'istockphoto-153952958-612x612.jpg'],
    ['id' => 3, 'title' => 'Atomic Habit', 'author' => 'James', 'price' => '10.99', 'image' => 'istockphoto-162833245-612x612.jpg'],
    ['id' => 4, 'title' => 'Miiltoo', 'author' => 'Ebbisa', 'price' => '12.99', 'image' => 'istockphoto-183029142-612x612.jpg'],
    ['id' => 5, 'title' => 'Lonely Girl', 'author' => 'Joseph', 'price' => '18.99', 'image' => 'istockphoto-919570020-612x612.jpg'],
    ['id' => 6, 'title' => 'Fikir', 'author' => 'Adony', 'price' => '25.99', 'image' => 'istockphoto-1574398763-612x612.jpg']
];

// Add item to cart
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Find the book based on the provided ID
    foreach ($books as $book) {
        if ($book['id'] == $bookId) {
            // Create cart session if not already exists
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // Add the book to the cart session
            $_SESSION['cart'][] = $book;
            break; // Exit loop after adding the book
        }
    }
}
?>

<!-- HTML to display the cart -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/cart-style.css">
</head>
<body>
    <header>
        <h1>Your Shopping Cart</h1>
        <nav>
            <a href="index.php">Home</a>
            
        </nav>
    </header>

    <div class="cart-items">
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $item) {
                echo '<div class="cart-item">';
                echo '<img src="assets/image/' . $item['image'] . '" alt="' . $item['title'] . '">';
                echo '<h3>' . $item['title'] . '</h3>';
                echo '<p>' . $item['author'] . '</p>';
                echo '<p>' . $item['price'] . ' USD</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Your cart is empty!</p>';
        }
        ?>
        <br>
        <nav class="checkout1">
    <a  href="checkout.php">Pay Now</a>
    </nav>
    </div>
    

    <footer>
        <p>© 2024 Book Shopping Project</p>
    </footer>
</body>
</html>
