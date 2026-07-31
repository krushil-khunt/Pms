<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/db.php';
$name=filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pass= md5($_POST['password']);
$role= $_POST['user'];

$sql="insert into users(name,email,passwords,role) values ('$name','$email','$pass','$role')";

if($con->query($sql)){
    echo "User register";
}else{
    echo "Not register".$con->error;
}

header("Location: login.php");

