<?php

// Try and connect using the info above.
$con = mysqli_connect($_ENV['DATABASE_HOST'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS'], $_ENV['DATABASE_NAME'], $_ENV['DATABASE_PORT']);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL :( ' . mysqli_connect_error());
}
?>