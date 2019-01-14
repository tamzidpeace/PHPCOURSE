<!DOCTYPE>

<html>

<head> <h1>function</h1> </head>

<body>

<?php

echo ("! I love you.");

/*
 * Super Global Variable
 *
 * There are 9 types of SGV
 *
     * 1. $GLOBAL
     * 2. $_SERVER
     * 3. $_REQUEST
     * 4. $_FILES
     * 5. $_SESSION
     * 6. $_ENV
     * 7. $_GET
     * 8. $_POST
     * 9. $_COOKIE
 *
 */

$num1 = 7;
$num2 = 13;

function add() {
    $GLOBALS['Z'] = $GLOBALS['num1'] + $GLOBALS['num2'];
}

add();

echo $Z;

?>

</body>

</html>
