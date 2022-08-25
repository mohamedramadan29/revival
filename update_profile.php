<?php
ob_start();
session_start();
include 'init.php';
?>

<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> تحديث الملف الشخصى </h2>
        </div>
    </div>
</div>
<!-- START PROFILE DATA -->
<?php

// revival_register

$stmt = $connect->prepare("SELECT * FROM register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$count = $stmt->rowCount();
if ($count > 0) {
    include "update_profile/revival_register.php";
}
// artificial_register

$stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$count = $stmt->rowCount();
if ($count  > 0) {
    include "update_profile/art_register.php";
}

// sport_talent_register

$stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$count = $stmt->rowCount();
if ($count > 0) {
    include "update_profile/sport_talent_register.php";
}

// fash_register

$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$count = $stmt->rowCount();
if ($count > 0) {
    include "update_profile/fash_register.php";
}

?>

<!-- END PROFILE DATA -->
<?php
include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>