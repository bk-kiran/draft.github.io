<?php

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','accounts');
if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from users where username = ?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $stmt_result = $stmt -> get_result();
    if($stmt_result ->num_rows > 0) {
        $data = $stmt_result -> fetch_assoc();
        if($data['password'] === $password) {
            echo "<h2>Login Successful</h2>";
        } else {
            echo "<h2>Invalid username or password</h2>";
        }

    } else {
        echo "<h2>Invalid username or password</h2>";
    }

}



?>