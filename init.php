<?php
include 'connect.php';
include 'config.php';
$tem = 'include/';
$css = 'themes/css/';
$js = 'themes/js/';

include $tem . 'header.php';

if (isset($eventpage)) {
    include $tem . 'event_navbar.php';
} else {
    include $tem . 'navbar.php';
}