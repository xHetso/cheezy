<!DOCTYPE html>
<html>
<head>
<title>CHEEZY: Мәзір</title>
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
    
    .menu-card {
      background-color: #333;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      position: relative;
    }
    
    .item-name {
      font-size: 18px;
      font-weight: bold;
      color: #ffc107;
      margin-bottom: 10px;
    }
    
    .item-picture {
      width: 200px;
      height: 200px;
      object-fit: cover;
      margin-bottom: 10px;
    }
    
    .item-category {
      font-size: 14px;
      color: #ccc;
      margin-bottom: 5px;
    }
    
    .item-price {
      font-size: 18px;
      font-weight: bold;
      color: #ffc107;
      margin-bottom: 10px;
    }
    
    .delete-button {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #ff5722;
      color: #fff;
      border: none;
      padding: 5px 10px;
      border-radius: 3px;
      cursor: pointer;
    }
    
    .add-button {
      background-color: #333333;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      margin-bottom: 20px;
    }

    .add-button:hover{
        background-color: #6d6d6d;
    }

     /* CSS for the modal window */
.modal {
  display: none; /* Hide the modal by default */
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(24, 24, 24, 0.25); /* Black background with 80% transparency */
}

.modal-content {
  background-color: #000;
  color: #fff; /* White text color */
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}

/* Additional styling for the form elements inside the modal */
form {
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #fff; /* White text color */
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
}

button[type="submit"] {
  background-color: #b30707;
  color: white;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
}

button[type="submit"]:hover {
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
  <h1>CHEEZY: Мәзір</h1>

  <a href="cheezyadmin.php" class="admin-panel-link">CHEEZY: Тапсырыстар</a>
  <a href="cheezyadmin2.php" class="admin-panel-link">CHEEZY: Хабарламалар</a>

    
    <button class="add-button" onclick="addNewProduct()">Жаңа өнімді қосу</button>
    
    <?php
      // Database connection details
      $servername = "127.0.0.1"; // database server name
      $username = "root"; // Database user name
      $password = "root"; // Database user password
      $dbname = "cheezy"; // Database name
      
      // Create a connection to the database
      $conn = new mysqli($servername, $username, $password, $dbname);
      
      // Check if the connection was successful
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      // Function to delete a menu item from the database
      function deleteMenuItem($itemId) {
        global $conn;
        
        // Delete the item from the database
        $sql = "DELETE FROM burgers WHERE id = $itemId";
        $result = $conn->query($sql);
        
        return $result;
      }
      
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteItemId"])) {
        $itemId = $_POST["deleteItemId"];
        $success = deleteMenuItem($itemId);
        
        if ($success) {
          echo "";
        } else {
          echo "Қате пайда болды!";
        }
      }
      
      // Fetch the burger menu items from the database
      $sql = "SELECT * FROM burgers";
      $result = $conn->query($sql);
      
      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="menu-card">';
          echo '<form method="post" onsubmit="return confirm(\'Өнімді жоюға сенімдісіз бе?\')">';
          echo '<input type="hidden" name="deleteItemId" value="' . $row["id"] . '">';
          echo '<button class="delete-button" type="submit">Жою</button>';
          echo '</form>';
          echo '<div class="item-name">Атауы: ' . $row["name"] . '</div>';
          echo '<img class="item-picture" src="' . $row["image"] . '" alt="' . $row["name"] . '">';
          echo '<div class="item-category">Категориясы: ' . $row["category"] . '</div>';
          echo '<div class="item-price">Бағасы: KZT ' . $row["price"] . '</div>';
          echo '</div>';
        }
      } else {
        echo "No menu items found.";
      }
      
      // Close the database connection
      $conn->close();
    ?>
    
  </div>
  
  <!-- Modal -->
  <div id="modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Жаңа өнімді қосу:</h2>
    <form id="addProductForm" enctype="multipart/form-data">
      <label for="productName">Атауы:</label>
      <input type="text" id="productName" name="productName" required>
      <label for="productImage">Суреті:</label>
      <input type="file" id="productImage" name="productImage" accept="image/*" required>
      <label for="productCategory">Категориясы:</label>
      <input type="text" id="productCategory" name="productCategory" required>
      <label for="productPrice">Бағасы:</label>
      <input type="text" id="productPrice" name="productPrice" required>
      <button type="button" id="addProductButton">Өнімді қосу</button>
    </form>
  </div>
</div>
  
<script>
// Get the modal element
const modal = document.getElementById("modal");

// Get the add new product button
const addProductButton = document.querySelector(".add-button");

// Get the close button in the modal
const closeButton = document.querySelector(".close");

// Get the form element
const addProductForm = document.getElementById("addProductForm");

// Function to open the modal
function openModal() {
  modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
  modal.style.display = "none";
}

// Event listener for the add new product button
addProductButton.addEventListener("click", openModal);

// Event listener for the close button
closeButton.addEventListener("click", closeModal);

// Event listener for the "Add Product" button click
document.getElementById("addProductButton").addEventListener("click", function() {
  // Trigger the form submission
  addProductForm.dispatchEvent(new Event("submit"));
});

// Function to handle form submission
addProductForm.addEventListener("submit", function(event) {
  event.preventDefault();

  // Get form values
  const productName = document.getElementById("productName").value;
  const productImage = document.getElementById("productImage").files[0];
  const productCategory = document.getElementById("productCategory").value;
  const productPrice = document.getElementById("productPrice").value;

  // Create a FormData object to store the form data
  const formData = new FormData();
  formData.append("productName", productName);
  formData.append("productImage", productImage);
  formData.append("productCategory", productCategory);
  formData.append("productPrice", productPrice);

  // Create an AJAX request
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "add_product.php", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      if (response.success) {
        // Close the modal
        closeModal();

        // Refresh the page to display the newly added product
        window.location.reload();
      } else {
        console.log("Failed to add product.");
      }
    }
  };
  xhr.send(formData);
});

</script>

</body>
</html>
