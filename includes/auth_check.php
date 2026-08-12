<?php

function requireLogin(){
    if(!isset($_SESSION['id'])){
        header("Location: /Qrolic/Pms/auth/login.php");
        exit();
    }
}

function requireAdmin(){
    requireLogin();
    if($_SESSION['role']!=='admin'){
        header("Location: /Qrolic/Pms/auth/login.php");
        exit();
    }
}
?>