<?php
session_start();
?>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>

		<link href="res/css/universal.css" rel="stylesheet"/>
		<style>
        h1 {color:#e84855;}
        h1{
			font-size:100px;
			text-align:center;
			height:225px;
			padding:15px;
			text-shadow: 0px 5px 12px rgba(0,0,0, .35);
		}

		h2{text-align:center;}

        .btn-group-vertical button:hover{
			text-shadow:0px 0px 6px rgba(255,255,255,.70),0px 0px 3px rgba(255,255,255,.80);
			font-wieght:250;
			box-shadow:0px 0px 15px rgba(255,255,255,.18), 0px 0px 5px rgba(255,255,255,.25);
			border-color:white;
		} 
		.btn-group-vertical button{font-size:50px;font-size:50px;
			background-color:#2D2831;
			color:#fff;
			font-weight:200;
		}
		.btn{
			border-radius:8px;
		}
		.btn-group-vertical {
			box-shadow:0px 35px 125px rgba(0,0,0,.25), 0px 0px 8px rgba(0,0,0,.35);
			border-radius:25px;
		}
		</style>
	</head>
	<body>

	<?php require_once  '../public_html/res/elements/navbar.php'; ?>

		<div class=" ">
			<h1 >Jimmy's maze!</h1>
			<div class="col-md-12 text-center">
				<div class="btn-group-vertical" >
					<button type="button" class="btn btn-outline-danger"  id="score" onclick="window.location.href = 'pages/leader_board'">Check Leaderboard</button>
					<button type="button" class="btn btn-outline-danger" id="about"onclick="window.location.href = 'pages/about'">About</button>
					<?php 
                                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ){
                                            echo '<button type="button" class="btn btn-outline-danger" onclick="window.location.href = \'pages/user_profile\'">Profile</button>';
                                        }
                                        ?>
                                        <button type="button" class="btn btn-outline-danger" id="start" onclick="window.location.href = 'pages/game'">Start Game</button>

				</div>
			</div>
		</div>
	</body>
</html>
