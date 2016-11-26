<?php

session_start();
$_SESSION['login_user']=NULL;

header("location: ../index.php");
?>