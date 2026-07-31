<?php
require_once "../../config/db.php";

$id=$_POST['id'];


// echo $id."<br>";


$sql="delete from sub_categories where id='$id'";

if($con->query($sql)){
    echo "Delete Subcategories ";
}else{
    echo "not delet Subcategories".$con->error;
}