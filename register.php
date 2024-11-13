<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

// Prepare and bind SQL statement to prevent SQL injection
$sql = "INSERT INTO users (first_name, last_name, username, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $firstName, $lastName, $username, $password);

// Execute the statement
if ($stmt->execute()) {
    // Successful registration
    $_SESSION['user_id'] = $stmt->insert_id; // Optional: store user ID in session
    header("Location: login.html"); // Redirect to login page
    exit();
} else {
    // Handle registration error
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
