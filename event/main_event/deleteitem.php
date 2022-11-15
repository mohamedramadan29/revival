<?php
session_start();
$event_id = $_GET['event_id'];

if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $k => $v) {
        if ($_GET["id"] == $k) {
            unset($_SESSION["cart"][$k]);
        }
        if (empty($_SESSION["cart"])) {
            unset($_SESSION["cart"]);
        }
    }
    //  header("location:cart.php");
    header("location:register.php?event_id=$event_id");
}
