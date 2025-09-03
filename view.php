<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query students
$sql = "SELECT id, name, email, course, reg_date FROM students";
$result = $conn->query($sql);

// Start HTML
echo "<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
</head>
<body>
    <h2>Registered Students</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Registration Date</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["course"]) . "</td>
                <td>" . htmlspecialchars($row["reg_date"]) . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No students registered yet.";
}

// Close the connection
$conn->close();

echo "</body>
</html>";
?>