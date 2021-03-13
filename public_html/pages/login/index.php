<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    echo '<script>
	alert("You are already logged in...");
	document.location = "../../";
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
    <body class="center text-center" style="">

        <?php require_once '../../res/elements/navbar.php'; ?>

        <div style="width:600px; border-radius:10px; height:190px;margin-top:15px;margin-left:auto;margin-right:auto;background-color:#e9ecef;">
            <h1 style="margin-left:auto;margin-right:auto; color:#e84855;font-size:80px;"> JIMMY'S MAZE </h1>
            <p style="font-size:35px;color: #696c6f;"> The game of being in a maze. </p>
        </div>
        <div class="jumbotron" style="box-shadow:0px 3px 15px rgba(0,0,0,.2);border: 2px solid #383b3e; padding-top: 25px;padding-bottom:15px; width:50%; min-width:350; max-width:500px; margin-left:auto; margin-right:auto; margin-top:15px;" >

            <form class="form-signin" action="/../private_php/connect/login.php" method="post">
                <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                <label for="user" class="sr-only">Username</label>
                <input type="text" id="user" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required autofocus />
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required />

                <?php
                if (isset($_SESSION['login_error'])) {
                    ECHO '<p  style="color:#e84855;" >' . $_SESSION['login_error'] . '</p>';
                }
                ?>

                <a class="btn btn-lg btn-primary" href="../register">Register</a>
                <button class="btn btn-lg btn-primary"  type="submit" name="login" >Login</button>
            </form>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"/>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"/>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"/>
        </div>
    </body>
</html>
