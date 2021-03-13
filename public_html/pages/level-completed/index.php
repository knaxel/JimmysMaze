<?php
session_start();

if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
	echo '<script>
	alert("You are not logged in...");
	document.location = "/";
	</script>';
}
?>

<html lang="en">

	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>

		<link rel="stylesheet" href="../../res/css/universal.css" />
		<style>
				.jumbotron input{
					margin-bottom:25px;
				}
				
		</style>
		<title>Jimmy's Maze</title>
	</head>
        
        <style>
            

            .jumbotron h1 {color:#e84855;}
           .jumbotron h1{
                font-size:50px;
                text-align:center;
                padding:15px;
                text-shadow: 0px 5px 12px rgba(0,0,0, .35);
            }
            .jumbotron h6{
                font-size:30px;
                margin:50px;
                text-align:left;
            }

            .jumbotron {
                padding:20px;
                width:50%;
                margin:50px;
                margin-right:auto;
                margin-left:auto;
                box-shadow: 0px 5px 152px rgba(0,0,0, .35);
            }
        </style>
	<body class="center text-center" style="">

            <?php require_once '../../res/elements/navbar.php';?>
            
            <?php 
            
            ?>
            <div class="jumbotron">
            
            <h1> You completed the level!</h1>
            <h6> Level : <?php echo $_GET['level_number']; ?> </h6>
            <h6> Time Taken :  <?php echo $_GET['time_taken']; ?> Seconds!</h6>
            <a type="button" id="return" class="btn btn-lg btn-primary"  href="/pages/game" >Return</a>
            </div>
            </body>
</html>
