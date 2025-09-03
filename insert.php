<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student-db";

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
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Prepare the SQL statement
$sql = "INSERT INTO students (name, email, course, gender, dob, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind parameters to the statement
// 'sssssss' stands for seven string parameters
$stmt->bind_param("sssssss", $name, $email, $course, $gender, $dob, $phone, $address);

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