<?php
session_start();
  $event_id = 4;
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $_GET['id']);

header("location:register.php?event_id=$event_id&true=created");
