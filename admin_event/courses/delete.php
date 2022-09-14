<?php
if (isset($_GET['course_id']) && is_numeric($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $stmt = $connect->prepare('SELECT * FROM courses WHERE course_id= ?');
    $stmt->execute([$course_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM courses WHERE course_id=?');
        $stmt->execute([$course_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=courses&page=report'); ?>
    <?php }
    }
}