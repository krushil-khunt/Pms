<?php
session_start();
require_once "../../config/db.php";

require_once "../../includes/auth_check.php";

requireAdmin();

$id=$_POST['sid'];
$status = $_POST['status'];

// echo $id."<br>";
// echo $status."<br>";

// exit();

$sql="UPDATE products set status='$status' where id='$id'";

if($con->query($sql)){
    echo "Status update";
}
else{
    echo "Not update".$con->error;
}

?>