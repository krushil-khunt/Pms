<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>
    <div class="col-2">
        <div class="mb-3">
            <input type="text" id="categorie_name" name="categorie_name" class="form-control" oninput="query(this.value,1)" >
        </div>
      </div>
        <div>
            <button type="button" class="btn btn-outline-secondary" onclick="addsub()">Add Sub Categorie</button>
        </div>
    <?php }?>

 
    <div>
        <span id="addsubcate"></span>
    </div>
       <nav aria-label="Page navigation example">
    <ul class="pagination">

        <li class="page-item">
            <a class="page-link" href="#" onclick="query('', 1)">1</a>
        </li>

        <li class="page-item">
            <a class="page-link" href="#" onclick="query('', 2)">2</a>
        </li>

        <li class="page-item">
            <a class="page-link" href="#" onclick="query('', 3)">3</a>
        </li>

    </ul>
</nav>
</nav>
    <script src="subcategoryAjax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
