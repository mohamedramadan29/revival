<?php
if (isset($_GET['register_id']) && is_numeric($_GET['register_id'])) {
    $reg_id = $_GET['register_id'];

    $stmt = $connect->prepare('SELECT * FROM course_register WHERE reg_id= ?');
    $stmt->execute([$reg_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM course_register WHERE reg_id=?');
        $stmt->execute([$reg_id]);
        if ($stmt) { ?>
            <div class="alert-success">
                <?php echo $lang['delete_message']; ?>
                <?php header('LOCATION:main.php?dir=course_register&page=report'); ?>
    <?php }
    }
}
