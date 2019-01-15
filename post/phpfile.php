<!DOCTYPE>

<html>


<head>

    <title></title>

</head>

<body>

<?php

	print_r($_POST);

?>

<?php

	$username = $_POST["username"];
	$password = $_POST["password"];
	$submit = $_POST["submit"];

	if(isset($_POST['submit'])) {

		echo "successfull login";

	}


?>



</body>

</html> 