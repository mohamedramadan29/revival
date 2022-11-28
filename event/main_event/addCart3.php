<?php
session_start();
$event_id = $_GET['event_id'];
if (empty($_SESSION['cart3'])) {
    $_SESSION['cart3'] = array();
}
array_push($_SESSION['cart3'], $_GET['id']);

header("location:register.php?event_id=$event_id&true=created");
