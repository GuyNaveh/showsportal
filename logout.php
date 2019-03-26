<?php

session_start();

if(isset($_SESSION['id']) || isset($_SESSION['u_id']))
    unset($_SESSION['id']);
    unset($_SESSION['u_id']);
    session_destroy();

header("Location: index.php");

?>