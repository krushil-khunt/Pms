<?php
require_once "../../config/db.php";

$category = $_POST['category'];

$sql="SELECT sub_categories.id,sub_categories.sub_cate_name FROM categories
    INNER JOIN sub_categories
    ON categories.id=sub_categories.categorie_id
    WHERE categories.id=$category";

// $sql="SELECT * FROM sub_categories WHERE categorie_id =$category";

$resultsub=$con->query($sql);
?>

<option value="">Select Sub Category</option>

<?php while($row = $resultsub->fetch_array()) { ?>

    <option value="<?php echo $row['id']; ?>">
        <?php echo $row['sub_cate_name']; ?>
    </option>

<?php } ?>





