<?php
session_start();
$event_id = $_GET['event_id'];
if (empty($_SESSION['cart2'])) {
    $_SESSION['cart2'] = array();
}
array_push($_SESSION['cart2'], $_GET['id']);

header("location:register.php?event_id=$event_id&true=created");
