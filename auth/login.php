<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Login User</title>
</head>
<body>
    <div class="row mt-3">
        <h1 class="col-6 offset-3">Login</h1>
        <div class="col-6 offset-3">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <select id="user" class="form-select">
                    <option>Select</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div>
                <button type="button" class="btn btn-primary" onclick="clikck()">Login</button>
            </div>
                <a href="register.php">New user</a>
            <div>
                <span id="demo"></span>
            </div>
        </div>
    </div>
    <script>
    
        function clikck(){
            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const user = document.getElementById("user");

            console.log(user.value);
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function(){
                // document.getElementById("demo").innerHTML = this.responseText;
                if (this.responseText.trim() == "success") {
                    window.location.href = "../dashboard.php";
                } else {
                    document.getElementById("demo").innerHTML = this.responseText;
                }
            }
            xhttp.open("POST","login_ax.php",true);
            xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhttp.send("email=" + email.value +
                "&password=" + password.value +
                "&user=" + user.value);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
