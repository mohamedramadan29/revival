<?php
if (isset($_GET['register_id']) && is_numeric($_GET['register_id'])) {
    $register_id = $_GET['register_id'];

    $stmt = $connect->prepare('SELECT * FROM company_register WHERE reg_id= ?');
    $stmt->execute([$register_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM company_register WHERE reg_id=?');
        $stmt->execute([$register_id]);
        if ($stmt) { ?>
            <div class="alert-success">
                <?php echo $lang['delete_message']; ?>
                <?php header('LOCATION:main.php?dir=company_talent&page=report'); ?>
    <?php }
    }
}
