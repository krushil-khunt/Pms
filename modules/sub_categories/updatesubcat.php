<?php
require_once "../../config/db.php";

$sub_id=$_POST['sub_id'];
$sub_catname=$_POST['sub_name'];

// echo $sub_id."<br>";
// echo $sub_catname."<br>";

$sql="update sub_categories set sub_cate_name='$sub_catname' where id='$sub_id'";

if($con->query($sql)){
    echo "Update Subcategories";
}else{
    echo "not Update SubCategorie".$con->error;
}