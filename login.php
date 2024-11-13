<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create a connection
$conn = new mysqli('localhost', 'root', '', 'registration_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and bind SQL statement to prevent SQL injection
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify password (assuming password is hashed using password_hash())
    if (password_verify($password, $row['password'])) {
        // Successful login
        $_SESSION['user_id'] = $row['id'];
        header("Location: home.html");
        exit();
    } else {
        // Invalid password
        header("Location: home.html");
    }
} else {
    // Invalid username
    header("Location: home.html");
}

$stmt->close();
$conn->close();
?>