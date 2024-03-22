<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming your MySQL credentials
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $dbname = "login_register"; // Your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $username, "", $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO userlog (name, email, password, gender, age, contact, dob) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $name, $email, $password, $gender, $age, $contact, $dob);

    // Assign values from $_POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "successful";
       
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
