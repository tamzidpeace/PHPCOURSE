<?php
/**
 * Created by PhpStorm.
 * User: arafat
 * Date: 20-Jan-19
 * Time: 2:29 PM
 */
date_default_timezone_set("Asia/Dhaka");
$CurrentTime = time();
//echo  $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
echo $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);