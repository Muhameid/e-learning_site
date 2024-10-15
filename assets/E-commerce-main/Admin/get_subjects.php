<?php
require('../../../../utility/utility.php');

if (isset($_GET['formationId'])) {
    $formationId = $_GET['formationId'];

    $query = "SELECT * FROM subcategories WHERE cat_id = '$formationId' ORDER BY id DESC";
    $res = mysqli_query($con, $query);

    if (mysqli_num_rows($res) == 0) {
        echo 'no_subjects';
    } else {
        $options = '';
        while ($row = mysqli_fetch_assoc($res)) {
            $options .= "<option value='" . $row['id'] . "'>" . $row['subcat'] . "</option>";
        }
        echo $options;
    }
}
?>
