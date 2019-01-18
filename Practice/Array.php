<!DOCTYPE>

<html>

<head> <h1>Array</h1> </head>

<body>

<?php

$name = array("screen", "mouse", "mobile");

echo ($name[0]). "<br>";
echo ($name[1]). "<br>";
echo ($name[2]). "<br>";
$name[50] = "hello";

$playlist = array(1,2,2.22, 'maroon', $name, "mango");
echo $playlist[5]. "<br>";
echo $name[50]. "<br>";

?>

<?php

// associative array

$person = array("name"=> "arafat", "age"=>24, "hobby"=>"programming");
echo ($person["name"]. "<br>");
echo ($person["age"]. "<br>");
echo ($person["hobby"]. "<br>");

?>

<?php

$color = array("red", "green", "blue");

//array_pop($color); //to pop from array
//print_r($color);  // to check the structure of array
//array_push($color, "black");  // push item in array
//print_r($color);

$number_of_item = count($color);
echo $number_of_item. "<br>";
$numbers = array(1,2,3,4,0,10,5);
echo max($numbers) . "<br>";
echo min($numbers). "<br>";
echo in_array(3, $numbers);
echo sort($numbers);
echo rsort($numbers);



?>

</body>

</html>