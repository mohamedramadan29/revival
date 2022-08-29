<?php

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ar';
} elseif (
    isset($_GET['lang']) &&
    $_SESSION['lang'] != $_GET['lang'] &&
    !empty($_GET['lang'])
) {
    if ($_GET['lang'] == 'ar') {
        $_SESSION['lang'] = 'ar';
    } elseif ($_GET['lang'] == 'en') {
        $_SESSION['lang'] = 'en';
    }
}
if (isset($_GET['dir'])) {
    $dir = $_GET['dir'];

    if ($dir == 'articles') {
        include 'articles/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'news') {
        include 'news/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'revival_register') {
        include 'revival_register/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'fash_register') {
        include 'fash_register/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'sport_register') {
        include 'sport_register/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'art_register') {
        include 'art_register/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'dashboard') {
        include 'dashboard/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'faqs') {
        include 'faqs/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'contact') {
        include 'contact/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'courses') {
        include 'courses/lang/' . $_SESSION['lang'] . '.php';
    } elseif ($dir == 'banner') {
        include 'banner/lang/' . $_SESSION['lang'] . '.php';
    }
} else {
    include 'languages/lang/' . $_SESSION['lang'] . '.php';
}