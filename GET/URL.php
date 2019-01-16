<!DOCTYPE>

<html>


<head>

    <title></title>

</head>

<body>

<?php
$web = "google pakistan";
$search = "jazeb akram online courses and website";
$result = "https://".rawurlencode($web)."?search".urlencode($search);
//$result2 = "https://".rawurlencode($web)."?search".rawurlencode($search);
echo $result ;
"<br>";
//echo $result2;

?>



</body>

</html>