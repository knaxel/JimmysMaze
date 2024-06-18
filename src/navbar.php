<script>
    var visibleHub = false;

    document.onload = function () {
        visibleHub = false;
    };
    function openUserHub() {
        if (visibleHub) {
            document.getElementById("userHub").style.display = "none";
            visibleHub = false;
        } else {
            document.getElementById("userHub").style.display = "block";
            visibleHub = true;
        }
    }
</script>
<div id="requireDesktop">
    
    Your browser window is too small. <br>
    If you're on a mobile device try a desktop. <br> Otherwise, increase the size of your window.

</div>
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 2px solid #e84855;">
    <a class="navbar-brand" href="/" style="text-shadow:0px 3px 5px rgba(0,0,0,.15); font-weight:350;font-size:30px;color:#e84855;">
        <h3> Jimmy's Maze </h3> </a>
    <ul class=" navbar-nav mr-auto">
        <li class="navbar-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="navbar-item ">
            <a class="nav-link" href="/p/leaderboard">Leaderboard</a>
        </li>
        <li class="navbar-item ">
            <a class="nav-link" href="/p/about">About</a>
        </li>
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            echo ' <li class="navbar-item "><a class="nav-link" href="/p/user_profile">Profile</a></li>';
        }
        ?>
    </ul>
    <a onclick="openUserHub()" class="btn my-2 my-sm-0 rounded-circle  btn-prof" style="padding:0px;padding-top:7px;padding-right:.5px;width:65px; height:65px;" href="#" >
        <img class="rounded-circle" src="/img/profile.png" width="50px"height="50px" />
    </a>
    <style>
        #userHub{
            display:none;
            background-color: #383b3e;
            padding :15px;
            border-radius: 10px;
            color :#e84855;
            position: absolute;
            right :8px;
            top:90px;
            box-shadow: 0px 0px 15px rgba(0,0,0,.5);
        }
        #userHub div{
            display:block;
            width:fit-content;
            margin-left:auto;
            margin-right:auto;
            margin-top:5px;
        }
        #userHub h6{
            padding:10px;
        }
    </style>
    <div id="userHub">
        <?php
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            echo '<h6> You are currently logged in as : <span style="color:white">'.$_SESSION['username'].'</span></h6> <div><a href="/connect/logout.php" class="btn btn-lg btn-primary"  type="submit">Logout</a></div>';
        } else {
            echo '<h6> You are currently not logged in </h6>
				<div>
				<a href="/p/login" class="btn btn-lg btn-primary"  type="submit">Login</a>
				<a href="/p/register" class="btn btn-lg btn-primary"  type="submit">Register</a>
				</div>';
        }
        ?>
    </div>
</nav>