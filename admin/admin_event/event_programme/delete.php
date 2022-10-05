<?php
if (isset($_GET['prog_id']) && is_numeric($_GET['prog_id'])) {
    $prog_id = $_GET['prog_id'];

    $stmt = $connect->prepare('SELECT * FROM event_programme WHERE prog_id= ?');
    $stmt->execute([$prog_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM event_programme WHERE prog_id=?');
        $stmt->execute([$prog_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=event_programme&page=report'); ?>
    <?php }
    }
}