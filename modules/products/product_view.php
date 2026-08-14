<?php

require_once "../../config/db.php";

$id=$_GET['id'];

$sql="SELECT products.id,products.product_name,products.primary_img,product_meta.size,
products.status,product_meta.price,product_meta.quantity,product_meta.color,product_meta.weight,
product_meta.height,product_meta.width,product_meta.gallery_img
FROM products
INNER JOIN
product_meta
ON products.id=product_meta.product_id
WHERE products.id=$id";

$result=$con->query($sql);

// echo "<table>
// <tr>
// <th>Product Name</th>
// <th>Primary Image</th>
// <th>Height</th>
// <th>Width</th>
// <th>status</th>
// <th>price</th>
// <th>quantity</th>
// <th>color</th>
// <th>weight</th>
// <th>Gallery Image</th>
// </tr>
// ";

// while ($row=$result->fetch_array()){
//     echo "<tr>";
//     echo "<td>" . $row['product_name'] . "</td>";
//     echo "<td>
//             <img src='../../assets/uploads/primary/" . $row['primary_img'] . "' width='200' alt='Product Image'>
//          </td>";

//     echo "<td>" . $row['height'] . "</td>";
//     echo "<td>" . $row['width'] . "</td>";
//     echo "<td>" . $row['status'] . "</td>";
//     echo "<td>" . $row['price'] . "</td>";
//     echo "<td>" . $row['quantity'] . "</td>";
//     echo "<td>" . $row['color'] . "</td>";
//     echo "<td>" . $row['weight'] . "</td>";

//     $galleryImages = explode(',', $row['gallery_img']);
//     foreach ($galleryImages as $image) {
//         echo "<th>";
//         echo "<img src='../../assets/uploads/gallery/" . trim($image) . "'width='100'alt='Gallery Image'>";
//         echo "</th>";
//     }
//      echo "</tr>";

// }
while ($row = $result->fetch_array()) {

    echo "<div class='product-card'>";

    echo "<img class='main-image'
            src='../../assets/uploads/primary/" . $row['primary_img'] . "'
            alt='Product Image' width='200'>";

    echo "<div class='card-body'>";

    echo "<h3 class='card-title'>" . $row['product_name'] . "</h3>";

    echo "<div class='product-details'>";

    echo "<p><strong>Height:</strong> " . $row['height'] . "</p>";
    echo "<p><strong>Width:</strong> " . $row['width'] . "</p>";
    echo "<p><strong>Status:</strong> " . $row['status'] . "</p>";
    echo "<p><strong>Price:</strong> ₹" . $row['price'] . "</p>";
    echo "<p><strong>Quantity:</strong> " . $row['quantity'] . "</p>";
    echo "<p><strong>Color:</strong> " . $row['color'] . "</p>";
    echo "<p><strong>Weight:</strong> " . $row['weight'] . "</p>";

    echo "</div>";

    echo "</div>";

    echo "</div>";


    $galleryImages = explode(',', $row['gallery_img']);

    echo "<div class='gallery'>";

    echo "<h4>Gallery Images</h4>";

    foreach ($galleryImages as $image) {

        echo "<img src='../../assets/uploads/gallery/" . trim($image) . "'
                alt='Gallery Image' width='200' >";
    }

    echo "</div>";
}
