<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>

  <link href="../../../../public_html/res/css/universal.css" rel="stylesheet"/>
  <title>Maze Level 2</title>
  <style>
    html,
    body {
      margin: 0 auto;
      padding: 0;
      width: 100%;
      height: 100%;
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

    #game {
      margin: 10px auto;
      padding: 0;
    }
  </style>
</head>

<body>
		<?php require_once '../../../../public_html/res/elements/navbar.php'; ?>
  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="game"></div>
<script src="phaser.min.js"></script>
<script src="../game_java/game1.js"></script>
</body>

</html>
