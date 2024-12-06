<?php
// Database connection details
$servername = "localhost";  // Hostname
$username = "root";         // Database username (default in XAMPP is 'root')
$password = "";             // Database password (default in XAMPP is empty)
$dbname = "book_shop";      // Name of your database
$port = 3307;               // Correct MySQL port (from your my.ini file)

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
