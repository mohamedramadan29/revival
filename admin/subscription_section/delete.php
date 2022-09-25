<?php
if (isset($_GET['message_id']) && is_numeric($_GET['message_id'])) {
    $message_id = $_GET['message_id'];

    $stmt = $connect->prepare('SELECT * FROM contact_us WHERE contact_id= ?');
    $stmt->execute([$message_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM contact_us WHERE contact_id=?');
        $stmt->execute([$message_id]);
        if ($stmt) { ?>
            <div class="alert-success">
                <?php echo $lang['delete_message']; ?>
                <?php header('LOCATION:main.php?dir=contact&page=report'); ?>
    <?php }
    }
}
