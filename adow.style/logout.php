<?php
session_start();
$event_id = 4;
if (isset($_SESSION['cart2'])) {
unset($_SESSION['cart2']);
}
if (isset($_SESSION['cart'])) {
unset($_SESSION['cart']);
}
header("location:index.php");
session_destroy();