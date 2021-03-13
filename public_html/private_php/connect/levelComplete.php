<?php
session_start();
require 'connect.php';
if (!isset($_SESSION['logged_in']) ||
        !$_SESSION['logged_in'] ||
        !isset($_SESSION['time_registered']) ||
        !isset($_SESSION['username']) ||
        !isset($_SESSION['user_uuid']) ||
        !isset($_SESSION['current_level'])) {
    
}


$post_time = $con->escape_string($_POST['time_taken']);
$post_level = $con->escape_string($_POST['level_number']);

if ($_SESSION['current_level'] == $post_level) {
    if ($result = $con->query("UPDATE users SET current_level='" . ($post_level + 1) . "' WHERE uuid='" . $_SESSION['user_uuid'] . "'")) {

        $_SESSION['current_level'] = $post_level + 1;
    } else {
        echo 'Could not prepare statement!2';
    }
    
}
    if ($result = $con->query("INSERT INTO `user_scores` ( `user_uuid`, `username`, `time_taken`, `level_number`) VALUES ( '".$_SESSION['user_uuid']."', '".$_SESSION['username']."', SEC_TO_TIME(".$post_time."), '".$post_level."')")) {

    } else {
        echo 'Could not prepare statement!2';
    }
