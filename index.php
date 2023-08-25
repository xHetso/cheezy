<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI Restaurant-FastFood </title>
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

.parent-container {
  display: flex;
  justify-content: center;
}

.btn-yellow {
  display: flex;
  justify-content: center; /* Горизонтальное выравнивание по центру */
  padding: 8px 16px;
  font-size: 20px;
  font-weight: bold;
  margin-top: 10px;
  background-color: #f2f2f2;
  color: #333;
  text-transform: uppercase;
  position: absolute; /* Позиционирование элемента */
  left: 50%; /* Расположение по горизонтали в середине */
  transform: translate(-50%, -50%); /* Центрирование элемента */
}


.btn-yellow:hover {
  background-color: yellow;
}


.parent-container {
  display: flex;
  justify-content: center;
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
            <a href="#reviews">Пікірлер</a>
            <a href="#contact">Байланыс</a>
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

    <!-- Home section start -->
    <section class="home" id="home">
        <div class="content">
            <img src="./images/burger-baner.png" alt="">
            <h3 data-aos="fade-up" data-aos-delay="150">Әр cheezy бургердегі ірімшіктің сиқырын аш</h3>
            <p data-aos="fade-up" data-aos-delay="300">Ерекше соус және нәзік ірімшік! Сіздің гастрономиялық шытырман оқиғаңыз осы жерден басталады...</p>
            <a href="menu.php" class="btn" data-aos="fade-up" data-aos-delay="450">МӘЗІР</a>
        </div>
    </section>
    <!-- Home section end -->
    
    <!-- Services section start -->
    <section class="services" id="services">
        <div class="box" data-aos="fade-right" data-aos-delay="150">
            <i class="fa-solid fa-burger"></i>
            <h3>Үздік сапа</h3>
            <p>Біз тек балғын және жоғары сапалы ингредиенттерді мұқият таңдаймыз.</p>
        </div>
        <div class="box" data-aos="fade-up" data-aos-delay="150">
            <i class="fa-solid fa-truck-fast"></i>
            <h3>Тегін жеткізу</h3>
            <p>Енді біз бургерлерді дәл есігіңіздің алдына дейін тегін жеткіземіз.</p>
        </div>
        <div class="box" data-aos="fade-left" data-aos-delay="150">
            <i class="fa-solid fa-headphones"></i>
            <h3>24/7 байланыс</h3>
            <p>Біздің дәмді бургерлерге тәуліктің кез келген уақытында тапсырыс бере аласыз.</p>
        </div>
    </section>
    <!-- Services section end -->

    <!-- Menu section start -->
<section class="menu" id="menu">
    <div class="heading">
        <img src="./images/title-img.png" alt="">
        <h1>Мәзір</h1>
    </div>

    <div class="box-container">
        <?php
        // Параметры подключения к базе данных
        $servername = "127.0.0.1";
        $username = "root";
        $password = "root";
        $dbname = "cheezy";

        // Подключение к базе данных
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка соединения на наличие ошибок
        if ($conn->connect_error) {
            die("Ошибка подключения к базе данных: " . $conn->connect_error);
        }

        // Запрос для получения всех бургеров из таблицы "burgers"
        $sql = "SELECT * FROM burgers";
        $result = $conn->query($sql);

        // Генерация HTML-кода для каждого бургера
        $counter = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $counter++;
                $burgerId = $row["id"];
                $burgerName = $row["name"];
                $burgerPrice = $row["price"];
                $burgerImage = $row["image"];
                ?>

                <div class="box product" data-aos="flip-left" data-aos-delay="100" <?php if ($counter > 8) { echo 'style="display: none;"'; } ?>>
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

            // Проверяем, есть ли еще продукты в меню, чтобы показать кнопку "Увидеть полное меню"
            if ($result->num_rows > 8) {
                ?>
                <div class="parent-container">
              <a href="menu.php" class="btn-yellow">Толық мәзірді көру</a>
               </div>

                <?php
            }
        } else {
            echo "Нет доступных бургеров.";
        }

        // Закрытие соединения с базой данных
        $conn->close();
        ?>
    </div>
