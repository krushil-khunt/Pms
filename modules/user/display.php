<?php
session_start();

require_once "../../config/db.php";
require_once "../../includes/auth_check.php";
requireAdmin();

$username = $_GET['username'] ?? '';

$role = $_GET['role'] ?? '';

$order = $_GET['order'] ?? 'new';

$page = $_GET['page'] ?? 1;

$limit = 5;

$offset = ($page - 1) * $limit;

$sql="SELECT * FROM users WHERE 1=1";

if($username == ''){
    $sql;
}else{
    $sql .= " AND (
            name LIKE '%$username%'
            OR email LIKE '%$username%'
    )";
}

$count="SELECT COUNT(*) AS total FROM users WHERE 1=1";

if($username == ''){
    $count;
}else{
    $count .= " AND (
            name LIKE '%$username%'
            OR email LIKE '%$username%'
    )";
}

$countresult = $con->query($count);

$countrow = $countresult->fetch_assoc();

$totalpage = ceil($countrow['total'] / $limit);

if($role == ''){
    $sql;
}elseif($role == 'admin'){
    $sql .= " AND role = 'admin'";
}elseif($role == 'user'){
    $sql .= " AND role = 'user'";
}

if($order == "A-Z"){

    $sql .= " ORDER BY name ASC";

}elseif($order == "Z-A"){

    $sql .= " ORDER BY name DESC";

}elseif($order == "new"){

    $sql .= " ORDER BY id DESC";

}

$sql .= " LIMIT $limit OFFSET $offset";

$result=$con->query($sql);

echo "<table>
    <tr>
    <th>id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>";

if($result->num_rows == 0){

    echo "<tr>
            <td colspan='10' class='text-center'>
                Data Not Found
            </td>
          </tr>";

}else{

    while($row=$result->fetch_assoc()){
        echo "<tr>";

        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td><button onclick='edituser(".$row['id'].")'>Edit</button></td>";
        echo "<td><button onclick='deleteuser(".$row['id'].")'>Delete</button></td>";

        echo "</tr>";
    }
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