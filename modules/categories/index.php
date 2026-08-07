<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>categories</title>
</head>
<body>
   
     <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>
      <div class="col-2">
        <div class="mb-3">
            <input type="text" id="categorie_name" name="categorie_name" class="form-control" oninput="query(this.value)" >
        </div>
      </div>
        <div>
            <button type="button" class="btn btn-outline-danger" onclick="add()">Add Categorie</button>
        </div>
    <?php }?>

    <div>
        <span id="addcate"></span>
    </div>

    <script src="categoryAjax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

