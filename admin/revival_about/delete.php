<?php
if (isset($_GET['about_id']) && is_numeric($_GET['about_id'])) {
    $about_id = $_GET['about_id'];

    $stmt = $connect->prepare('SELECT * FROM revival_about_us WHERE about_id= ?');
    $stmt->execute([$about_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM revival_about_us WHERE about_id=?');
        $stmt->execute([$about_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=revival_about&page=report'); ?>
    <?php }
    }
}