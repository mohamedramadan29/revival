<?php
if (isset($_GET['email_id']) && is_numeric($_GET['email_id'])) {
    $email_id = $_GET['email_id'];

    $stmt = $connect->prepare('SELECT * FROM email_message_event WHERE email_id= ?');
    $stmt->execute([$email_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM email_message_event WHERE email_id=?');
        $stmt->execute([$email_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=emails_section&page=report'); ?>
    <?php }
    }
}