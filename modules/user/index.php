<?php
session_start();
require_once "../../includes/auth_check.php";
requireAdmin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="/Qrolic/Pms/assets/css/style.css">
    <title>Document</title>
</head>
<body>
     <?php require_once '../../includes/sidebar.php'; ?>
        <div class="main-content">

    <div class="col-2">
        <div class="mb-3">

            <input type="text" id="searchUsername" class="form-control" placeholder="Search user..." oninput="query(1)">

            <select id="filterRole" class="form-select">
                <option value="">All Roles</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <select id="order" class="form-select">
                <option value="new" selected>Newest First</option>
                <option value="A-Z">A-Z</option>
                <option value="Z-A">Z-A</option>
            </select>

        </div>
    </div>

    <div>
        <span id="user"></span>
    </div>

</div>

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

    <script src="userAjax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

