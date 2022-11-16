<?php
session_start();
$event_id = 4;
if (empty($_SESSION['cart2'])) {
    $_SESSION['cart2'] = array();
}
array_push($_SESSION['cart2'], $_GET['id']);

header("location:register.php?event_id=$event_id&true=created");
