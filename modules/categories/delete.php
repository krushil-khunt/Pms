<?php
require_once "../../config/db.php";

$id=$_POST['id'];


// echo $id."<br>";


$sql="delete from categories where id='$id'";

if($con->query($sql)){
    echo "Delete categories ";
}else{
    echo "not delet categories".$con->error;
}