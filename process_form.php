<?php
// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "cheezy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$totalSum = $_POST['totalSum'];

// Retrieve cart items from the cart table
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productName = $row["name"];
        $quantity = $row["quantity"];
        $products[] = $productName . ' (' . $quantity . ')';
    }
}

// Insert the order data into the orders table
$insertSql = "INSERT INTO orders (name, phone, address, totalSum, products) VALUES ('$name', '$phone', '$address', '$totalSum', '" . implode(', ', $products) . "')";

if ($conn->query($insertSql) === TRUE) {
    // Clear the cart
    $clearCartSql = "DELETE FROM cart";
    $conn->query($clearCartSql);

    echo "Тапсырыс қабылданды! Жауап күтіңіз!";// Задержка в три секунды
    sleep(2);

    // JavaScript перенаправление
    echo '<script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 2000);
          </script>';
} else {
    echo "Ошибка при сохранении заявки: " . $conn->error;
}

$conn->close();
?>
