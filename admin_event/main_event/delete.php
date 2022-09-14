<?php
if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    $stmt = $connect->prepare('SELECT * FROM main_events WHERE event_id= ?');
    $stmt->execute([$event_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM main_events WHERE event_id=?');
        $stmt->execute([$event_id]);
        if ($stmt) { ?>
            <div class="alert-success">
                <?php echo $lang['delete_message']; ?>
                <?php header('LOCATION:main.php?dir=main_event&page=report'); ?>
    <?php }
    }
}
