<?php 
session_start();

require_once "../../config/db.php";
require_once "../../includes/auth_check.php";
requireLogin();

$q = $_GET['q'] ?? '';

$price=$_GET['price'] ?? '';

$order=$_GET['order'] ?? '';

$page = $_GET['page'] ?? 1;

$limit = 5;

$offset = ($page - 1) * $limit;


// echo $order;

// echo $price;

// echo $q;

$sql = "SELECT products.id,products.product_name,products.primary_img,products.status,product_meta.size,
            product_meta.height,product_meta.width,product_meta.gallery_img,product_meta.price,users.name
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

if($q != '' || $price != '' || $order != 'new'){

    $sql .= " AND products.status = 'active'";

}

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

$count = "SELECT COUNT(*) AS total
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

if($q != '' || $price != '' || $order != 'new'){

    $count .= " AND products.status = 'active'";

}

if($q == ''){
    $count;    
}else{

    $count .= " AND (
        products.product_name LIKE '%$q%'
        OR categories.cate_name LIKE '%$q%'
        OR sub_categories.sub_cate_name LIKE '%$q%'
        OR users.name LIKE '%$q%'
    )";

}

if($price == "1"){

    $count .= " AND product_meta.price BETWEEN 1000 AND 10000";

}elseif($price == "2"){

    $count .= " AND product_meta.price BETWEEN 10000 AND 100000";

}

$countresult = $con->query($count);

$countrow = $countresult->fetch_assoc();

$totalpage = ceil($countrow['total'] / $limit);
        
if($price=="1"){

    $sql .= " AND ( product_meta.price BETWEEN 1000 AND 10000)";

}elseif($price=="2"){

    $sql .= " AND ( product_meta.price BETWEEN 10000 AND 100000)";
    
}

if($order=="A-Z"){

    $sql.= " ORDER BY products.product_name ASC";

}elseif($order=="Z-A"){

    $sql.= " ORDER BY products.product_name DESC";

}elseif($order=="hig-low"){

    $sql.= " ORDER BY product_meta.price DESC";

}elseif($order=="low-high"){

    $sql.= " ORDER BY product_meta.price ASC";

}elseif($order=="new"){

    $sql.= " ORDER BY products.created_at DESC";
}

$sql .= " LIMIT $limit OFFSET $offset";

$result=$con->query($sql);

if($result->num_rows == 0){

    echo "<tr>
            <td colspan='10' class='text-center'>
                Data Not Found
            </td>
          </tr>";

}else{

    while($row = $result->fetch_array()) {
        echo "<tr>";
        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
            echo "<td>
                <input type='checkbox' id='checkbox_" . $row['id'] . "' name='product_checkbox[]' value='" . $row['id'] . "' onchange='productSelect(" . $row['id'] . ", this.checked)'>
            </td>";
        }
        echo "<td>" . $row['product_name'] . "</td>";
        echo "<td>
            <a href='product_view.php?id=" . $row['id'] . "'>
                <img src='../../assets/uploads/primary/" . $row['primary_img'] . "' width='100' height='100' alt='Product Image'>
            </a>
        </td>";

        echo "<td>" . $row['height'] . "</td>";
        echo "<td>" . $row['width'] . "</td>";


        
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
                echo '<td>
            <div class="form-check form-switch">
                <input 
                    class="form-check-input" 
                    type="checkbox"
                    onchange="updateStatus(' . $row['id'] . ', this.checked)"
                    ' . ($row['status'] == 'active' ? 'checked' : '') . '
                >
            </div>
        </td>';
            echo "<td><button onclick='editProduct(".$row['id'].")'>Edit</button></td>";
            echo "<td><button onclick='deleteProduct(".$row['id'].")'>Delet</button></td>";
        }
        echo "</tr>";
    }
}

echo "<ul class='pagination'>";

for($i = 1; $i <= $totalpage; $i++){
    echo "<li class='page-item'>
            <a class='page-link' href='#' onclick='query($i)'>$i</a>
          </li>";
}
echo "</ul>";
 ?>