<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>

        <link href="../../res/css/universal.css" rel="stylesheet"/>
        <style>
            h1{
                color : #e84855;
                text-align: center;
                font-size:100px;
                text-shadow: 0px 5px 12px rgba(0,0,0, .35);
                padding:5px;
            }
            .table{ 
                border:none;
                margin-left:auto;
                margin-right:auto;
                border-radius: 15px;
                background-color:#fff;
            }
            thead{
                border:none;
            }
            .table tr, .table th{
                border:none;
                color:#e84855; 
                text-align:center;
                background-color:rgba(0,0,0,0);
            }
            .container{
                padding:15px;
                box-shadow: 0px 4px 36px rgba(0,0,0, .30);
            }
            .container select {
                display:block;
                background-color:#f8f9fa;
                width:60%;
                height:50px;
                margin-left:auto;
                margin-right:auto;
                box-shadow: 0px 4px 12px rgba(0,0,0, .1);
            }

        </style>

    </head>
    <body>
        <?php require '../../res/elements/navbar.php'; ?>

        <h1>Leader Board!</h1>
        <div class="jumbotron container " id="parent">

            <form action="" method="post">
                <select class ="form-control"  did="level_select" name="level_selector" onchange="this.form.submit()">


                    <?php
                    $files = scandir("../../maze_game/src/assets/tilemaps");
                    $i = 1;
                    foreach ($files as $file) {
                        $len = strlen($file);
                        if (substr($file, $len - 5, $len) != '.json') {
                            continue;
                        }
                        if (isset($_POST["level_selector"]) && $_POST["level_selector"] == $i) {
                            echo '<option selected value="' . $i . '" >Level ' . $i . '</button>';
                        } else {
                            echo '<option  value="' . $i . '" >Level ' . $i . '</button>';
                        }

                        $i++;
                    }
                    ?>
                </select>
            </form>
            <table class="table">
<?php 
                require '../../private_php/connect/leaderboard.php'; ?>

            </table>
        </div>
    </body>
</html>
