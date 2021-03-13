<?php
session_start();

require 'connect.php';

$post_username = $con ->escape_string($_POST['username']);
$post_password = $con ->escape_string($_POST['password']);
$post_password_repeat = $con ->escape_string($_POST['password_repeat']);

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($post_username, $post_password)) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form! and use the website... u failed haxor');
}
// Make sure the submitted registration values are not empty.
if (empty($post_username) || empty($post_password)) {
	// One or more values are empty.
	exit('Please complete the registration form! and use the website... u failed haxor');
}


if($post_password_repeat != $post_password){
	
	$_SESSION['register_error'] = 'Those passwords do not match ...';
	header("Location: /public_html/pages/register");
	
}
else{

// We need to check if the account with that username exists.
if ($result = $con->query("SELECT uuid FROM users WHERE username = '$post_username'")) {
	
	if ($result->num_rows > 0) {
		// Username already exists
		$_SESSION['register_error'] = 'That username already exists...';
		header("Location: /pages/register");
	} else {
		
		$hash_password = password_hash($post_password, PASSWORD_DEFAULT);
		// Username doesnt exists, insert new account
		if ($result = $con->query("INSERT INTO users (uuid, username, password) VALUES (uuid(), '$post_username', '$hash_password')")) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			
			$_SESSION['login_error'] = 'You have been successfully registered as '.$post_username.'!';
			header("Location: /pages/login");
		} else {
			// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
			echo 'Could not prepare statement!2';
		}
	}
	$result->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!1';
}
}
$con->close();
?>