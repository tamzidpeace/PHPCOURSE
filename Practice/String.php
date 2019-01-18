<!DOCTYPE>

<html>

<head>
    <h1>String</h1>
</head>

<body>

<?php

$string = "hello world <br>";
$string2 = 'hello world2 <br>';
echo($string);
echo($string2);

$color = "red";
$shirt = "tShirt";
$combination = $color . " " . $shirt;
echo($combination . "<br>");
echo "$combination <br>";

$fruit = 'banana <br>';
echo $fruit;
echo "{$shirt} is my favorite.<br>";


?>



<?php

// string functions

$things = "apple";
$name = "Arafat";
echo ($things. "<br>");
echo(strtoupper($things. "<br>"));
echo (strtolower($name. "<br>"));
echo (ucfirst($things. "<br>"));

//...

?>

</body>


</html>


