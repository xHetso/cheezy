<!DOCTYPE html>
<html>
<head>
    <title>Себет</title>
    <link rel="stylesheet" type="text/css" href="cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="./images/favicon-burger.png" type="image/x-icon">

   <!-- FontAwesome ver 6.1.1 from cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <!-- Animate on scroll library (AOS) link css -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>
       <link rel="stylesheet" href="./css/style.css">
       <style>
        .modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 420px;
  border-radius: 30px;
  max-height: 865px;
}

.close {
    color: black;
    float: right;
    font-size: 60px;
    font-weight: bold;
    position: absolute;
    cursor: pointer;
    right: 764px;
    top: 184px;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 10px;
}

input,
select {
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.buttons {
  display: flex;
  justify-content: center; /* Выравнивание по центру */
}

input[type="submit"] {
  padding: 25px 60px;
  background-color: #ffde3b;

  color: white;
  border: none;
  border-radius: 0px;
  cursor: pointer;
  margin-bottom: 0px;
  margin-top: 15px;
}
input[type="submit"]:hover {
  background-color: #dab33f;
}

li.option {
  background-color: #f1f1f1;
}
h1.text-center {
    margin-bottom: 20px;
}
nav.navbar {
    /* width: 100%; */
    /* margin: 0 auto; */
    margin-right: 136px;
    padding-left: 431px;
}


</style>
</head>
<body>
    <!-- Scroll to top -->
    <div id="scroll-top" title="Scroll to top">
        <i class="fa-solid fa-up-long"></i>
    </div>


    <!-- Header section start -->
    <header class="header">
        <div id="menu-btn" class="fa-solid fa-bars icons"></div>

        <nav class="navbar">
            <a href="/">Басты бет</a>
            <a href="menu.php">Мәзір</a>
            <span class="space"></span>
            <a href="index.php#reviews">Пікірлер</a>
            <a href="index.php#contact">Байланыс</a>
        </nav>

        <a href="/" class="logo">
            <img src="./images/logo.png" alt="">
        </a>
        
        <a href="cart.php" class="fa-solid fa-basket-shopping icons"></a>

        <form action="" class="search-form">
            <input type="text" name="search" placeholder="search here..." id="search-box">
            <label for="search-box" class="fa-solid fa-magnifying-glass"></label>
        </form>
    </header>
    <!-- Header section end -->

    <div class="heading">
        <img src="./images/title-img.png" class="want">
        <h1>Себет</h1>
    </div>

    <div class="onepiece">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Функция для обновления суммы всех продуктов в корзине
        function updateTotalSum() {
            var totalSum = 0;
            $(".total-cell").each(function() {
                var total = parseFloat($(this).text());
                if (!isNaN(total)) {
                    totalSum += total;
                }
            });
            $("#totalSum").text(totalSum);
            $("input[name='totalSum']").val(totalSum);
        }

        // Обработчик события изменения количества продукта в корзине
        $(".quantity-input").on("change", function() {
            var quantity = parseFloat($(this).val());
            var price = parseFloat($(this).closest("tr").find("td:eq(2)").text());
            if (!isNaN(quantity) && !isNaN(price)) {
                var total = quantity * price;
                $(this).closest("tr").find(".total-cell").text(total.toFixed(2));
                updateTotalSum();
            }
        });
    });
</script>
    <table>
    <tr>
        <th>Атауы</th>
        <th>Саны</th>
        <th>Бағасы</th>
        <th>Барлығы</th>
        <th>Әрекет</th>
    </tr>
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

    // Retrieve cart items from the cart table
    $sql = "SELECT * FROM cart";
    $result = $conn->query($sql);

    $totalSum = 0;

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $cartItemId = $row["id"];
          $productName = $row["name"];
          $quantity = $row["quantity"];
          $price = $row["price"];
          $total = $row["total"];
          $totalSum += $total;
          ?>

          <tr>
              <td><?php echo $productName; ?></td>
              <td>
                  <input type="number" value="<?php echo $quantity; ?>" min="1" data-cart-item-id="<?php echo $cartItemId; ?>" class="quantity-input">
              </td>
              <td><?php echo $price; ?></td>
              <td class="total-cell"><?php echo $total; ?></td>
              <td><a href="removeFromCart.php?cartItemId=<?php echo $cartItemId; ?>" class="remove-button">Жою</a></td>
          </tr>

          <?php
      }
  } else {
      echo "<tr><td colspan='5'>Себет бос!</td></tr>";
  }

  $conn->close();
  ?>

<tr>
        <td colspan="4">Сома: <span id="totalSum"><?php echo $totalSum; ?></span></td>
    </tr>
</table>

<div class="form-container">
    <h2>Тапсырысты рәсімдеу үшін форманы толтырыңыз:</h2>
    <form action="process_form.php" method="POST">
        <div class="form-group">
            <label for="address">Сома:</label>
            <input type="text" name="totalSum" value="<?php echo $totalSum; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="name">Аты-жөніңіз:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Телефон нөміріңіз:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Мекенжайыңыз:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <button type="submit" class="submit-btn">Тапсырысты рәсімдеу</button>
        </div>
    </form>
</div>
</div>

<!-- Footer section start -->
<footer class="footer">
        <div class="box-container">
            <div class="box">
                <a href="#home" class="logo">
                    <img src="./images/logo.png" alt="">
                </a>
                <div class="address">
                    <i class="fa-solid fa-location-dot"></i>
                    <address title="Address">Жәңгір хан көшемі, 53 </address>
                </div>
                <div class="email">
                    <i class="fa-solid fa-envelope"></i>
                    <a href="mailto:thanhnam290596@gmail.com" class="mailto" title="Email">cheezy@gmail.com</a>
                </div>
                <div class="phone">
                    <i class="fa-solid fa-phone"></i>
                    <a href="tel:+0942898298" class="telephone" title="Phone">+7 747 444 77 88</a>
                </div>
            </div>
            <div class="box">
                <h3>Сілтемелер</h3>
                <a href="#home"><i class="fa-solid fa-caret-right"></i>басты бет</a>
                <a href="#menu"><i class="fa-solid fa-caret-right"></i>мәзір</a>
                <a href="#about"><i class="fa-solid fa-caret-right"></i>біз туралы</a>
                <a href="#reviews"><i class="fa-solid fa-caret-right"></i>пікірлер/a>
                <a href="#contact"><i class="fa-solid fa-caret-right"></i>байланыс</a>
            </div>
            <div class="box">
                <h3>Көбірек</h3>
                <a href="#"><i class="fa-solid fa-caret-right"></i>үздік сатылым</a>
                <a href="#"><i class="fa-solid fa-caret-right"></i>қолдану ережелері</a>
            </div>
        </div>
        <div class="credit-footer">
            <p>© 2023 CHEEZY <span>Барлық құқықтар қорғалған</span></p>
        </div>
    </footer>
    <!-- Footer section end -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Update quantity on quantity change
            $(".quantity-input").change(function() {
                var cartItemId = $(this).data("cart-item-id");
                var quantity = $(this).val();
                var price = parseFloat($(this).closest("tr").find("td:nth-child(3)").text());
                var totalCell = $(this).closest("tr").find(".total-cell");

                // Calculate the new total
                var newTotal = (price * quantity).toFixed(2);

                // Update the total in the table cell
                totalCell.text(newTotal);
                

                $.ajax({
                    url: "updateQuantity.php",
                    type: "POST",
                    data: {
                        cartItemId: cartItemId,
                        quantity: quantity
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

    
    </script>
</body>
</html>
