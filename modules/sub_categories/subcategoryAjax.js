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
        document.getElementById("subdemo").innerHTML=this.responseText;
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
        document.getElementById("subdemo").innerHTML=this.responseText;
    }

    xhttp.open("POST","updatesubcat.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("sub_id="+sub_id+"&sub_name="+sub_name);
}

function deleteSubCategory(id){
    // console.log("delet btn",id);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function()
    {
        document.getElementById("subdemo").innerHTML=this.responseText;
    }
    xhttp.open("POST","delete.php",true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id=" + id);

}