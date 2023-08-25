<?php
// Get the cart item ID and new quantity from the AJAX request
$cartItemId = $_POST['cartItemId'];
$newQuantity = $_POST['quantity'];

// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "cheezy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the quantity and total in the cart table
$sql = "UPDATE cart SET quantity = '$newQuantity' WHERE id = '$cartItemId'";
$conn->query($sql);

// Retrieve the updated total
$sql = "SELECT price FROM cart WHERE id = '$cartItemId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $price = $row['price'];
    $total = $price * $newQuantity;

    $updateSql = "UPDATE cart SET total = '$total' WHERE id = '$cartItemId'";
    $conn->query($updateSql);

    echo "Quantity updated successfully.";
} else {
    echo "Failed to update quantity.";
}

$conn->close();
?>
