<!DOCTYPE>
<html>
<head>
    <title>Cookie</title>
</head>
<body>
<?php

// setting cookie
$ExpireTime = time()  + 86400;
//echo "time is".$ExpireTime;
setcookie("Name", "Jazeb", $ExpireTime);
setcookie("age", "24", $ExpireTime);
//echo $_COOKIE["Name"] ."<br>" . $_COOKIE["age"];
// unsetting cookie
$ExpireTime_Unset = time() - 86400;
setcookie("Name", "arafat", $ExpireTime_Unset);
if(isset($_COOKIE["Name"])) {
    echo "cookie is set with the name of ". $_COOKIE["Name"];
} else {
    echo "cookie isn't set";
}

?>
</body>
</html>