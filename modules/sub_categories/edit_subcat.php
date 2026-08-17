<?php

require_once "../../config/db.php";

$category = $_POST['category'];

$sql = "SELECT *
        FROM sub_categories
        WHERE categorie_id = '$category'";

$result = $con->query($sql);

echo '<option value="">Select Sub Category</option>';

while($row = $result->fetch_assoc()){

    echo '<option value="'.$row['id'].'">';
    echo $row['sub_cate_name'];
    echo '</option>';

}
?>