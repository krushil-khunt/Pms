<?php 
session_start();

require_once "../../config/db.php";

require_once "../../includes/auth_check.php";
requireLogin();

$q = $_GET['q'] ?? '';
// echo $q;
$order = $_GET['order'] ?? '';

// $page = $_GET['page'] ?? 1;
$page = (int)($_GET['page'] ?? 1);


$limit = 5;

$offset = ($page - 1) * $limit;

$sql="SELECT sub_categories.id,sub_categories.sub_cate_name,categories.cate_name FROM categories
    INNER JOIN sub_categories
    ON categories.id=sub_categories.categorie_id
    WHERE 1=1";


if($q == ''){
    $sql;
}else{
    $sql .= " AND (
        sub_categories.sub_cate_name LIKE '%$q%'
        OR categories.cate_name LIKE '%$q%'
    )";
}

$count="SELECT COUNT(*) AS total FROM categories
        INNER JOIN sub_categories
        ON categories.id=sub_categories.categorie_id";

if($q == ''){
    $count;
}else{
    $count .= " AND (
        sub_categories.sub_cate_name LIKE '%$q%'
        OR categories.cate_name LIKE '%$q%'
    )";
}

$countresult = $con->query($count);

$countrow = $countresult->fetch_assoc();

$totalpage = ceil($countrow['total'] / $limit);


if($order=="A-Z"){

    $sql .= " ORDER BY sub_categories.sub_cate_name ASC";

}elseif($order=="Z-A"){

    $sql .= " ORDER BY sub_categories.sub_cate_name DESC";

}elseif($order=="new"){

    $sql .= " ORDER BY sub_categories.id DESC";

}


$sql .= " LIMIT $limit OFFSET $offset";



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
        echo "<td><button onclick='deleteSubCategory(".$row['id'].")'>Delete</button></td>";
    }
    echo "</tr>";
}

echo "</table>";

echo "<ul class='pagination'>";

for($i = 1; $i <= $totalpage; $i++){
    echo "<li class='page-item'>
            <a class='page-link' href='#' onclick='query($i)'>$i</a>
          </li>";
}

echo "</ul>";
 ?>
