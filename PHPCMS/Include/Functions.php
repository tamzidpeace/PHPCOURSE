<?php
/**
 * Created by Arafat.
 * User: arafat
 * Date: 20-Jan-19
 * Time: 3:52 PM
 */

require_once("Include/DB.php");
require_once("Include/Sessions.php");

function Redirect_to($New_Location)
{
    header("Location:" . $New_Location);
    exit;
}

function Login_Attempt($Username, $Password)
{
    $ConnectingDB;
    $Query = "select * from registration where username='$Username' and password='$Password'";
    $Execute = mysql_query($Query);
    if ($admin = mysql_fetch_assoc($Execute)) {
        return $admin;
    } else {
        return null;
    }
}

function Login()
{
    if (isset($_SESSION["User_Id"])) {
        return true;
    }
}

function Confirm_Login()
{
    if (!Login()) {
        $_SESSION["ErrorMessage"] = "Login required!";
        redirect_to("Login.php");
    }
}
