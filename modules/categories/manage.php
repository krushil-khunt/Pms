<?php
session_start();

require_once __DIR__ . '/../../includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/Qrolic/Pms/assets/css/style.css">
    <title>Add categories</title>
</head>
<body>
    <div class="main-content">
        <div class="row mt-3">
            <h1 class="col-6 offset-3">Add categories</h1>
            <div class="col-6 offset-3">
                <div class="mb-3">
                    <label for="catname" class="form-label">Categorie Name</label>
                    <input type="text" name="catname" id="catname" class="form-control">
                </div>

                <div>
                    <button type="button"  class="btn btn-primary" onclick="addCategorie()">Add</button>
                </div>

                <div>
                    <span id="demo"></span>
                </div>
            </div>
        </div>
    </div>

<script src="categoryAjax.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
