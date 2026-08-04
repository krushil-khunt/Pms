<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Product</title>
</head>
<body>
    <div>
        <button type="button" class="btn btn-outline-danger" onclick="add()">Add Product</button>
    </div>

    <div>
        <span id="addproduct"></span>
    </div>

    <script src="productAjax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<?php 
require_once "../../config/db.php";

$sql="SELECT products.id,products.product_name,products.primary_img,product_meta.size,products.status,
product_meta.height,product_meta.width,product_meta.gallery_img
FROM products
INNER JOIN
product_meta
ON products.id=product_meta.product_id";

$result=$con->query($sql);

echo "<table>
<tr>
<th>Product Name</th>
<th>Primary Image</th>
<th>Height</th>
<th>Width</th>
<th>status</th>
<th>Edit</th>
<th>Delet</th>
</tr>
";


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
    echo "<td><button onclick='editProduct(".$row['id'].")'>Edit</button></td>";
    echo "<td><button onclick='deleteProduct(".$row['id'].")'>Delet</button></td>";
    echo "</tr>";


}





