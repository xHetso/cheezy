<?php
// Get the product ID from the URL parameter
$productId = $_GET['productId'];

// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "cheezy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the product details from the burgers table
$sql = "SELECT * FROM burgers WHERE id = '$productId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $productName = $row['name'];
    $productPrice = $row['price'];

    // Insert the product into the cart table
    $insertSql = "INSERT INTO cart (name, quantity, price, total) VALUES ('$productName', 1, '$productPrice', '$productPrice')";
    $conn->query($insertSql);

    echo '<script>
                setTimeout(function() {
                    window.location.href = "cart.php";
                }, 0);
              </script>';
} else {
    echo "Ошибка сохранения данных в базе данных: " . $stmt->error;
}


$conn->close();
?>
