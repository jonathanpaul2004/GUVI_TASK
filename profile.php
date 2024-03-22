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

// Fetch email from POST data
$email = $_POST['email'];

// Query to fetch user details based on email
$sql = "SELECT name, email, gender, age, contact, dob FROM userlog WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows >= 1) {
    // Fetch user details
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
    $gender = $row['gender'];
    $age = $row['age'];
    $contact = $row['contact'];
    $dob = $row['dob'];
    
    // Prepare user details as JSON
    $userData = array(
        'name' => $name,
        'email' => $email,
        'gender' => $gender,
        'age' => $age,
        'contact' => $contact,
        'dob' => $dob
    );

    // Output user details as JSON
    echo json_encode($userData);
} else {
    echo "User not found";
}

// Close connection
$conn->close();
?>
