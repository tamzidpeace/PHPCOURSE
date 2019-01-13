<!DOCTYPE>

<html>

<head> <h1>Loops</h1> </head>

<body>

<?php

/*$number = array(2,3,4,5);

foreach ($number as $num) {
    echo $num . "<br>";
}*/

$windows = array(1 => "desktop" , 2 => "my_computer");

/* for($i = 1 ; $i<3; $i++)
     echo $windows[$i] . "<br>" ;*/

 foreach ($windows as $key => $value) {
     echo ($key ." is for " . $value . "<br>");
 }

?>

</body>