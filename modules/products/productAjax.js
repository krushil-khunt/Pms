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

// const selcecat_id=document.getElementById('selectcat');
// selcecat_id.addEventListener('change', function() {
//     let categoryId = this.value;
//     console.log(categoryId);

//     const xhttp = new XMLHttpRequest();

//     xhttp.onload = function(){
//         document.getElementById("selectsub").innerHTML = this.responseText;
//     };
//     xhttp.open("POST", "create-product-ajax.php", true);
//     xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//     xhttp.send("category=" + categoryId);
// });

const selcecat_id = document.getElementById("selectcat");

if (selcecat_id) {
    selcecat_id.addEventListener("change", function () {

        let categoryId = this.value;

        const xhttp = new XMLHttpRequest();

        xhttp.onload = function () {
            document.getElementById("selectsub").innerHTML = this.responseText;
        };

        xhttp.open("POST", "create-product-ajax.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("category=" + categoryId);
    });
}


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


    document.getElementById("categoriesError").innerHTML = "";
    document.getElementById("subcategoriesError").innerHTML = "";
    document.getElementById("nameError").innerHTML = "";
    document.getElementById("primaryimgError").innerHTML = "";
    document.getElementById("galleryimgError").innerHTML = "";
    document.getElementById("priceError").innerHTML = "";
    document.getElementById("quantityError").innerHTML = "";
    document.getElementById("colorError").innerHTML = "";
    document.getElementById("sizeError").innerHTML = "";
    document.getElementById("hightError").innerHTML = "";
    document.getElementById("widthError").innerHTML = "";
    document.getElementById("weightError").innerHTML = "";
    document.getElementById("StatusError").innerHTML = "";

    let isValid = true;

    if(category === "") {
        document.getElementById("categoriesError").innerHTML =
            "Please select category";
        isValid = false;
    }

    if(subcategory === "") {
        document.getElementById("subcategoriesError").innerHTML =
            "Please select sub category";
        isValid = false;
    }

    if(name.trim() === "") {
        document.getElementById("nameError").innerHTML =
            "Product name is required";
        isValid = false;
    }

    if(!primaryimg) {
        document.getElementById("primaryimgError").innerHTML =
            "Primary image is required";
        isValid = false;
    }

    if(galleryimg.length === 0) {
        document.getElementById("galleryimgError").innerHTML =
            "Gallery image is required";
        isValid = false;
    }

    if(price === "") {
        document.getElementById("priceError").innerHTML =
            "Price is required";
        isValid = false;
    }else if(Number(price) <= 0) {
        document.getElementById("priceError").innerHTML =
            "Price must be greater than 0";
        isValid = false;
    }

    if(quantity === "") {
        document.getElementById("quantityError").innerHTML =
            "Quantity is required";
        isValid = false;
    }else if(Number(quantity) < 0) {
        document.getElementById("quantityError").innerHTML =
            "Quantity cannot be negative";
        isValid = false;
    }

    if(color.trim() === "") {
        document.getElementById("colorError").innerHTML =
            "Color is required";
        isValid = false;
    }

    if(size === "") {
        document.getElementById("sizeError").innerHTML =
            "Size is required";
        isValid = false;
    }else if(Number(size) <= 0) {
        document.getElementById("sizeError").innerHTML =
            "Size must be greater than 0";
        isValid = false;
    }

    if(height === "") {
        document.getElementById("hightError").innerHTML =
            "Height is required";
        isValid = false;
    }else if(Number(height) <= 0) {
        document.getElementById("hightError").innerHTML =
            "Height must be greater than 0";
        isValid = false;
    }

    if(width === "") {
        document.getElementById("widthError").innerHTML =
            "Width is required";
        isValid = false;
    }else if(Number(width) <= 0) {
        document.getElementById("widthError").innerHTML =
            "Width must be greater than 0";
        isValid = false;
    }

    if(weight === "") {
        document.getElementById("weightError").innerHTML =
            "Weight is required";
        isValid = false;
    }else if(Number(weight) <= 0) {
        document.getElementById("weightError").innerHTML =
            "Weight must be greater than 0";
        isValid = false;
    }


    if(status === "") {
        document.getElementById("StatusError").innerHTML =
            "Please select status";
        isValid = false;
    }


    if(!isValid) {
        document.getElementById("demo").innerHTML =
            "Please check the form details";
        return;
    }

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
        if(this.responseText.trim() === "Product added successfully"){
            document.getElementById("message").innerHTML = `
                <div class="alert alert-primary" role="alert">
                    Product added successfully
                </div>
            `;
            document.getElementById("message").scrollIntoView({
                behavior: "smooth",
                block: "center"
            });
            setTimeout(function(){
                window.location.href = "index.php";
            }, 500);
        }else{
            document.getElementById("message").innerHTML = `
                <div class="alert alert-danger" role="alert">
                    ${this.responseText}
                </div>
            `;
        }

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
        if(this.responseText.trim() === "Product updated successfully") {
            document.getElementById("message").innerHTML = `
                <div class="alert alert-primary" role="alert">
                    Product updated successfully
                </div>
            `;
            document.getElementById("message").scrollIntoView({
                behavior: "smooth",
                block: "center"
            });

            setTimeout(function () {
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
    xhttp.open("POST","updatepro.php",true);
    xhttp.send(data);
}

// function deleteProduct(id){
// const xhttp = new XMLHttpRequest();

//     xhttp.onload = function()
//     {
//         document.body.innerHTML = this.responseText;
//     }

//     xhttp.open("POST","delete.php",true);
//     xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
//     xhttp.send("id=" + id);

// }

function deleteProduct(id){

    Swal.fire({
        title: "Are you sure?",
        text: "This product will be deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "Cancel"
    }).then((result) => {

        if (result.isConfirmed) {
            const xhttp = new XMLHttpRequest();

            xhttp.onload = function() {
                console.log(this.responseText);
                if (this.status === 200) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Product deleted successfully.",
                        icon: "success"
                    });
                    query();
                }
            };
            xhttp.open("POST","delete.php",true);
            xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhttp.send("id=" + id);
        }
    });
}


