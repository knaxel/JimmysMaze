<?php
session_start();
require 'connect.php';
if (!isset($_SESSION['logged_in']))  {
    header("Location: /p/login");
    exit();
}

if (!isset($_SESSION['user_uuid'])){
    $_SESSION['current_level'] = $_SESSION['current_level'] + 1;
    header("Location: /p/game");
    exit();
}

$post_time = $con->escape_string($_POST['time_taken']);
$post_level = $con->escape_string($_POST['level_number']);

if ($result = $con->query("INSERT INTO `user_scores` ( `user_uuid`, `username`, `time_taken`, `level_number`) VALUES ( '".$_SESSION['user_uuid']."', '".$_SESSION['username']."', ROUND(".($post_time*1000)."), '".$post_level."')")){

} else {
    echo 'Could not prepare statement!';
}

if ($_SESSION['current_level'] == $post_level) {
    if ($result = $con->query("UPDATE users SET current_level='" . ($post_level + 1) . "' WHERE uuid='" . $_SESSION['user_uuid'] . "'")) {

        $_SESSION['current_level'] = $post_level + 1;
    } else {
        echo 'Could not prepare statement!';
    }
    
}
