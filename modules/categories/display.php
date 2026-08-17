<?php  
session_start();

require_once "../../config/db.php";
require_once "../../includes/auth_check.php";
requireLogin();

$q = $_GET['q'] ?? '';

$q = $_GET['q'] ?? '';

$order = $_GET['order'] ?? '';

$page = $_GET['page'] ?? 1;

$limit = 5;

$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM categories WHERE 1=1";

if($q == ''){
    $sql;
}else{
    $sql .= " AND cate_name LIKE '%$q%'";
}

if($order == "A-Z"){

    $sql .= " ORDER BY cate_name ASC";

}elseif($order == "Z-A"){

    $sql .= " ORDER BY cate_name DESC";

}elseif($order == "new"){

    $sql .= " ORDER BY id DESC";

}

$sql .= " LIMIT $limit OFFSET $offset";

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
            echo "<td><button onclick='deleteCategory(".$row['id'].")'>Delete</button></td>";
        }
        echo "</tr>";
    }
    echo "</table>";