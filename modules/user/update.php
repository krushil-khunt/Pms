<?php
session_start();
require_once "../../config/db.php";

require_once "../../includes/auth_check.php";

requireAdmin();

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$role=$_POST['role'];

$sql="UPDATE users set name='$name', email='$email', role='$role' WHERE id='$id'";

if($con->query($sql)){
    echo "Update User";
}else{
    echo "not update usaer".$con->error;
}

?>