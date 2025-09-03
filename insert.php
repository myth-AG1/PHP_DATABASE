<?php
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];

// Prepare the SQL statement
$sql = "INSERT INTO students (name, email, course) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters to the statement
// 'sss' stands for three string parameters
$stmt->bind_param("sss", $name, $email, $course);

// Execute the statement
if ($stmt->execute()) {
    echo "Student registered successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>