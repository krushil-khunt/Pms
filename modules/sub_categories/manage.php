<?php 
session_start();
require_once "../../config/db.php";

$sql = "SELECT * FROM categories";

$result = $con->query($sql);

// while($row = $result->fetch_assoc()){
//     echo $row['id']." ".$row['cate_name'];
// }
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
            <h1 class="col-6 offset-3">Add Sub categories</h1>
            <div class="col-6 offset-3">
                <div class="mb-3">
                    <select id="seletcat" class="form-select">
                        <option>Select</option>
                        <?php while($row = $result->fetch_array()) {?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['cate_name'] ?> </option>
                        <?php } ?> 
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subcatname" class="form-label">Subcategorie Name</label>
                    <input type="text" name="subcatname" id="subcatname" class="form-control">
                </div>

                <div>
                    <button type="button"  class="btn btn-primary" onclick="addsubCategorie()">Add</button>
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
