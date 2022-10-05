<?php
if (isset($_GET['order_id']) && is_numeric($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $stmt = $connect->prepare('SELECT * FROM revival_order_services WHERE order_id= ?');
    $stmt->execute([$order_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM revival_order_services WHERE order_id=?');
        $stmt->execute([$order_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=revival_order_services&page=report'); ?>
    <?php }
    }
}