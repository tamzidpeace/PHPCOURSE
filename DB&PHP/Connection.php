<!DOCTYPE>
<html>
<head>
    <title>Connection</title>
</head>
<body>
<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "record";

$connection = mysql_connect($host, $user, $password);
if ($connection) {
    echo "working <br>";
} else {
    error . mysql_connect();
}
$selected = mysql_select_db($db_name, $connection);
if ($selected) {
    echo "database selected";
} else {
    error . mysql_select_db();
}


?>
</body>
</html>