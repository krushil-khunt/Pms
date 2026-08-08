<?php 
session_start();

require_once "../../config/db.php";

$q = $_GET['q'] ?? '';
// echo $q;

if($q == ''){
    $sql="SELECT sub_categories.id,sub_categories.sub_cate_name,categories.cate_name, FROM categories
    INNER JOIN sub_categories
    ON categories.id=sub_categories.categorie_id";
}else{
    $sql="SELECT sub_categories.id,sub_categories.sub_cate_name,categories.cate_name FROM categories
    INNER JOIN sub_categories
    ON categories.id=sub_categories.categorie_id
    WHERE sub_categories.sub_cate_name LIKE '%$q%'";
}

$result=$con->query($sql);

echo "<table>
<tr>
<th>Id</th>
<th>Sub_catName</th>
<th>category</th>";

if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
}

echo "</tr>";

while($row=$result->fetch_array()){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['sub_cate_name']."</td>";
    echo "<td>".$row['cate_name']."</td>";
    if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
        echo "<td><button onclick='editSubCategory(".$row['id'].")'>Edit</button></td>";
        echo "<td><button onclick='deleteSubCategory(".$row['id'].")'>Delet</button></td>";
    }
    echo "</tr>";
}

echo "</table>";
 ?>
