function add() {
// console.log("Add Product button clicked");
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function () {
        window.location.href = "create.php";
    //     console.log(this.responseText);

    // document.getElementById("demo").innerHTML =
    //     this.responseText;
    };


    xhttp.open("GET", "create.php", true);
    xhttp.send();
}

const selcecat_id=document.getElementById('selectcat');
selcecat_id.addEventListener('change', function() {
    let categoryId = this.value;
    console.log(categoryId);

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        document.getElementById("selectsub").innerHTML = this.responseText;
    };
    xhttp.open("POST", "create-product-ajax.php", true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("category=" + categoryId);
});


function addproduct(){

    const category = document.getElementById("selectcat").value;
    const subcategory = document.getElementById("selectsub").value;
    const name = document.getElementById("name").value;
    const price = document.getElementById("price").value;
    const color = document.getElementById("color").value;
    const size = document.getElementById("size").value;
    const height = document.getElementById("hight").value;
    const width = document.getElementById("width").value;
    const status = document.getElementById("Status").value;
    const weight = document.getElementById("weight").value;
    const quantity = document.getElementById("quantity").value;

    const primaryimg =document.getElementById("primaryimg").files[0];

    const galleryimg =document.getElementById("galleryimg").files;


    const data = new FormData();

    data.append("category", category);
    data.append("subcategory", subcategory);
    data.append("name", name);
    data.append("price", price);
    data.append("color", color);
    data.append("size", size);
    data.append("height", height);
    data.append("width", width);
    data.append("status", status);
    data.append("weight", weight);
    data.append("quantity", quantity);
    data.append("img", primaryimg);


    for(let i = 0; i < galleryimg.length; i++){
        data.append("gallery_images[]", galleryimg[i]);
    }
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function(){

        console.log(this.responseText);

        document.getElementById("demo").innerHTML =
            this.responseText;

        // window.location.href = "create.php";
    };

    xhttp.open("POST", "add.php", true);

    xhttp.send(data);
}

function editProduct(id){
    const xhttp = new XMLHttpRequest();

    xhttp.onload = function()
    {
        document.body.innerHTML = this.responseText;
    }

    xhttp.open("POST","edit.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id);
}

function updateproduct(id){

    console.log(id);


    const subcategory = document.getElementById("select_sub").value;
    const name = document.getElementById("name").value;
    const price = document.getElementById("price").value;
    const color = document.getElementById("color").value;
    const size = document.getElementById("size").value;
    const height = document.getElementById("hight").value;
    const width = document.getElementById("width").value;
    const status = document.getElementById("Status").value;
    const weight = document.getElementById("weight").value;
    const quantity = document.getElementById("quantity").value;

    // console.log(subcategory);
    // console.log(status);

    const primaryimg =document.getElementById("primaryimg").files[0];

    const galleryimg =document.getElementById("galleryimg").files;

    const data = new FormData();

    data.append("select_sub", subcategory);
    data.append("name", name);
    data.append("price", price);
    data.append("color", color);
    data.append("size", size);
    data.append("height", height);
    data.append("width", width);
    data.append("status", status);
    data.append("weight", weight);
    data.append("quantity", quantity);
    data.append("img", primaryimg);
    data.append("id", id);


    for(let i = 0; i < galleryimg.length; i++){
        data.append("gallery_images[]", galleryimg[i]);
    }

    const xhttp = new XMLHttpRequest();

    xhttp.onload = function()
    {
        document.getElementById("demo").innerHTML = this.responseText;
    }

    xhttp.open("POST","updatepro.php",true);

    xhttp.send(data);
}

function deleteProduct(id){
const xhttp = new XMLHttpRequest();

    xhttp.onload = function()
    {
        document.body.innerHTML = this.responseText;
    }

    xhttp.open("POST","delete.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id);

}