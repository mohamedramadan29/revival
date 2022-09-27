<?php
if (isset($_GET['invest_id']) && is_numeric($_GET['invest_id'])) {
    $invest_id = $_GET['invest_id'];

    $stmt = $connect->prepare('SELECT * FROM investment WHERE invest_id= ?');
    $stmt->execute([$invest_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM investment WHERE invest_id=?');
        $stmt->execute([$invest_id]);
        if ($stmt) { ?>
            <div class="alert-success">
                <?php echo $lang['delete_message']; ?>
                <?php header('LOCATION:main.php?dir=investment&page=report'); ?>
    <?php }
    }
}
