<?php
if (isset($_GET['reason_id']) && is_numeric($_GET['reason_id'])) {
    $reason_id = $_GET['reason_id'];

    $stmt = $connect->prepare('SELECT * FROM event_home_reason WHERE reason_id= ?');
    $stmt->execute([$reason_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM event_home_reason WHERE reason_id=?');
        $stmt->execute([$reason_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=home_event/reason&page=report'); ?>
    <?php }
    }
}