<?php
session_start();

if(!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']){
    $_SESSION['login_error'] = 'You must be logged in to play the game!';
    header('Location: /pages/login');
}
?>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>

        <link href="../../res/css/universal.css" rel="stylesheet"/>
        <title>Maze Level 1</title>
        <style>
            html,
            body {
                margin: 0 auto;
                padding: 0;
                width: 100%;
                height: 100%;
            }

            #game {
				
                margin: 10px auto;
                padding: 0;
            }


            #level-selector h1 {color:#e84855;}
            #level-selector h1{
                font-size:100px;
                text-align:center;
                height:225px;
                padding:15px;
                text-shadow: 0px 5px 12px rgba(0,0,0, .35);
            }

            #level-selector h2{
                text-align:center;
            }

            .btn-group-vertical button:hover{
                text-shadow:0px 0px 6px rgba(255,255,255,.70),0px 0px 3px rgba(255,255,255,.80);
                font-wieght:250;
                box-shadow:0px 0px 15px rgba(255,255,255,.18), 0px 0px 5px rgba(255,255,255,.25);
                border-color:white;
            } 
            .btn-group-vertical>.btn, .btn-group-vertical>.btn-group{
                width:250px;

            }
            .btn-group-vertical button{
                font-size:50px;
                font-size:50px;
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
        <?php require_once '../../res/elements/navbar.php'; ?>
        <noscript>You need to enable JavaScript to run this app.</noscript>
        <div id="game"></div>
        <script src="/maze_game/src/phaser.min.js"></script>
        <script>
            var jsonLevel = null;
            var levelNumber = null;
            function selectLevel(v, i) {
                $("#level-selector").remove();
                levelNumber = i;
                jsonLevel = v;
				$("#game").height( "80%");
                $.getScript("/maze_game/src/game.js");
            }
        </script>
        <span id="response" ></span>

        <div id="level-selector">
            <h1 >Jimmy's maze!</h1>
            <div class="col-md-12 text-center">
                <div class="btn-group-vertical" >

                    <?php
                    $files = scandir("../../maze_game/src/assets/tilemaps");
                    $i = 1;
                    foreach ($files as $file) {
                        $len = strlen($file);
                        if (substr($file, $len - 5, $len) != '.json') {
                            continue;
                        }
                        if ($i > $_SESSION['current_level']) {
                            echo '<button type="button" class="btn btn-outline-danger" style="color:gray;" onclick="alert(\'You may not play a level you have not reached!\')">Level ' . $i . '</button>';
                        } else {
                            echo '<button type="button" class="btn btn-outline-danger"  onclick="selectLevel(\'' . $file . '\', ' . $i . ');">Level ' . $i . '</button>';
                        }
                        $i++;
                    }
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>
