<?php
if (isset($_GET['ban_id']) && is_numeric($_GET['ban_id'])) {
    $ban_id = $_GET['ban_id'];

    $stmt = $connect->prepare('SELECT * FROM banner WHERE ban_id= ?');
    $stmt->execute([$ban_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM banner WHERE ban_id=?');
        $stmt->execute([$ban_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=banner&page=report'); ?>
    <?php }
    }
}