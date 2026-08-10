
<div class="sidbar">

    <?php if (isset($_SESSION['id'])) { ?>

    <div class="user-info">
            <p><?php echo $_SESSION['email']; ?></p>
            <p>Role: <?php echo $_SESSION['role']; ?></p>
    </div>
 <hr>
        <a href="/Qrolic/Pms/dashboard.php">Dashboard</a>
        <a href="/Qrolic/Pms/modules/categories/index.php">Categories</a>
        <a href="/Qrolic/Pms/modules/sub_categories/index.php">Sub Categories</a>
        <a href="/Qrolic/Pms/modules/products/index.php">Products</a>
        <a href="/Qrolic/Pms/auth/logout.php">Logout</a>

    <?php } ?>

</div>