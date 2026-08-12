<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../config/db.php";

require_once "../../includes/auth_check.php";

requireAdmin();

if(isset($_POST['id'])){

    $id = (int)$_POST['id'];
    $sql = "DELETE FROM product_meta WHERE product_id = $id";

    if($con->query($sql)){

        $sql1 = "DELETE FROM products WHERE id = $id";

        if($con->query($sql1)){
            echo "data delete";
        }else{
            echo "Product delete error: " . $con->error;
        }

    }else{
        echo "Product meta delete error: " . $con->error;
    }
    exit;
}

if(isset($_POST['product_ids'])){

    $productid = explode(",", $_POST['product_ids']);

    foreach($productid as $pro_id){

        $pro_id = (int)$pro_id;

        $sql = "DELETE FROM product_meta WHERE product_id = $pro_id";

        if(!$con->query($sql)){
            echo "Product meta error: " . $con->error;
            exit;
        }

        $sql1 = "DELETE FROM products WHERE id = $pro_id";

        if(!$con->query($sql1)){
            echo "Product error: " . $con->error;
            exit;
        }
    }
    echo "data delete";
    exit;
}

echo "No delete request";

?>