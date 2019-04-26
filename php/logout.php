<?php
    session_start();
    session_unset();
    session_destroy();
    //unset($_SESSION['user']);
    header('Location:../signin.html');
    exit();
?>
