<?php
session_start();
require_once "../../config/db.php";

$id=$_POST['id'];

$sql = "SELECT * FROM users WHERE id='$id'";

$result = $con->query($sql);

$row = $result->fetch_assoc();

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
    <?php require_once '../../includes/sidebar.php'; ?>
    <div class="main-content">
        <div class="row mt-3">
            <h1 class="col-6 offset-3">Edit user</h1>
            <div class="col-6 offset-3">
                <div class="mb-3">
                    <div id="message"></div>
                    <input type="hidden" id="id" value="<?php echo $row['id']; ?>">
                    <label for="catname" class="form-label">User Name</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?php echo $row['name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="catname" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="catname" class="form-label">Role</label>
                    <input type="text" name="role" id="role" class="form-control" value="<?php echo $row['role']; ?>">
                </div>
                <div>
                    <button type="button"  class="btn btn-primary" onclick="updateuser()">Update</button>
                </div>
        </div>
        <div>
            <span id="user"></span>
        </div>
    </div>


    <script src="userAjax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
