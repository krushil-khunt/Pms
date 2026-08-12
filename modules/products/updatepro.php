<?php
require_once "../../config/db.php";


require_once "../../includes/auth_check.php";

requireAdmin();

$id=$_POST['id'];

// echo $id;

$subcategory = $_POST['select_sub'];
$name = $_POST['name'];
$price = $_POST['price'];
$color = $_POST['color'];
$size = $_POST['size'];
$width = $_POST['width'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$quantity = $_POST['quantity'];
$status = $_POST['status'];

$primaryimage = $_FILES['img']['name'];
$primaryTmp = $_FILES['img']['tmp_name'];

$primaryPath = __DIR__ . "/../../assets/uploads/primary/" . $primaryimage;

if(!move_uploaded_file($primaryTmp, $primaryPath)){

    die("Primary image upload failed");

}

$galleryNames = [];

if(isset($_FILES['gallery_images'])){

    $galleryImages =$_FILES['gallery_images']['name'];
    $galleryTmp =$_FILES['gallery_images']['tmp_name'];

    foreach($galleryImages as $key => $value){
        $tmpName = $galleryTmp[$key];
        $galleryPath = __DIR__ . "/../../assets/uploads/gallery/" . $value;

        if(move_uploaded_file($tmpName, $galleryPath)){
            $galleryNames[] = $value;
        }else{
            die("Gallery image upload failed: " . $value);
        }
    }
}
$imgnames = implode(",", $galleryNames);

$sql="UPDATE  products SET product_name='$name', primary_img='$primaryimage',
sub_categorie_id='$subcategory',status='$status' WHERE id=$id";

if($con->query($sql)){

    $sql2="UPDATE  product_meta SET size='$size',height='$height'
    ,width='$width',gallery_img='$imgnames',color='$color',weight='$weight',price='$price',
    quantity='$quantity' WHERE product_id=$id";

    if($con->query($sql2)){
        echo "data update";   
    }else{
        echo "Product Meta Error: " . $con->error;
    }
}else{
    echo "Product Error: " . $con->error;
}
