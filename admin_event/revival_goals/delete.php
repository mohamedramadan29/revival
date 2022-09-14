<?php
if (isset($_GET['goal_id']) && is_numeric($_GET['goal_id'])) {
    $goal_id = $_GET['goal_id'];

    $stmt = $connect->prepare('SELECT * FROM revival_goals WHERE goal_id= ?');
    $stmt->execute([$goal_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM revival_goals WHERE goal_id=?');
        $stmt->execute([$goal_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=revival_goals&page=report'); ?>
    <?php }
    }
}