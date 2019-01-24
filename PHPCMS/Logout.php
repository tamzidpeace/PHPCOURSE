<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php");

// log out process
$_SESSION["User_Id"] = null;
session_destroy();
redirect_to("Login.php");

?>
