<?php
session_start();


// Assuming your MySQL credentials
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "login_register"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract form data
$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$email = $_POST['email']; // Get email from POST data

// Update user details in the database
$sql = "UPDATE userlog SET name=?, dob=?, gender=?, contact=? WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $dob, $gender, $contact, $email);

if ($stmt->execute()) {
    echo "Profile updated successfully";
} else {
    echo "Error updating profile: " . $conn->error;
}

// Close connection
$conn->close();
?>
