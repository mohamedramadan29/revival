<?php
if (isset($_GET['term_id']) && is_numeric($_GET['term_id'])) {
    $term_id = $_GET['term_id'];

    $stmt = $connect->prepare('SELECT * FROM revival_terms WHERE term_id= ?');
    $stmt->execute([$term_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM revival_terms WHERE term_id=?');
        $stmt->execute([$term_id]);
        if ($stmt) { ?>
<div class="alert-success">
    <?php echo $lang['delete_message']; ?>
    <?php header('LOCATION:main.php?dir=revival_terms&page=report'); ?>
    <?php }
    }
}