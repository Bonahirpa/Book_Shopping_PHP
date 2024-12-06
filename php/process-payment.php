<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize form inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    // Save customer info to the database
    $sql = "INSERT INTO orders (name, email, address) VALUES ('$name', '$email', '$address')";
    
    if (mysqli_query($conn, $sql)) {
        // Get the last inserted order ID
        $order_id = mysqli_insert_id($conn);

        // Skip inserting books into the order_items table
        
        // Clear the cart after successful payment
        unset($_SESSION['cart']);
        
        // Successful order message
        echo "Order placed successfully! Thank you for your purchase.";
    } else {
        // Error handling for inserting order into orders table
        echo "Error: " . mysqli_error($conn);
    }
}
?>
