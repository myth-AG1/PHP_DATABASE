<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
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

// Query students with all new columns
$sql = "SELECT id, name, email, course, gender, dob, phone, address, reg_date FROM students";
$result = $conn->query($sql);

// Start HTML
echo "<!DOCTYPE html>
<html>
<head>
    <title>Registered Students</title>
    <style>
        body { font-family: sans-serif; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Registered Students</h2>";

if ($result->num_rows > 0) {
    echo "<table>
          <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Registration Date</th>
            </tr>
          </thead>
          <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["id"]) . "</td>
                <td>" . htmlspecialchars($row["name"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["course"]) . "</td>
                <td>" . htmlspecialchars($row["gender"]) . "</td>
                <td>" . htmlspecialchars($row["dob"]) . "</td>
                <td>" . htmlspecialchars($row["phone"]) . "</td>
                <td>" . htmlspecialchars($row["address"]) . "</td>
                <td>" . htmlspecialchars($row["reg_date"]) . "</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No students found.";
}

echo "</body></html>";

$conn->close();
?>