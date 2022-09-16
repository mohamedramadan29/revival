<?php
if (isset($_GET['target_id']) && is_numeric($_GET['target_id'])) {
    $target_id = $_GET['target_id'];

    $stmt = $connect->prepare('SELECT * FROM  target_category WHERE target_id= ?');
    $stmt->execute([$target_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM  target_category WHERE target_id=?');
        $stmt->execute([$target_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=target_category&page=report'); ?>
    <?php }
    }
}