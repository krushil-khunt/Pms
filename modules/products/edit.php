<?php
session_start();
require_once "../../config/db.php";

require_once "../../includes/auth_check.php";

requireAdmin();

$id=$_POST['id'];

$sql="SELECT categories.id,categories.cate_name,sub_categories.id,categories.cate_name,
    sub_categories.sub_cate_name,products.product_name,products.primary_img,products.status,
    product_meta.gallery_img,product_meta.price,product_meta.quantity,product_meta.color,
    product_meta.size,product_meta.height,product_meta.width,product_meta.weight,products.id
    FROM products
    INNER JOIN product_meta
    ON products.id=product_meta.product_id
    INNER JOIN categories
    ON products.categorie_id=categories.id
    INNER JOIN sub_categories
    ON categories.id=sub_categories.categorie_id
    WHERE products.id=$id";

$result=$con->query($sql);
$row = $result->fetch_array();

// $sql2="SELECT * FROM categories";
$sql2="SELECT * FROM sub_categories";
$result2=$con->query($sql2);

// $result2=$con->query($sql2);
// $row2 = $result2->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/Qrolic/Pms/assets/css/style.css">
</head>
<body>
    <?php require_once '../../includes/sidebar.php'; ?>
    <div class="main-content">
        <div class="row mt-3">
            <h1 class="col-6 offset-3">Update Product</h1>
            <div class="col-3 offset-4">
                <div class="mb-3">
                    
                    <select id="select_sub" class="form-select">
                        <option value="">Select Sub Category</option>
                        <?php while($row2=$result2->fetch_array()) {?>
                            <option value="<?php echo $row2['id'] ?>"><?php echo $row2['sub_cate_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['product_name'] ;?>">
                </div>
                <div class="mb-3">
                    <label for="primaryimg" class="form-label">Primary Image</label>
                    <input class="form-control" type="file" id="primaryimg" name="img">
                    <img src="../../assets/uploads/primary/<?php echo $row['primary_img']; ?>"width="100">
                </div>
                <div class="mb-3">
                    <label for="galleryimg" class="form-label">Gallery Images</label>
                    <input class="form-control" type="file" id="galleryimg" name="gallery_images[]" multiple> 
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="<?php echo $row['price'] ;?>">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="<?php echo $row['quantity'] ;?>">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" id="color" class="form-control" value="<?php echo $row['color'] ;?>">
                </div>
                <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <input type="number" name="size" id="size" class="form-control" value="<?php echo $row['size'] ;?>">
                </div>
                <div class="mb-3">
                    <label for="hight" class="form-label">hight</label>
                    <input type="number" name="hight" id="hight" class="form-control" value="<?php echo $row['height'] ;?>">
                </div>
                <div class="mb-3">
                    <label for="width" class="form-label">width</label>
                    <input type="number" name="width" id="width" class="form-control" value="<?php echo $row['width'] ;?>">
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">weight</label>
                    <input type="number" name="weight" id="weight" class="form-control" value="<?php echo $row['weight'] ;?>">
                </div>
                <div class="mb-3">
                    <select id="Status" class="form-select">
                        <option value="active"<?php if($row['status'] == "active") echo "selected"; ?>>
                            Active
                        </option>

                        <option value="Inactive"
                            <?php if($row['status'] == "Inactive") echo "selected"; ?>>
                            Inactive
                        </option>

                    </select>
                </div>
                <input type="hidden" id="id" value="<?php echo $_POST['id']; ?>">
                <div>
                    <button type="button" class="btn btn-primary" onclick="updateproduct(<?php echo $id ?>)">Update</button>
                </div>
                <div>
                    <span id="demo"></span>
                </div>
            </div>
        </div>
    </div>
    <script src="productAjax.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>