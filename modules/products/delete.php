<?php
require_once "../../config/db.php";

$id=$_POST['id'];

$sql="DELETE FROM product_meta WHERE product_id = '$id'";

if($con->query($sql)){
    $sql1="DELETE FROM products WHERE id='$id';";

    if($con->query($sql1)){
        echo "data delete";
    }else{
        echo "not delet:".$con->error;
    }

}else{
        echo "not delet:".$con->error;
    }