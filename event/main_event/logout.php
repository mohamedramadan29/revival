<?php
session_start();
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    
}
 
if (isset($_SESSION['cart2'])) {
unset($_SESSION['cart2']);
}
if (isset($_SESSION['cart'])) {
unset($_SESSION['cart']);
}
header("location:../events.php");
session_destroy();