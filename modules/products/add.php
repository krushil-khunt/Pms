<?php
// session_start();
// if(isset($_SESSION['id'])) {
//     echo "<h1>Welcome, ".$_SESSION['name']."</h1>";
// }
// require_once "../../config/db.php";

// $category = $_POST['category'];
// $subcategory = $_POST['subcategory'];
// $name = $_POST['name'];
// $price = $_POST['price'];
// $color = $_POST['color'];
// $size = $_POST['size'];
// $width = $_POST['width'];
// $height = $_POST['hight'];
// $weight = $_POST['weight'];
// $quantity = $_POST['quantity'];
// $userid = $_SESSION['id'];
// $status = $_POST['Status'];

// $primaryimage = $_FILES['img']['name'];
// $tmpNamep   = $_FILES['img']['tmp_name'];

// move_uploaded_file(
//     $tmpNamep,
//     "../../uploads/primary/" . $primaryimage
// );

// $galleryImages = $_FILES['gallery_images']['name'];
// $tmpNamesg   = $_FILES['gallery_images']['tmp_name'];
// $allimg=[];

// foreach ($galleryImages as $key => $galleryImage) {
//     move_uploaded_file(
//         $tmpNamesg[$key],
//         "../../uploads/gallery/" . $galleryImage
//     );
//     $allimg[] = $galleryImage;
// }

// $imgnames = implode(',', $allimg);

// $sql = "INSERT INTO products 
// (product_name, primary_img,user_id,categorie_id,sub_categorie_id,status) 
// VALUES 
// ('$name', '$primaryimage', '$userid', '$category', '$subcategory', '$status')";

// if($con->query($sql)) {
//     $product_id=$con->insert_id;

//     $sql2="INSERT INTO product_meta
//     (product_id,size,height,width,gallery_img,color,weight,price,quantity)
//     VALUES 
//     ('$product_id','$size','$height','$width','$imgnames','$color','$weight','$price','$quantity')";

//     if($con->query($sql2)) {
//         echo "Product added successfully";
//     } else {
//         echo "Not Add successfully " .$con->error;
//     }
// }else {

//     echo "Product Error: " . $con->error;
// }



session_start();

require_once "../../config/db.php";


$category = $_POST['category'];
$subcategory = $_POST['subcategory'];
$name = $_POST['name'];
$price = $_POST['price'];
$color = $_POST['color'];
$size = $_POST['size'];
$width = $_POST['width'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$quantity = $_POST['quantity'];
$status = $_POST['status'];

$userid = $_SESSION['id'];


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

    foreach($galleryImages as $key => $galleryImage){
        $tmpName = $galleryTmp[$key];
        $galleryPath = __DIR__ . "/../../assets/uploads/gallery/" . $galleryImage;

        if(move_uploaded_file($tmpName, $galleryPath)){
            $galleryNames[] = $galleryImage;
        }else{
            die("Gallery image upload failed: " . $galleryImage);
        }
    }
}
$imgnames = implode(",", $galleryNames);
$sql="INSERT INTO products
        (product_name,primary_img,user_id,categorie_id,sub_categorie_id,status)
        VALUES
        ('$name','$primaryimage','$userid','$category','$subcategory','$status')";


if($con->query($sql)){

    $product_id = $con->insert_id;

    $sql2="INSERT INTO product_meta
            (product_id,size,height,width,gallery_img,color,weight,price,quantity)
            VALUES
            ('$product_id','$size','$height','$width','$imgnames','$color','$weight','$price','$quantity')";

    if($con->query($sql2)){
        echo "Product added successfully";
    }else{
        echo "Product Meta Error: " . $con->error;
    }
    if($con->query($sql2)){

    $productmeta_id = $con->insert_id;

    $sql3 = "UPDATE products
             SET productmeta_id = '$productmeta_id'
             WHERE id = '$product_id'";

    if($con->query($sql3)){

        echo "Product added successfully";

    }else{

        echo "Product Meta ID Update Error: " . $con->error;
    }

}else{

    echo "Product Meta Error: " . $con->error;
}
}else{
    echo "Product Error: " . $con->error;
}

?>
