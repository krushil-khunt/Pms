<?php 

require_once "../../config/db.php";


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
            ON products.user_id = users.id";

$result=$con->query($sql);  

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="products.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Product Name', 'Height', 'Width', 'Status', 'Price', 'User Name'], ',', '"', '\\');

while($row = $result->fetch_assoc()){
     fputcsv($output, [
        $row['product_name'],
        $row['height'],
        $row['width'],
        $row['status'],
        $row['price'],
        $row['name']
    ], ',', '"', '\\');
}
fclose($output);
exit;

?>