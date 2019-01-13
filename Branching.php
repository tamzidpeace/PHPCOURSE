<!DOCTYPE>

<html>

<head> <h1>Branching</h1> </head>

<body>

<?php

echo ("! I love you. <br>");

$name = array("sakib", "tamim", "mustafiz", "liton");


for($i = 0; $i<3; $i++) {

    if($name[$i] == "tamim")
        continue;

    elseif ($name[$i] == "sakib")
        break;

    else
        echo ($name[$i] . "<br>");
}

?>

</body>
