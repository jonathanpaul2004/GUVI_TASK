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

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform SQL query to check login credentials
    $sql = "SELECT * FROM userlog WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows >= 1) {
        echo "Login successful";
        //header("Location: profile.html");
        // You can redirect the user to another page here if login is successful
    } else {
        echo "Login failed. Invalid email or password.";
    }

    // Close connection
    $conn->close();
}
?>
