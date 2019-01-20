<?php
/**
 * Created by PhpStorm.
 * User: arafa
 * Date: 20-Jan-19
 * Time: 3:52 PM
 */
function Redirect_to($New_Location)
{
    header("Location:" . $New_Location);
    exit;
}