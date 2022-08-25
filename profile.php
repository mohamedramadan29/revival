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
<div class="alert_message alert alert-primary d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </svg>
    <div>
        حسابك تحت المراجعه الان سيتم الموافقة قريبا من خلال الادمن عند اكمال جميع الملفات الخاصة بك
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