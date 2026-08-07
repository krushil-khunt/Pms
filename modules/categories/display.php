<?php  
session_start();

require_once "../../config/db.php";

$q = $_GET['q'] ?? '';

if($q == ''){
    $sql="SELECT * FROM categories";

}else{
    
    $sql = "SELECT * FROM categories WHERE cate_name LIKE '%$q%'";
}

$result=$con->query($sql);

echo "<table>
    <tr>
    <th>id</th>
    <th>category</th>";

    if(isset($_SESSION['role']) && $_SESSION['role']==="admin"){
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";

    }
    echo "</tr>";

    while($row=$result->fetch_array()){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['cate_name'] . "</td>";
        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
            echo "<td><button onclick='editCategory(".$row['id'].")'>Edit</button></td>";
            echo "<td><button onclick='deleteCategory(".$row['id'].")'>Delet</button></td>";
        }
        echo "</tr>";
    }
    echo "</table>";