<?php
session_start();

require_once "../../includes/auth_check.php";

requireLogin();
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
        <div class="col-2">
            <div class="mb-3">
                <input type="text" id="categorie_name" name="categorie_name" class="form-control" oninput="query()" >
                    <select id="price" class="form-select">
                        <option>All</option>
                        <option value="1">1000-10,000</option>
                        <option value="2">10,000-100,000</option>
                    </select>
                    <select id="order" class="form-select">
                        <option>Order</option>
                        <option value="new" selected>Newest First</option>
                        <option value="A-Z">A-Z</option>
                        <option value="Z-A">Z-A</option>
                        <option value="hig-low">Price (High to Low)</option>
                        <option value="low-high">Price (Low to High )</option>
                    </select>
            </div>
        </div>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>
        <div>
            <button type="button" class="btn btn-outline-danger" onclick="add()">Add Product</button>
        </div>
        <?php } ?>

        <table  class="table">
            <thead>
            <tr>
                <th>Select</th>
                <th>Product Name</th>
                <th>Primary Image</th>
                <th>Height</th>
                <th>Width</th>
                <th>Status</th>
                <th>Price</th>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>
                    <th>Edit</th>
                    <th>Delete</th>
                <?php } ?>

            </tr>
        </thead>

        <tbody id="addproduct">
            
                <td><input type="checkbox" id="product" name="product"></td>
            
        </tbody>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>

        <button type="button" class="btn btn-danger" onclick="deleteSelectedProducts()">Delete Selected</button>

        <?php } ?>

        <ul class="pagination">

            <li class="page-item">
                <a class="page-link" href="#" onclick="query(1)">1</a>
            </li>

            <li class="page-item">
                <a class="page-link" href="#" onclick="query(2)">2</a>
            </li>

            <li class="page-item">
                <a class="page-link" href="#" onclick="query(3)">3</a>
            </li>

        </ul>
</div>

    <script src="productAjax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>