</section>


    <!-- About section start -->
    <section class="about" id="about">
        <div class="image" data-aos="zoom-in-up" data-aos-delay="100">
            <img src="./images/about-img.png" alt="">
        </div>
        <div class="content" data-aos="zoom-in-down" data-aos-delay="100">
            <h3 class="title">Бургер әлеміне еніңіз</h3>
            <p>
                Біздің мақсатымыз – әрбір қонақтарымыздың нағыз бургерден ләззат алуы үшін
                балғын ингредиенттер, шырынды ет және ерекше дәмнің тамаша үйлесімін жасау.
            </p>
            <div class="icons">
                <h3><i class="fa-solid fa-check"></i> үздік баға</h3>
                <h3><i class="fa-solid fa-check"></i> үздік сервис</h3>
                <h3><i class="fa-solid fa-check"></i> шырынды ет</h3>
                <h3><i class="fa-solid fa-check"></i> табиғи ірімшік</h3>
                <h3><i class="fa-solid fa-check"></i> қайталанбас дәм</h3>
                <h3><i class="fa-solid fa-check"></i> фирмалық мәзір</h3>
                <h3><i class="fa-solid fa-check"></i> табиғи ірімшік</h3>
                <h3><i class="fa-solid fa-check"></i> әдемі веб-сайт</h3>
            </div>
            <a href="menu.php" class="btn">ТАПСЫРЫС БЕРУ</a>
        </div>
    </section>
    <!-- About section end -->

    <!-- Reviews section start -->
    <section class="reviews" id="reviews">
        <div class="heading">
            <img src="./images/title-img.png" alt="">
            <h1>Пікірлер</h1>
        </div>
        <div class="box-container">
            <div class="box">
                <img src="./images/pic-2.png" alt="">
                <h3>Жанат</h3>
                <p>Мен бұл гамбургерге өте қуаныштымын! Жылдам қызмет көрсету және қайта-қайта оралуға мүмкіндік беретін дәм.</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
            </div>
            <div class="box">
                <img src="./images/pic-1.png" alt="">
                <h3>Мариям</h3>
                <p>Ингредиенттердің керемет таңдауы мен ерекше тұздықтар! Қызмет мейірімді және кәсіби болды.</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star-half-stroke"></i>
                </div>
            </div>
            <div class="box">
                <img src="./images/pic-3.png" alt="">
                <h3>Дастан</h3>
                <p>Мұндай дәмді чизбургерлерді ешқашан жеп көрген емеспін! Керемет ірімшік!</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
            </div>
        </div>
    </section>
    <!-- Reviews section end -->

    <!-- Contact section start -->
    <section class="contact" id="contact">
        <div class="heading">
            <img src="./images/title-img.png" alt="">
            <h1>Байланыс</h1>
        </div>

        <div class="row">
            <iframe class="map" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31358.85937640892!2d106.62056785875097!3d10.74547000991327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e7cff633fdd%3A0x85ee85db9cb263ba!2zUXXhuq1uIDYsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1649859772794!5m2!1svi!2s" 
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
            <div class="form" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="2000">
                <div class="form-container">
                    <div class="box">
                        <i class="fa-solid fa-map"></i>
                        <h4>Мекенжай</h4>
                        <p>Жәңгір хан көшесі, 53</p>
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-paper-plane"></i>
                        <h4>Email</h4>
                        <p>cheezy@gmail.com</p>
                    </div>
                    <div class="box">
                        <i class="fa-solid fa-phone"></i>
                        <h4>Phone</h4>
                        <p>+7 747 444 77 88</p>
                    </div>
                </div>
                <form action="save_message.php" method="POST">
                    <input type="text" name="name" class="input-box" placeholder="есіміңіз">
                    <input type="email" name="email" class="input-box" placeholder="email">
                    <input type="text" name="phone" class="input-box" placeholder="телефон нөміріңіз">
                    <textarea name="messenger" class="input-box" id="messenger" placeholder="хабарлама..."></textarea>
                    <input type="submit" value="ХАБАРЛАМА ЖІБЕРУ" class="btn">
                </form>
            </div>
        </div>
    </section>
    <!-- Contact section end -->

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
                <a href="menu.php"><i class="fa-solid fa-caret-right"></i>мәзір</a>
                <a href="#about"><i class="fa-solid fa-caret-right"></i>біз туралы</a>
                <a href="#reviews"><i class="fa-solid fa-caret-right"></i>пікірлер</a>
                <a href="#contact"><i class="fa-solid fa-caret-right"></i>байланыс</a>
            </div>
        </div>
        <div class="credit-footer">
            <p>© 2023 CHEEZY <span>Барлық құқықтар қорғалған</span></p>
        </div>
    </footer>
    <!-- Footer section end -->


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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>
</html>