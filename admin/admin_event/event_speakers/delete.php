<?php
if (isset($_GET['speaker_id']) && is_numeric($_GET['speaker_id'])) {
    $speaker_id = $_GET['speaker_id'];

    $stmt = $connect->prepare('SELECT * FROM  event_speaker WHERE speaker_id= ?');
    $stmt->execute([$speaker_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM  event_speaker WHERE speaker_id=?');
        $stmt->execute([$speaker_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=event_speakers&page=report'); ?>
    <?php }
    }
}