function query(page=1){

    const q = document.getElementById("categorie_name").value;
    const price = document.getElementById("price").value;
    const order = document.getElementById("order").value;

    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("addproduct").innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "display.php?q=" + encodeURIComponent(q) + "&price=" + price+"&order="+order+"&page=" + page,true);
    xhttp.send();
}
query(1);

const price=document.getElementById("price");

price.addEventListener("change",function(){
  query();
})


const order=document.getElementById("order");
order.addEventListener("change",function(){
    query();
})


let selectproduct=[];

function productSelect(productId,checked) {
    if(checked){
        selectproduct.push(productId);
    }else{
        selectproduct = selectproduct.filter(function(id) {
            return id != productId;
        });
    }

    console.log(selectproduct);
}

function deleteSelectedProducts() {

    if (selectproduct.length === 0) {
        Swal.fire({
            title: "No Product Selected",
            text: "Please select at least one product.",
            icon: "warning"
        });
        return;
    }

    Swal.fire({
        title: "Are you sure?",
        text: "Selected products will be deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "Cancel"
    }).then((result) => {

        if (result.isConfirmed) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                console.log(this.responseText);
                if (this.status === 200) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Products deleted successfully.",
                        icon: "success"
                    });
                    selectproduct = [];
                    query();
                }
            };

            xhttp.open("POST", "delete.php", true);
            xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhttp.send("product_ids=" + selectproduct.join(","));
        }
    });
}

function csv(){
window.location.href = "csvex.php";
}

function updateStatus(id, checked) {
    let status;
    if(checked){
        status = "active";
    }else{
        status = "inactive";
    }
    
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        console.log(this.responseText);
    };
    xhttp.open("POST", "update_status.php", true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("sid=" + id + "&status=" + status);
}