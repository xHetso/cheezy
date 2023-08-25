<?php
// Get the cart item ID from the URL parameter
$cartItemId = $_GET['cartItemId'];

// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "cheezy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete the cart item from the cart table
$sql = "DELETE FROM cart WHERE id = '$cartItemId'";
$conn->query($sql);

echo '<script>
                setTimeout(function() {
                    window.location.href = "cart.php";
                }, 0);
              </script>';

$conn->close();
?>
