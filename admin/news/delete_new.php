<?php
if (isset($_GET['new_id']) && is_numeric($_GET['new_id'])) {
    $new_id = $_GET['new_id'];

    $stmt = $connect->prepare('SELECT * FROM news WHERE new_id= ?');
    $stmt->execute([$new_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM news WHERE new_id=?');
        $stmt->execute([$new_id]);
        if ($stmt) { ?>
            <div class="alert-success">
                <?php echo $lang['delete_message']; ?>
                <?php header('LOCATION:main.php?dir=news&page=report'); ?>
    <?php }
    }
}
