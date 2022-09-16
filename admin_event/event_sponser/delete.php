<?php
if (isset($_GET['sponser_id']) && is_numeric($_GET['sponser_id'])) {
    $sponser_id = $_GET['sponser_id'];

    $stmt = $connect->prepare('SELECT * FROM  event_sponser WHERE speaker_id= ?');
    $stmt->execute([$sponser_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM  event_sponser WHERE sponser_id=?');
        $stmt->execute([$sponser_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=event_sponser&page=report'); ?>
    <?php }
    }
}