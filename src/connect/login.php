<?php

session_start();
require 'connect.php';

if(!isset($_POST['username']) && !isset($_POST['guest'])){
    header("Location: /p/login");
    exit();
}
if (isset($_POST['guest']) && $_POST['guest']) {
    $_SESSION['logged_in'] = TRUE;
    $_SESSION['username'] = "guest";
    $_SESSION['login_error'] = NULL;
    $_SESSION['current_level'] = 1;
    header("Location: /p/game");
    exit();
}

$post_username = $con ->escape_string($_POST['username']);
$post_password = $con ->escape_string($_POST['password']);

$result = $con ->query("SELECT * FROM users WHERE username='$post_username'");

$_SESSION['login_error'] = "You have entered an incorrect username or password...";
//set this ^ back to null after successfull login

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['logged_in'] = FALSE;
    $_SESSION['login_error'] = "You have entered an incorrect username or password...";
	header("Location: /p/login");
}else { // User exists
    $user = $result->fetch_assoc();
    if ( password_verify($post_password, $user['password']) ) {
        $_SESSION['guest'] = NULL;
        $_SESSION['login_error'] = NULL;
        $_SESSION['time_registered'] = $user['time_registered'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_uuid'] = $user['uuid'];
        $_SESSION['current_level'] = $user['current_level'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = TRUE;
		
		header("Location: /p/user_profile");
        
    }else {
        $_SESSION['logged_in'] = FALSE;
		
		header("Location: /p/login");
    }
}
