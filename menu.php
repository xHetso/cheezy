<!DOCTYPE html>
<html>
<head>
    <title>Мәзір</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="shortcut icon" href="./images/favicon-burger.png" type="image/x-icon">

   <!-- FontAwesome ver 6.1.1 from cdnjs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <!-- Animate on scroll library (AOS) link css -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"/>

    <!-- Custom css link from style.css -->
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .contact .row .map {
    display: none;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 40rem;
    flex: 1 1 40rem;
    border: 0.2rem solid rgba(255, 255, 255, 0.3);
    border-radius: 0.5rem;
}
        .contact .row .form {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 40rem;
    flex: 1 1 40rem;
    width: 50%;
    width: 1000px;
    margin-left: 300px;
    margin-right: 300px;
}
.contact .row .form .form-container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    gap: 2rem;
    margin-bottom: 2rem;
    width: 1000px;
}
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

.filter-buttons {
  text-align: center;
  margin-bottom: 20px;
}

.filter-button {
  display: inline-block;
  padding: 8px 16px;
  margin-right: 8px;
  font-size: 20px;
  font-weight: bold;
  border: none;
  border-radius: 4px;
  background-color: #eacf4f;
  color: #333;
  cursor: pointer;
}

.filter-button:hover {
  background-color: #e0e0e0;
}

.filter-button.active {
  background-color: #333;
  color: #fff;
}

.filter-buttons {
  text-align: center;
  margin-bottom: 20px;
}

.filter-button {
  display: inline-block;
  padding: 8px 16px;
  margin-right: 8px;
  font-size: 20px;
  font-weight: bold;
  border: none;
  border-radius: 4px;
  background-color: #f2f2f2;
  color: #333;
  cursor: pointer;
}

.filter-button:hover {
  background-color: #e0e0e0;
}

.filter-button.active {
  background-color: yellow;
  color: #333;
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

<!-- Menu section start -->
<section class="menu" id="menu">
    <div class="heading">
        <img src="./images/title-img.png" alt="">
        <h1>Мәзір</h1>
    </div>

    <div class="filter-buttons">
        <button class="filter-button active" data-filter="all">Барлығы</button>
        <button class="filter-button" data-filter="burger">Бургерлер</button>
        <button class="filter-button" data-filter="cocktail">Коктейльдер</button>
        <button class="filter-button" data-filter="soda">Газдалған сусындар</button>
        <button class="filter-button" data-filter="fries">Картофель фри</button>
    </div>

    <div class="box-container">
        <?php
        // Database connection parameters
        $servername = "127.0.0.1";
        $username = "root";
        $password = "root";
        $dbname = "cheezy";

        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the current active category
        $activeCategory = "all";

        if (isset($_GET['category'])) {
            $activeCategory = $_GET['category'];
        }

        // Generate the SQL query based on the selected category
        $sql = "SELECT * FROM burgers";

        if ($activeCategory !== 'all') {
            $sql .= " WHERE category = '$activeCategory'";
        }

        $result = $conn->query($sql);

        // Generate HTML code for each burger
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $burgerId = $row["id"];
                $burgerName = $row["name"];
                $burgerPrice = $row["price"];
                $burgerImage = $row["image"];
                ?>

                <div class="box product" data-aos="flip-left" data-aos-delay="100" data-category="<?php echo $row["category"]; ?>">
                    <div class="image">
                        <img src="<?php echo $burgerImage; ?>" alt="">
                    </div>
                    <div class="content">
                        <div class="rating">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h3><?php echo $burgerName; ?></h3>
                        <div class="price"><?php echo $burgerPrice; ?> тг</div>
                        <a href="addToCart.php?productId=<?php echo $burgerId; ?>" class="btn" id="showFormButton">ТАПСЫРЫС БЕРУ</a>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "Нет доступных бургеров.";
        }

        $conn->close();
        ?>
    </div>
</section>


<script>
    // Получение всех кнопок фильтрации
    const filterButtons = document.querySelectorAll('.filter-button');

    // Обработчик события нажатия на кнопку фильтрации
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Удаление класса "active" у всех кнопок
            filterButtons.forEach(btn => btn.classList.remove('active'));

            // Добавление класса "active" к нажатой кнопке
            this.classList.add('active');

           // Получение значения атрибута data-filter выбранной кнопки
const category = this.dataset.filter;

// Показ или скрытие товаров в зависимости от выбранной категории
const products = document.querySelectorAll('.box.product');
products.forEach(product => {
    if (category === 'all' || product.dataset.category === category) {
        product.style.display = 'block';
    } else {
        product.style.display = 'none';
    }
});

// Принудительное обновление макета страницы
setTimeout(function() {
    window.dispatchEvent(new Event('resize'));
}, 0);

        });
    });
    
</script>
      <!-- Menu section end -->

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
                <a href="index.php"><i class="fa-solid fa-caret-right"></i>басты бет</a>
                <a href="menu.php"><i class="fa-solid fa-caret-right"></i>мәзір</a>
                <a href="index.php#about"><i class="fa-solid fa-caret-right"></i>біз туралы</a>
                <a href="index.php#reviews"><i class="fa-solid fa-caret-right"></i>пікірлер</a>
                <a href="index.php#contact"><i class="fa-solid fa-caret-right"></i>байланыс</a>
            </div>
        </div>
        <div class="credit-footer">
            <p>© 2023 CHEEZY <span>Барлық құқықтар қорғалған</span></p>
        </div>
    </footer>
    <!-- Footer section end -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Custom javascript source from main.js -->
        <script src="./js/main.js" type="text/javascript"></script>
    
    <!-- Animate on scroll library (AOS) src js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out'
        })
    </script>


   
</body>
</html>
