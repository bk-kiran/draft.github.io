<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','accounts');
$sql_u = "SELECT * FROM users WHERE username='$username'";
$sql_e = "SELECT * FROM users WHERE email='$email'";
$res_u = mysqli_query($conn, $sql_u);
$res_e = mysqli_query($conn, $sql_e);


if($conn->connect_error){
    die("Connection Failed : ". $conn->connect_error);

}else if(mysqli_num_rows($res_u) > 0) {
  echo "Sorry... username already taken";

}else if(mysqli_num_rows($res_e) > 0){
  echo "Sorry... email already taken"; 

} else {
    $stmt = $conn->prepare("insert into users(username, email, password)
        values(?, ?, ?)");
    $stmt->bind_param("sss",$username, $email, $password);
    $stmt->execute();
    echo "Registration success...";
    $stmt->close();
    $conn->close();
}






?>

<html lang="en">
  <head>
    <title>Registration Success</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <body>
