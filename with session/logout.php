<?php
session_start();
//unset the session and redirect to login page
session_destroy();
header("location:login.php");

?>