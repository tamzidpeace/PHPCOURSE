<!DOCTYPE>

<html>

<head> <h1>if else</h1> </head>

<body>

<?php

$a = 2;
$b = 5;
$c = 2;

/*if($a>$b) echo ("false");
elseif ($a<$b) echo ("true");
else  echo ("true");*/
/*if($a===$c) echo ("ok"); // '===' strictly equal*/
if($a == $c and $a == $b) echo "true";
else echo "false";

echo "<br>";
echo "<hr>";



$result =  $a > $b ? "wrong" : "right";
echo $result;

?>
</body>