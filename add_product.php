<?php
// Database connection details
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "cheezy";

// Create a new product in the database
function addNewProduct($name, $image, $category, $price)
{
    // Database connection
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO burgers (name, image, category, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $image, $category, $price);

    // Execute the SQL statement
    $result = $stmt->execute();

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    return $result;
}

// Check if the request method is POST and all required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productName"]) && isset($_FILES["productImage"]) && isset($_POST["productCategory"]) && isset($_POST["productPrice"])) {
    $productName = $_POST["productName"];
    $productImage = $_FILES["productImage"]["name"];
    $productCategory = $_POST["productCategory"];
    $productPrice = $_POST["productPrice"];

    // Set the destination directory to save the uploaded file
    $uploadDirectory = "images/";

    // Generate a unique file name for the uploaded image
    $imageFileName = uniqid() . "_" . basename($_FILES["productImage"]["name"]);

    // Set the path to save the uploaded image
    $uploadFilePath = $uploadDirectory . $imageFileName;

    // Check if the file was successfully uploaded
    if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $uploadFilePath)) {
        $success = addNewProduct($productName, $uploadFilePath, $productCategory, $productPrice);

        if ($success) {
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            $response = array("success" => false);
            echo json_encode($response);
        }
    } else {
        $response = array("success" => false);
        echo json_encode($response);
    }
}
?>
