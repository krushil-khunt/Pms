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
        document.getElementById("demo").innerHTML = this.responseText;
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
        document.getElementById("demo").innerHTML = this.responseText;
    }

    xhttp.open("POST","updatecat.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("idu="+idu+"&name="+name);

}

function deleteCategory(id){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function()
    {
        document.getElementById("demo").innerHTML = this.responseText;
    }

    xhttp.open("POST","delete.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id);
}