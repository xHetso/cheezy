<?php
// Database connection details
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "cheezy";

// Get the message ID from the AJAX request
$messageId = $_POST["id"];

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Delete the message from the database
$sql = "DELETE FROM messages WHERE id = " . $messageId;

if ($conn->query($sql) === TRUE) {
  // Return a success response if the deletion was successful
  echo "Message deleted successfully";
} else {
  // Return an error response if the deletion failed
  echo "Error deleting message: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
