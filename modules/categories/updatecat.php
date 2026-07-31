<?php
require_once "../../config/db.php";

$id=$_POST['idu'];
$catname=$_POST['name'];

// echo $id."<br>";
// echo $catname."<br>";

$sql="update categories set cate_name='$catname' where id='$id'";

if($con->query($sql)){
    echo "Update categories ";
}else{
    echo "not Update Categorie".$con->error;
}