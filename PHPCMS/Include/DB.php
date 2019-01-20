<?php
$Connection = mysql_connect('localhost', 'root', '');
$ConnectingDB = mysql_select_db('phpcms', $Connection);
/*if ($ConnectingDB)
    echo "connection is successful";
else
    echo "something is wrong";*/
?>