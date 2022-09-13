<?php
if (isset($_GET['faq_id']) && is_numeric($_GET['faq_id'])) {
    $faq_id = $_GET['faq_id'];

    $stmt = $connect->prepare('SELECT * FROM faq WHERE faq_id= ?');
    $stmt->execute([$faq_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM faq WHERE faq_id=?');
        $stmt->execute([$faq_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=faqs&page=report'); ?>
    <?php }
    }
}