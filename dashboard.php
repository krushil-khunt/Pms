<?php
session_start();

require_once "config/db.php";
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

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Dashboard</title>
</head>

<body>

    <?php include "includes/sidebar.php"; ?>

    <div class="main-content">

        <h1>Dashboard</h1>

        <?php
        echo "Active Product=" . implode($row1 = $result->fetch_row()) . "<br>";
        echo "Inactive Product=" . implode($row2 = $resultInactive->fetch_row()) . "<br>";
        echo "User=" . implode($row3 = $userdata->fetch_row()) . "<br>";
        ?>

    </div>

</body>

</html>