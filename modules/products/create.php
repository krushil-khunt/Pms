<?php
session_start();

// if(isset($_SESSION['id'])) {
//     echo "<h1>Welcome, ".$_SESSION['name']."</h1>";
// }
require_once "../../config/db.php";

$sql="SELECT * FROM categories";

$result=$con->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Add product</title>
</head>
<body>
    <div class="row mt-3">
        <h1 class="col-6 offset-3">Add Product</h1>
        <div class="col-3 offset-4">
            <div class="mb-3">

                <select id="selectcat" class="form-select">
                    <option>Select categories</option>
                    <?php while($row = $result->fetch_array()) {?>
                        <option value="<?php echo $row['id'] ?>"><?php echo $row['cate_name'] ?> </option>
                    <?php } ?> 
                </select>

            </div>
            <div class="mb-3">
                <select id="selectsub" class="form-select">
                    <option value="">Select Sub Category</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="primaryimg" class="form-label">Primary Image</label>
                <input class="form-control" type="file" id="primaryimg" name="img">
            </div>
            <div class="mb-3">
                <label for="galleryimg" class="form-label">Gallery Images</label>
                <input class="form-control" type="file" id="galleryimg" name="gallery_images[]" multiple>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" id="price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control">
            </div>
             <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" id="color" class="form-control">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="number" name="size" id="size" class="form-control">
            </div>
            <div class="mb-3">
                <label for="hight" class="form-label">hight</label>
                <input type="number" name="hight" id="hight" class="form-control">
            </div>
            <div class="mb-3">
                <label for="width" class="form-label">width</label>
                <input type="number" name="width" id="width" class="form-control">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">weight</label>
                <input type="number" name="weight" id="weight" class="form-control">
            </div>
            <div class="mb-3">
                <select id="Status" class="form-select">
                    <option>Status</option>
                        <option value="active">active</option>
                        <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div>
                <button type="button" class="btn btn-primary" onclick="addproduct()">Add Product</button>
            </div>
            <div>
                <span id="demo"></span>
            </div>
        </div>
    </div>
    <script src="productAjax.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>






