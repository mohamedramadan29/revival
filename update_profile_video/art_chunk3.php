<?php
include "../connect.php";
include "../config.php";
session_start();

// (A) HELPER FUNCTION - SERVER RESPONSE
function verbose($ok = 1, $info = "")
{
    if ($ok == 0) {
        http_response_code(400);
    }
    exit(json_encode(["ok" => $ok, "info" => $info]));
}
// (B) INVALID UPLOAD
if (empty($_FILES) || $_FILES["file"]["error"]) {
    verbose(0, "Failed to move uploaded file.");
}

// (C) UPLOAD DESTINATION - CHANGE FOLDER IF REQUIRED!
$filePath = "../upload_videos";
if (!file_exists($filePath)) {
    if (!mkdir($filePath, 0777, true)) {
        verbose(0, "Failed to create $filePath");
    }
}
$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
$fileName = str_replace(array('-', '(', ')', ',', '$', '*', ' ', '&', '#'), '', $fileName);
$filePath = $filePath . DIRECTORY_SEPARATOR . $fileName;

// (D) DEAL WITH CHUNKS
$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
if ($out) {
    $in = @fopen($_FILES["file"]["tmp_name"], "rb");
    if ($in) {
        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }
    } else {
        verbose(0, "Failed to open input stream");
    }
    @fclose($in);
    @fclose($out);
    @unlink($_FILES["file"]["tmp_name"]);
} else {
    verbose(0, "Failed to open output stream");
}

// (E) CHECK IF FILE HAS BEEN UPLOADED
if (!$chunks || $chunk == $chunks - 1) {
    rename("{$filePath}.part", $filePath);

    $stmt = $connect->prepare("SELECT * FROM art_register WHERE username=?");
    $stmt->execute(array($_SESSION["username"]));
    $userdata = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare("UPDATE art_register SET video3=?  WHERE username=?");
        $stmt->execute(array(
            $fileName,
            $_SESSION['username'],
        ));
    }
    $stmt = $connect->prepare("SELECT * FROM fash_register WHERE username=?");
    $stmt->execute(array($_SESSION["username"]));
    $userdata = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare("UPDATE fash_register SET video3=?  WHERE username=?");
        $stmt->execute(array(
            $fileName,
            $_SESSION['username'],
        ));
    }
    $stmt = $connect->prepare("SELECT * FROM sport_register WHERE username=?");
    $stmt->execute(array($_SESSION["username"]));
    $userdata = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $stmt = $connect->prepare("UPDATE sport_register SET video3=?  WHERE username=?");
        $stmt->execute(array(
            $fileName,
            $_SESSION['username'],
        ));
    }
}
verbose(1, "Upload OK");
