<?php
if (isset($_GET['project_id']) && is_numeric($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    $stmt = $connect->prepare('SELECT * FROM revival_add_project WHERE project_id= ?');
    $stmt->execute([$project_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM revival_add_project WHERE project_id=?');
        $stmt->execute([$project_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=revival_add_new_project&page=report'); ?>
    <?php }
    }
}