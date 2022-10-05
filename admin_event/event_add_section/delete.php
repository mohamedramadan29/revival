<?php
if (isset($_GET['add_id']) && is_numeric($_GET['add_id'])) {
    $add_id = $_GET['add_id'];

    $stmt = $connect->prepare('SELECT * FROM addition_section WHERE add_id= ?');
    $stmt->execute([$add_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM  addition_section WHERE add_id=?');
        $stmt->execute([$add_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=event_add_section&page=report'); ?>
    <?php }
    }
}