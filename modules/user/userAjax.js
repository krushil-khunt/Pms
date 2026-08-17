function query(page = 1){
    const username = document.getElementById("username").value;
    const role = document.getElementById("role").value;
    const order = document.getElementById("order").value;

    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("user").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET","display.php?username=" +username +"&role=" + role +"&order=" + order +"&page=" + page,true);
    xhttp.send();
}
query(1);

const role = document.getElementById("role");
role.addEventListener("change", function(){

    query(1);

});

const order = document.getElementById("order");
order.addEventListener("change", function(){

    query(1);

});

function edituser(id){
    // console.log("btn clil user",id);
      const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("user").innerHTML=this.responseText;
        }
    };
    xhttp.open("POST", "edit.php", true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id);
}

function updateuser(){
    // console.log("update btns",id);
    const id = document.getElementById("id").value;
    const name = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const role = document.getElementById("role").value;

    // console.log("update btns");
    // console.log(id);
    // console.log(name);
    // console.log(email);
    // console.log(role);
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.responseText.trim() === "Update User"){
            document.getElementById("user").innerHTML = `
                <div class="alert alert-primary">
                    User updated successfully
                </div>
            `;
            setTimeout(function(){
                window.location.href = "index.php";
            }, 100);
        }else{
            document.getElementById("user").innerHTML = `
                <div class="alert alert-danger">
                    ${this.responseText}
                </div>
            `;
        }
    };
    xhttp.open("POST", "update.php", true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id+"&name="+name+"&email="+email+"&role="+role,true);
}

function deleteuser(id){  
    // console.log(id)
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("user").innerHTML=this.responseText;
        }
    };
    xhttp.open("POST", "delete.php", true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id,true);

}