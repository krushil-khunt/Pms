function addsub(){
    // console.log("btn clik");
    const xhttp=new XMLHttpRequest();
    xhttp.onload=function(){
        window.location.href = "manage.php";
        // document.getElementById("addsubcate").innerHTML=this.responseText;
    }
    xhttp.open("GET","manage.php",true);
    xhttp.send()
}

function addsubCategorie(){
    // console.log("btn sub cllick");
    const catval=document.getElementById("seletcat");
    const subname=document.getElementById("subcatname");

    console.log(catval.value);
    console.log(subname.value);

    const xhttp=new XMLHttpRequest();

    xhttp.onload=function(){
        if(this.responseText.trim() === "Add Subcategories"){

            document.getElementById("message").innerHTML = `
                <div class="alert alert-primary" role="alert">
                    Sub Category added successfully
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
    xhttp.send("catval="+catval.value+"&subname="+subname.value);
}

function editSubCategory(id){
const xhttp = new XMLHttpRequest();

    xhttp.onload = function()
    {
        document.body.innerHTML = this.responseText;
    }

    xhttp.open("POST","edit.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id);
}

function updateSubCategory(id){
    const sub_id=document.getElementById('subcatid').value;
    const sub_name=document.getElementById('subcatname').value;

    console.log(sub_id);
    console.log(sub_name);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function()
    {
        if(this.responseText.trim() === "Update Subcategories"){

            document.getElementById("message").innerHTML = `
                <div class="alert alert-primary" role="alert">
                    Sub Category updated successfully
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

    xhttp.open("POST","updatesubcat.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("sub_id="+sub_id+"&sub_name="+sub_name);
}

function deleteSubCategory(id){

    Swal.fire({
        title: "Are you sure?",
        text: "This sub category will be deleted!",
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
                        text: "Sub Category deleted successfully.",
                        icon: "success"
                    });
                    query("", 1);
                }
            };
            xhttp.open("POST", "delete.php", true);
            xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
        }
    });
}

function query(str,page = 1){

    const q = document.getElementById("categorie_name").value;
    const order = document.getElementById("order").value;

    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("addsubcate").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "display.php?q=" + str+ "&order=" + order +"&page=" + page, true);
    xhttp.send();
}
query("",1);

const order = document.getElementById("order");

order.addEventListener("change", function(){

    query("",1);

});