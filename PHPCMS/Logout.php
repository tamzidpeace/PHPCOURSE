<?php
require_once("Include/Functions.php");
require_once("Include/Sessions.php");

// log out process
$_SESSION["User_Id"] = null;
redirect_to("Login.php");
session_destroy();


?>
