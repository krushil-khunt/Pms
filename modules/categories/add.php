<?php
require_once "../../config/db.php";

$catname=$_POST['addname'];

$sql="insert into categories(cate_name) values ('$catname')";

if($con->query($sql)){
    echo "Add Categorie";
}else{
    echo "not add Categorie".$con->error;
}