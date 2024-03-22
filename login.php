<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "login_register"; 

    
    $conn = new mysqli($servername, $username, "", $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

 
    $sql = "SELECT * FROM userlog WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows >= 1) {
        echo "Login successful";
       
    } else {
        echo "Login failed. Invalid email or password.";
    }

    
    $conn->close();
}
?>
