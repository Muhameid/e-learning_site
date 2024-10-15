<?php
require 'require/top.php';

if (isset($_POST['category_id'])) {
    $category_id = intval($_POST['category_id']);

    $stmt = $con->prepare('SELECT id, subcat FROM subcategories WHERE cat_id = ?');
    $stmt->bind_param('i', $category_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id'] . '">' . $row['subcat'] . '</option>';
    }

    $stmt->close();
}
?>
<h2>${contents[currentContentIndex]['part_title']}</h2>