<?php
session_start();


if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    echo '<script>
	alert("You are not logged in...");
	document.location = "../../pages/login";
	</script>';
}
?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>

    <link href="../../res/css/universal.css" rel="stylesheet"/>
    <style>
        .container img {
            margin:5px;
            padding:5px;
            width:250px;
            height:250px;
            display:block;
            border: 5px solid #5eb7e7;
            border-radius: 50%;
            box-shadow: 0px 8px 12px rgba(0,0,0, .25);
            margin-left:auto;
            margin-right:auto;
        }
        .container {
            margin-top :50px;
            padding:30px;
        }

        .table{
            box-shadow: 0px 5px 15px rgba(0,0,0, .15);
            display:inline-block;
            border:none;
            margin-left:auto;
            margin-right:auto;
            border-radius: 15px;
            background-color:#fff;
            width:100%;
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
        .table td,.table th{
            display:inline-block;
            width:calc(50% - .75rem);
        }
        .table tr{
            display:inline-block;
            width:100%;
        }
        .container div {
            display:inline-block;
            vertical-align:top;
            padding-left:15px;
            padding-right:15px;
            min-width:35%;
            max-width:50%;
        }
        .container h2{
            display:inline-block;
            width:100%;
            text-align: center;
            font-size:60px;
            text-shadow: 0px 5px 8px rgba(0,0,0, .35);
            font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";

            color:#e84855; 
        }
    </style>
</head>
<body>
    <?php require '../../res/elements/navbar.php'; ?>
    <div class="container jumbotron">
        <div>
            <h2>
                <?php ECHO $_SESSION["username"]; ?>
            </h2>
            <img id="user_img" src="/res/img/profile.png" >
        </div>
        <div style="float:right;">
            <table id="attepts" class="table">
                <tr>
                    <th colspan="2"> Best Times for Each Level </th>
                </tr>
                <tr>
                    <th> Level # </th>
                    <th> Best time </th>
                </tr>
<?php require '../../private_php/connect/userProfile.php'; ?>
            </table>
        </div>
    </div>
</body>
</html>