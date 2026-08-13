<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Register User</title>
</head>
<body>
        <div class="row mt-3">
            <h1 class="col-6 offset-3">Register User</h1>
            <div class="col-6 offset-3">
                <div id="message"></div>   
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <span id="nameError" class="text-danger"></span>
                </div>

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
                    <button type="button" class="btn btn-primary" id="registerBtn">Register</button>
                </div>

                <a href="login.php">I have an Account</a>

                <div>
                    <span id="demo"></span>
                 </div>

         </div>
        </div> 
    <script>

    const rebtn = document.getElementById("registerBtn");

    rebtn.addEventListener("click", function () {

        const name = document.getElementById("name");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const user = document.getElementById("user");

        const nameerror = document.getElementById("nameError");
        const emailerror = document.getElementById("emailError");
        const passworderror = document.getElementById("passwordError");
        const usererror = document.getElementById("userError");


        nameerror.innerHTML = "";
        emailerror.innerHTML = "";
        passworderror.innerHTML = "";
        usererror.innerHTML = "";

        document.getElementById("message").innerHTML = "";

        let isValid = true;

        if(name.value.trim() === ""){
            nameerror.innerHTML = "Name is required";
            isValid = false;
        }
        
        const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

        if(email.value.trim() === ""){
            emailerror.innerHTML = "Email is required";
            isValid = false;
    
        }else if(!emailPattern.test(email.value)){
            emailerror.innerHTML = "Enter a valid email";
            isValid = false;
        }

        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])\S{5,}$/;

        if (password.value.trim() === "") {
            passworderror.innerHTML = "Password is required";
            isValid = false;
        }else if (!passwordPattern.test(password.value)) {
            passworderror.innerHTML =
            "Password must contain 5 characters, uppercase, lowercase, number and special character";
            isValid = false;
        }

        if(user.value === ""){
            usererror.innerHTML = "Please select user type";
            isValid = false;
        }

        if(isValid){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {

                if (this.responseText === "User register") {

                    document.getElementById("message").innerHTML = `
                        <div class="alert alert-primary" role="alert">
                            User registered successfully
                        </div>
                    `;

                    name.value = "";
                    email.value = "";
                    password.value = "";
                    user.value = "";

                } else {
                    document.getElementById("message").innerHTML = `
                        <div class="alert alert-danger" role="alert">
                            ${this.responseText}
                        </div>
                    `;
                }
            };
            xhttp.open("POST", "register_ax.php", true);
            xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhttp.send(
                "name=" + name.value +
                "&email=" + email.value +
                "&password=" + password.value +
                "&user=" + user.value
            );

        } else {
            document.getElementById("message").innerHTML = `
                <div class="alert alert-danger" role="alert">
                    Please check the form details
                </div>
            `;
        }
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
