<?php
ob_start();
session_start();
include 'init.php';
?>
<div class="cars hero faq">
    <div class="overlay">
        <div class="container data">
            <h2> <?php echo $_SESSION['username'];  ?> </h2>
        </div>
    </div>
</div>
<?php

$stmt = $connect->prepare("SELECT * FROM register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$count = $stmt->rowCount();
$userinfo  = $stmt->fetch();
if ($count > 0) {
    include "profile/revival_profile.php";
}
// artificial_register

$stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$userinfo  = $stmt->fetch();
$count = $stmt->rowCount();
if ($count  > 0) {
    include "profile/art_profile.php";
}

// sport_talent_register

$stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$userinfo  = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    include "profile/sport_profile.php";
}

// fash_register

$stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
$stmt->execute(array($_SESSION["username"]));
$userinfo  = $stmt->fetch();
$count = $stmt->rowCount();
if ($count > 0) {
    include "profile/fash_profile.php";
}


include $tem . 'footer_section.php';
include $tem . 'footer.php';


?>