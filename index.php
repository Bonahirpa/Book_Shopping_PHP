<?php
  // Database connection
  include('php/db.php');
  session_start();

  // Array of books with title, author, price, and image
  $books = [
      ['book_id' => 1, 'title' => 'The Warrior', 'author' => 'james', 'price' => '15.99', 'image' => 'istockphoto-96441090-612x612.jpg'],
      ['book_id' => 2, 'title' => 'Rich Dad', 'author' => 'Robert', 'price' => '20.99', 'image' => 'istockphoto-153952958-612x612.jpg'],
      ['book_id' => 3, 'title' => 'Atomic Habit', 'author' => 'James', 'price' => '10.99', 'image' => 'istockphoto-162833245-612x612.jpg'],
      ['book_id' => 4, 'title' => 'Miiltoo', 'author' => 'Ebbisa', 'price' => '12.99', 'image' => 'istockphoto-183029142-612x612.jpg'],
      ['book_id' => 5, 'title' => 'Lonely Girl', 'author' => 'Joseph', 'price' => '18.99', 'image' => 'istockphoto-919570020-612x612.jpg'],
      ['book_id' => 6, 'title' => 'Fikir', 'author' => 'Adony', 'price' => '25.99', 'image' => 'istockphoto-1574398763-612x612.jpg']
  ];

  // Add item to the cart
  if (isset($_GET['action']) && $_GET['action'] == 'add') {
      $id = $_GET['id'];  // Get the book id from the link
      $sql = "SELECT * FROM books WHERE book_id = $id";
      $result = mysqli_query($conn, $sql);
      $book = mysqli_fetch_assoc($result);

      // Create cart session if not already exists
      if (!isset($_SESSION['cart'])) {
          $_SESSION['cart'] = array();
      }

      // Add the book to the cart session
      $_SESSION['cart'][] = $book;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shopping - Homepage</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to Book Shopping</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>

    <div class="book-list">
        <?php
        // Loop through the books array and display each book
        foreach ($books as $book) {
            echo '<div class="book">';
            echo '<img src="assets/image/' . $book['image'] . '" alt="' . $book['title'] . '">';
            echo '<h3>' . $book['title'] . '</h3>';
            echo '<p>' . $book['author'] . '</p>';
            echo '<p>' . $book['price'] . ' USD</p>';
            echo '<a href="cart.php?action=add&id=' . $book['book_id'] . '" class="btn">Add to Cart</a>';
            echo '</div>';
        }
        ?>
    </div>

    <footer>
        <p>© 2024 Book Shopping Project</p>
    </footer>
</body>
</html>
