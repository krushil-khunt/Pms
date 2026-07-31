<?php

require_once "../../config/db.php";

$cat_id=$_POST['catval'];
$sub_catname=$_POST['subname'];

// echo $cat_name."<br>";
// echo $sub_catname;

$sql="insert into sub_categories(sub_cate_name,categorie_id) values ('$sub_catname','$cat_id')";

if($con->query($sql)){
    echo "Add Subcategories";
}else{
    echo "Not add Subcategories".$con->error;
}




