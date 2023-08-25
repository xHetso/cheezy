<!DOCTYPE html>
<html>
<head>
  <title>CHEEZY: Тапсырыстар</title>
  <link rel="shortcut icon" href="./images/favicon-burger.png" type="image/x-icon">
  <style>
    body {
      background: url(../images/background.jpg);
      font-family: Arial, sans-serif;
      color: #fff;
    }
    
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
      color: #ffc107;
    }
    
    .order-card {
      background-color: #333;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      position: relative;
    }
    
    .order-number {
      font-size: 18px;
      font-weight: bold;
      color: #ffc107;
      margin-bottom: 10px;
    }
    
    .customer-details {
      font-size: 16px;
      color: #fff;
      margin-bottom: 10px;
    }
    
    .ordered-items {
      font-size: 14px;
      color: #ccc;
      margin-bottom: 10px;
    }
    
    .order-amount {
      font-size: 18px;
      font-weight: bold;
      color: #ffc107;
      margin-bottom: 10px;
    }
    
    .delete-button {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #b30707;
      color: #fff;
      border: none;
      padding: 5px 10px;
      border-radius: 3px;
      cursor: pointer;
    }

    .delete-button:hover {
  background-color: #873a3a;
   }

    .admin-panel-link {
      display: block;
      text-align: center;
      margin-bottom: 20px;
      color: #ffc107;
      text-decoration: none;
      font-size: 18px;
      text-decoration: underline;
    }

    .admin-panel-link:hover {
      color: #fff;
    }
    </style>
</head>
<body>
  <div class="container">
    <h1>CHEEZY: Тапсырыстар</h1>

    <a href="cheezyadmin2.php" class="admin-panel-link">CHEEZY: Хабарламалар</a>
    <a href="cheezyadmin3.php" class="admin-panel-link">CHEEZY: Мәзір</a>
    
    <?php
    // Database credentials
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $dbname = "cheezy";

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        $orderId = $_POST['orderId'];

        // Delete the order from the database
        $sql = "DELETE FROM orders WHERE id = $orderId";
        if ($conn->query($sql) === true) {
            echo "";
        } else {
            echo "Error deleting order: " . $conn->error;
        }
    }

    // Retrieve orders from the database
    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    // Output the orders in the admin panel
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="order-card">';
            echo '<form method="post">';
            echo '<button class="delete-button" type="submit" name="delete">Жою</button>';
            echo '<input type="hidden" name="orderId" value="' . $row['id'] . '">';
            echo '</form>';
            echo '<div class="order-number">Тапсырыс #' . $row['id'] . '</div>';
            echo '<div class="customer-details">';
            echo '<div>Аты-жөні: ' . $row['name'] . '</div>';
            echo '<div>Байланыс-нөмірі: ' . $row['phone'] . '</div>';
            echo '<div>Мекенжайы: ' . $row['address'] . '</div>';
            echo '</div>';
            echo '<div class="ordered-items">Тапсырыс берді: ' . $row['products'] . '</div>';
            echo '<div class="order-amount">Сомасы: KZT' . $row['totalSum'] . '</div>';
            echo '</div>';
        }
    } else {
        echo "Әзірге тапсырыстар жоқ.";
    }

    // Close the database connection
    $conn->close();
    ?>
    
  </div>
</body>
</html>
