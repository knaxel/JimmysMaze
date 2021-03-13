<?php
session_start();
    $_SESSION['logged_in'] = FALSE;
    $_SESSION['username'] = null;
    $_SESSION['user_uuid'] = null;
    $_SESSION['time_registered'] = null;
session_destroy();
header("Location: /");