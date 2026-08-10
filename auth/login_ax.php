<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/db.php';
$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pass= md5($_POST['password']);
$role= $_POST['user'];

// echo $email."<br>";
// echo $pass."<br>";
// echo $role."<br>";

$sql="SELECT * FROM users WHERE email='$email'";

$result=$con->query($sql);

if($result->num_rows > 0){

    $row=$result->fetch_assoc();

    if($pass == $row['passwords'] && $role == $row['role']){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];

        // header("Location: ../dashboard.php");
        if(isset($_POST['rem'])){
            setcookie("email", $email, time() + (30 * 24 * 60 * 60), "/");
        }
        echo "success";

    }else{
        echo "Wrong Password";
    }
}else{
    echo "Email Not Found";
}



