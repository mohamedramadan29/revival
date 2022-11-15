<?php
session_start();
$event_id = $_GET['event_id'];
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $_GET['id']);

header("location:register.php?event_id=$event_id&true=created");
