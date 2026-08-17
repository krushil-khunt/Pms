<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/db.php';
$name=$_POST['name'];
$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$pass= md5($_POST['password']);
$role= $_POST['user'];

if($name == ""){
    echo "Name is required";
    exit();
}elseif(!preg_match("/^[A-Za-z\s]+$/", $name)){
    echo "Name should contain only alphabets";
    exit();
}

if($email == ""){
    echo "Email is required";
    exit();
}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Enter a valid email";
    exit();
}

if($pass == ""){
    echo "Password is required";
    exit();
}elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])\S{5,}$/", $pass)){
    echo "Password must contain 5 characters, uppercase, lowercase, number and special character";
    exit();

}

if($role == ""){
    echo "Please select user type";
    exit();
}elseif($role != "admin" && $role != "user"){
    echo "Invalid user type";
    exit();

}

$sql="insert into users(name,email,passwords,role) values ('$name','$email','$pass','$role')";

if($con->query($sql)){
    echo "User register";
}else{
    echo "Not register".$con->error;
}

// header("Location: login.php");

