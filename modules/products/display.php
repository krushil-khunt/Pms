<?php 
session_start();

require_once "../../config/db.php";

$q = $_GET['q'] ?? '';

$price=$_GET['price'] ?? '';

// echo $price;

// echo $q;

$sql = "SELECT products.id,products.product_name,products.primary_img,products.status,product_meta.size,
            product_meta.height,product_meta.width,product_meta.gallery_img,product_meta.price
        FROM products
        INNER JOIN product_meta
            ON products.id = product_meta.product_id
        INNER JOIN categories
            ON products.categorie_id = categories.id
        INNER JOIN sub_categories
            ON products.sub_categorie_id = sub_categories.id
        INNER JOIN users
            ON products.user_id = users.id
        WHERE 1=1";

if($q == ''){
    $sql;    
}else{

    $sql .= " AND (
        products.product_name LIKE '%$q%'
        OR categories.cate_name LIKE '%$q%'
        OR sub_categories.sub_cate_name LIKE '%$q%'
        OR users.name LIKE '%$q%'
    )";

}

if($price=="1"){
    $sql .= " AND ( product_meta.price BETWEEN 1000 AND 10000)";
}elseif($price=="2"){
    $sql .= " AND ( product_meta.price BETWEEN 10000 AND 100000)";
}

$result=$con->query($sql);


echo "<table>
<tr>
<th>Product Name</th>
<th>Primary Image</th>
<th>Height</th>
<th>Width</th>
<th>Status</th>
<th>Price</th>";

if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
}

echo "</tr>";


while($row = $result->fetch_array()) {
  echo "<tr>";
    echo "<td>" . $row['product_name'] . "</td>";
    echo "<td>
        <a href='product_view.php?id=" . $row['id'] . "'>
            <img src='../../assets/uploads/primary/" . $row['primary_img'] . "' width='200' alt='Product Image'>
        </a>
      </td>";

    echo "<td>" . $row['height'] . "</td>";
    echo "<td>" . $row['width'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
        echo "<td><button onclick='editProduct(".$row['id'].")'>Edit</button></td>";
        echo "<td><button onclick='deleteProduct(".$row['id'].")'>Delet</button></td>";
    }
    echo "</tr>";
}
 ?>