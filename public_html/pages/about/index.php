<?php
session_start();
?>
<html lang="en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>

		<link href="../../res/css/universal.css" rel="stylesheet"/>
		<style>
			h1 {
				color : #e84855;
				text-align: center;
				font-size:90px;
				text-shadow: 0px 5px 12px rgba(0,0,0, .35);
			}

			.container{
				width:50%;
				margin-left:auto;
				margin-right:auto;
				margin-top:25px;
			}
			.jumbotron{
				margin-top:25px;
				padding:25px;
				box-shadow:0px 35px 125px rgba(0,0,0,.25), 0px 0px 8px rgba(0,0,0,.35);
			}
			p{
				color:#383b3e;
				font-size:25px;

				width:95%;
				padding:5px;
				margin-left:auto;
				margin-right:auto;
			}
		</style>
	</head>
		<body>
		<?php require_once '../../res/elements/navbar.php'; ?>
			<div class="container" >
				<h1>About Jimmy's Maze!</h1>
				<p class="jumbotron"> HELLO! Welcome to Jimmy's Maze! This game is all about trying to solve as many mazes as you possibly can and have fun along the way. The arrow keys are what move your character through the maze. Good Luck! </p>
			</div>
		</body>
	</html>
