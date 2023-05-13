<?php
$servername = "localhost";
$username = "root";
$password = "Devam123";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$username = $_POST["name"];
$tweet = $_POST["hiss"];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO hisses (username, hiss) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $tweet);

// Execute the statement
if ($stmt->execute()) {
  echo "Tweet posted successfully";
} else {
  echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

# switch pages
header("Location: view_tweets.php");
exit;
?>

