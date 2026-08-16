<?php 
session_start();
require_once "../../config/db.php";

$subid=$_POST['id'];
// echo $subid;

$sql="SELECT sub_categories.id,sub_categories.sub_cate_name,categories.cate_name FROM categories
INNER JOIN sub_categories
ON categories.id=sub_categories.categorie_id
WHERE sub_categories.id=$subid";

$result=$con->query($sql);

$row=$result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <link rel="stylesheet" href="/Qrolic/Pms/assets/css/style.css">
    <title>Edit Subcategories</title>
</head>
<body>
    <?php require_once '../../includes/sidebar.php'; ?>
    <div class="main-content">
        <div class="row mt-3">
            <h1 class="col-6 offset-3">Edit Subcategories</h1>
            <div class="col-6 offset-3">
                <div class="mb-3">
                      <div id="message"></div>
                    <select id="seletsubcat" class="form-select">

                            <option value="<?php echo $row['id'] ?>"><?php echo $row['cate_name'] ?> </option>

                    </select>
                </div>
                <input type="hidden" name="subcatid" id="subcatid" class="form-control" value="<?php echo $row['id']; ?>">

                <div class="mb-3">
                    <label for="subcatname" class="form-label">Subcategorie Name</label>
                    <input type="text" name="subcatname" id="subcatname" class="form-control" value="<?php echo $row['sub_cate_name']; ?>">
                </div>

                <div>
                    <button type="button"  class="btn btn-primary" onclick="updateSubCategory()">Update</button>
                </div>

                <div>
                    <span id="subdemo"></span>
                </div>
            </div>
        </div>
    </div>

<script src="subcategoryAjax.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
