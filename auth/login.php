<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
</head>
<body>
        <h2>Login </h2>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br><br>
        <select id="user">
            <option>Select</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br><br>
       <button onclick="clikck()">Login</button>
        <a href="register.php">New user</a>
       <div>
            <span id="demo"></span>
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
</body>
</html>
