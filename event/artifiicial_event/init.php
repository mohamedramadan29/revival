<?php
include '../../connect.php';
include 'config.php';
$tem = 'include/';
$css = '../../themes/css/';
$js = '../../themes/js/';

include $tem . 'header.php';
if (isset($eventpage)) {
    include $tem . 'event_navbar.php';
} else if (isset($artificial_event)) {
    include $tem . 'artificial_event_navbar.php';
} elseif (isset($nonavbar)) {
} else {
    include $tem . 'navbar.php';
}