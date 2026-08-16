function add(){
    console.log("click btn");
    const xhttp=new XMLHttpRequest();
    xhttp.onload = function(){

    // if (this.responseText.trim() == "Add Categorie") {
        window.location.href = "manage.php";
    // } else {
    //     document.getElementById("addcate").innerHTML = this.responseText;
    // }
    }
    xhttp.open("GET","manage.php",true);
    xhttp.send();
}

function addCategorie(){
    const addname=document.getElementById("catname");
    // console.log(addname);

    const xhttp=new XMLHttpRequest();
    xhttp.onload = function(){
        if(this.responseText.trim() === "Add Categorie"){

            document.getElementById("message").innerHTML = `
                <div class="alert alert-primary" role="alert">
                    Category added successfully
                </div>
            `;

            document.getElementById("message").scrollIntoView({
                behavior: "smooth",
                block: "center"
            });

            setTimeout(function(){
                window.location.href = "index.php";
            }, 2000);

        }else{

            document.getElementById("message").innerHTML = `
                <div class="alert alert-danger" role="alert">
                    ${this.responseText}
                </div>
            `;

            document.getElementById("message").scrollIntoView({
                behavior: "smooth",
                block: "center"
            });

        }
    }
    xhttp.open("POST","add.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("addname=" + addname.value);
}

function editCategory(id){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function()
    {
        document.body.innerHTML = this.responseText;
    }

    xhttp.open("POST","edit.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id);
}

function updateCategory(id){
    const idu = document.getElementById("id").value;
    const name = document.getElementById("catname").value;
    
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function()
    {
        if(this.responseText.trim() === "Update categories"){

        document.getElementById("message").innerHTML = `
            <div class="alert alert-primary" role="alert">
                Category updated successfully
            </div>
        `;

        document.getElementById("message").scrollIntoView({
            behavior: "smooth",
            block: "center"
        });

        setTimeout(function(){
            window.location.href = "index.php";
        }, 2000);

    }else{

        document.getElementById("message").innerHTML = `
            <div class="alert alert-danger" role="alert">
                ${this.responseText}
            </div>
        `;

        document.getElementById("message").scrollIntoView({
            behavior: "smooth",
            block: "center"
        });

    }
    }

    xhttp.open("POST","updatecat.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("idu="+idu+"&name="+name);

}

function deleteCategory(id){
    Swal.fire({
        title: "Are you sure?",
        text: "This category will be deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "Cancel"
    }).then((result) => {
        if (result.isConfirmed) {

            const xhttp = new XMLHttpRequest();

            xhttp.onload = function() {
                if (this.status === 200) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Category deleted successfully.",
                        icon: "success"
                    });
                    query("", 1);
                }
            };
            xhttp.open("POST", "delete.php", true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
        }
    });
}

function query(){

    const q = document.getElementById("categorie_name").value;
    const order = document.getElementById("order").value;

    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
            document.getElementById("addcate").innerHTML=this.responseText;
        }
    };
    xhttp.open("GET","display.php?q=" + q +"&order=" + order,true);
    xhttp.send();
}

query();

const order = document.getElementById("order");

order.addEventListener("change", function(){
    query();
});



