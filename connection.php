<?php
$username="root";
$servername="localhost";
$password="";
$db_name="login_register";
$conn=new mysqli($servername,$username,"",$db_name,3306);
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
echo "successful";
?>