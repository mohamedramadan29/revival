<?php
if (isset($_GET['select_id']) && is_numeric($_GET['select_id'])) {
    $select_id = $_GET['select_id'];

    $stmt = $connect->prepare('SELECT * FROM form_selection_event WHERE select_id= ?');
    $stmt->execute([$select_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM form_selection_event WHERE select_id=?');
        $stmt->execute([$select_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=form_selection&page=report'); ?>
    <?php }
    }
}