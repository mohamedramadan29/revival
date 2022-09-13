<?php
if (isset($_GET['gallary_id']) && is_numeric($_GET['gallary_id'])) {
    $gallary_id = $_GET['gallary_id'];

    $stmt = $connect->prepare('SELECT * FROM revival_gallary WHERE gallary_id= ?');
    $stmt->execute([$gallary_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM revival_gallary WHERE gallary_id=?');
        $stmt->execute([$gallary_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=revival_gallary&page=report'); ?>
    <?php }
    }
}