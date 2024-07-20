<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "reliance-data";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['username'];
$password = $_POST['password'];

// Check if the email exists in the database
$sql = "SELECT Name, Password FROM admin_credentials WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Bind the result to variables
    $stmt->bind_result($dbName, $dbPassword); // Adjusted to match the columns selected in the query
    $stmt->fetch();

    // Verify the password
    if ($password == $dbPassword) {
        // Password is correct, set session variables
        $_SESSION['email'] = $email; // Store the email, if needed
        $_SESSION['username'] = $dbName;

        // Redirect or do further processing
        header("Location: ../index.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No admin account found with that email.";
}

$stmt->close();
$conn->close();
?>
