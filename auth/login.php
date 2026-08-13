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
            <div id="message"></div>   
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
                <span id="emailError" class="text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                <span id="passwordError" class="text-danger"></span>
            </div>
            <div class="mb-3">
                <select id="user" class="form-select">
                    <option value="">Select</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <span id="userError" class="text-danger"></span>
            </div>
            <div>
                <label><input type="checkbox" name="remember" id="remember">Remember Me</label>
            </div>
            <div>
                <button type="button" class="btn btn-primary" id="logbtn" >Login</button>
            </div>
                <a href="register.php">New user</a>
            <div>
                <span id="demo"></span>
            </div>
        </div>
    </div>
    <script>
        const logbtn=document.getElementById("logbtn");
        logbtn.addEventListener("click",function(){
            const email = document.getElementById("email");
            const password = document.getElementById("password");
            const user = document.getElementById("user");
            const rem=document.getElementById("remember");

            const emailerror = document.getElementById("emailError");
            const passworderror = document.getElementById("passwordError");
            const usererror = document.getElementById("userError");

            emailerror.innerHTML = "";
            passworderror.innerHTML = "";
            usererror.innerHTML = "";

            document.getElementById("message").innerHTML = "";

            let isValid = true;

            if(email.value.trim() === ""){
                emailerror.innerHTML = "Email is required";
                isValid = false;
            }
            if (password.value.trim() === "") {
                passworderror.innerHTML = "Password is required";
                isValid = false;
            }
            if(user.value === ""){
                usererror.innerHTML = "Please select user type";
                isValid = false;
            }
            
            if(isValid){
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function(){

                    if (this.responseText.trim() == "admin") {

                        window.location.href = "../dashboard.php";

                    }  else if (this.responseText.trim() == "user") {

                        window.location.href = "../modules/products/index.php";
                    } 
                    else {
                        document.getElementById("message").innerHTML = `
                            <div class="alert alert-danger" role="alert">
                                ${this.responseText}
                            </div>
                        `;
                    }
                }
                xhttp.open("POST","login_ax.php",true);
                xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                xhttp.send("email=" + email.value +
                    "&password=" + password.value +
                    "&user=" + user.value +
                    "&rem=" + rem.checked
                );
            }else{
                document.getElementById("message").innerHTML = `
                <div class="alert alert-danger" role="alert">
                    Please check the form details
                </div>
            `;
            }
        });

        // function clikck(){
        //     const email = document.getElementById("email");
        //     const password = document.getElementById("password");
        //     const user = document.getElementById("user");
        //     const rem=document.getElementById("remember");

        //     // console.log(user.value);
        //     const xhttp = new XMLHttpRequest();
        //     xhttp.onload = function(){

        //         if (this.responseText.trim() == "admin") {

        //             window.location.href = "../dashboard.php";

        //         }  else if (this.responseText.trim() == "user") {

        //             window.location.href = "../modules/products/index.php";
        //         } 
        //         else {
        //             document.getElementById("demo").innerHTML = response;
        //         }
        //     }
        //     xhttp.open("POST","login_ax.php",true);
        //     xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        //     xhttp.send("email=" + email.value +
        //         "&password=" + password.value +
        //         "&user=" + user.value +
        //         "&rem=" + rem.checked
        //     );
        // }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>


