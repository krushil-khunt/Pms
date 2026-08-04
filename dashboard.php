<?php
session_start();

if(isset($_SESSION['id'])){
    echo "<h1> welcome ". $_SESSION['name']."</h1>";
    echo $_SESSION['email']."<br>";
    echo $_SESSION['role']."<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['id'])){ ?>
        <a href="modules/categories/index.php">Categories</a><br><br>
        <a href="modules/sub_categories/index.php">Sub_Categories</a><br><br>
        <a href="modules/products/index.php">Product</a><br><br>
        <a href="auth/logout.php">Logout</a>
    <?php } ?>
</body>
</html> 

