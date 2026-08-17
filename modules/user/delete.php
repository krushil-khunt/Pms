<?php
session_start();
require_once "../../config/db.php";

require_once "../../includes/auth_check.php";

requireAdmin();

$id=$_POST['id'];


$sql="DELETE FROM users WHERE id='$id'";

if($con->query($sql)){
    echo "Delete user";
}else{
    echo "not update Delete".$con->error;
}

?>