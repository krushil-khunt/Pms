<?php
session_start();

require_once "config/db.php";
require_once "includes/auth_check.php";
requireAdmin();
// require_once "includes/sidebar.php";

// $sql="SELECT COUNT(*) FROM products";
$sql="SELECT COUNT(*) FROM products WHERE status='active'";
$sqlInactive="SELECT COUNT(*) FROM products WHERE status='Inactive'";
$user="SELECT COUNT(*) FROM users";

$result=$con->query($sql);
$resultInactive=$con->query($sqlInactive);
$userdata=$con->query($user)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Dashboard</title>
</head>

<body>

    <?php include "includes/sidebar.php"; ?>



        <div class="main-content">

            <h1>Dashboard</h1>

            <div class="card text-bg-light mb-3" style="max-width: 18rem; height: 81px;">
                <div class="card-header">Active Product</div>
                    <div class="card-body">
                        <p class="card-text"><?php echo implode($row1 = $result->fetch_row()) . "<br>"; ?></p>
                    </div>
            </div>

            <div class="card text-bg-light mb-3" style="max-width: 18rem; height: 81px;">
                <div class="card-header">Inactive Product</div>
                    <div class="card-body">
                        <p class="card-text"><?php echo implode($row2 = $resultInactive->fetch_row()) . "<br>"; ?></p>
                    </div>
            </div>

            <div class="card text-bg-light mb-3" style="max-width: 18rem; height: 81px;">
                <div class="card-header">User</div>
                    <div class="card-body">
                        <p class="card-text"><?php echo implode($row3 = $userdata->fetch_row()) . "<br>"; ?></p>
                    </div>
            </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>