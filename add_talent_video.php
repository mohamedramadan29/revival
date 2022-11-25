<?php
ob_start();
session_start();
include 'init.php';
?>
<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $lang["add_new_talent_video"]; ?> </h2>
        </div>
    </div>
</div>

<?php

$stmt = $connect->prepare("SELECT * FROM register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$count = $stmt->rowCount();
$userinfo  = $stmt->fetch();
if ($count > 0) {
    include "add_talent_video/revival_talent.php";
}
// artificial_register

$stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$userinfo  = $stmt->fetch();
$count = $stmt->rowCount();
if ($count  > 0) {
    include "add_talent_video/artificial_talent.php";
}

// sport_talent_register

$stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$userinfo  = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    include "add_talent_video/sport_talent.php";
}

// fash_register

$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$userinfo  = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    include "add_talent_video/fashion_talent.php";
}


include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>