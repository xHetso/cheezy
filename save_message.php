<?php
$servername = "127.0.0.1"; // Имя сервера базы данных
$username = "root"; // Имя пользователя базы данных
$password = "root"; // Пароль пользователя базы данных
$dbname = "cheezy"; // Имя базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['messenger'];

$sql = "INSERT INTO messages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Хабарлама жіберілді, жауап күтіңіз!" ;
    // Задержка в три секунды
    sleep(2);

    // JavaScript перенаправление
    echo '<script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 2000);
          </script>';
} else {
    echo "Ошибка при сохранении сообщения в базе данных: " . $conn->error;
}

$conn->close();
?>
