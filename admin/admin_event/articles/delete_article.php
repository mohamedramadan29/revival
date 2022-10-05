<?php
if (isset($_GET['article_id']) && is_numeric($_GET['article_id'])) {
    $article_id = $_GET['article_id'];

    $stmt = $connect->prepare('SELECT * FROM articles WHERE article_id= ?');
    $stmt->execute([$article_id]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare('DELETE FROM articles WHERE article_id=?');
        $stmt->execute([$article_id]);
        if ($stmt) { ?>
            <div class="alert-success">
                <?php echo $lang['delete_message']; ?>
                <?php header('LOCATION:main.php?dir=articles&page=report'); ?>
    <?php }
    }
}
