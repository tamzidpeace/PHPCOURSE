<?php
/**
 * Created by PhpStorm.
 * User: arafa
 * Date: 19-Jan-19
 * Time: 8:37 PM
 */
function writeMsg($name)
{
    echo $name . "<br>";
}

writeMsg("vicky");
writeMsg("rocky");
writeMsg("lucky");

function students($name, $roll)
{
    echo $name . " " . $roll . "<br>";
}

students("ruble", "1");
students("ruble", "1");
students("ruble", "1");
?>

<?php

function sum($a, $b)
{
    $result = $a + $b;
    return $result;
}

echo sum(2, 3);