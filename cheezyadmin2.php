<!DOCTYPE html>
<html>
<head>
  <title>CHEEZY: Хабарламалар</title>
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
    
    .message-card {
      background-color: #333;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      position: relative;
    }
    
    .customer-name {
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
    
    .message-content {
      font-size: 14px;
      color: #ccc;
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
    <h1>CHEEZY: Хабарламалар</h1>

    <a href="cheezyadmin.php" class="admin-panel-link">CHEEZY: Тапсырыстар</a>
    <a href="cheezyadmin3.php" class="admin-panel-link">CHEEZY: Мәзір</a>

    <?php
    // Database connection details
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

    // Fetch messages from the database
    $sql = "SELECT id, name, email, phone, message FROM messages";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Display each message as a card
      while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $message = $row["message"];

        echo '<div class="message-card">';
        echo '<button class="delete-button" onclick="deleteMessage(this, ' . $id . ')">Жою</button>';
        echo '<div class="customer-name">' . $name . '</div>';
        echo '<div class="customer-details">';
        echo '<div>Email: ' . $email . '</div>';
        echo '<div>Телефон-нөмірі: ' . $phone . '</div>';
        echo '</div>';
        echo '<div class="message-content">' . $message . '</div>';
        echo '</div>';
      }
    } else {
      echo '<p>Әзірге хабарламалар жоқ</p>';
    }

    // Close the database connection
    $conn->close();
    ?>

  </div>

  <script>
    function deleteMessage(button, messageId) {
      // Send an AJAX request to delete the message from the database
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "delete_message.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          // Remove the message card from the UI if deletion was successful
          var messageCard = button.parentElement;
          messageCard.remove();
        }
      };
      xhr.send("id=" + messageId);
    }
  </script>
</body>
</html>
