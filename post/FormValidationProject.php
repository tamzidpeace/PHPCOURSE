<?php

$nameError = "";
$websiteError = "";
$genderError = "";
$emailError = "";

if(isset($_POST['submit'])) {

    if(empty($_POST["name"])) {
        $nameError = "name is required";
    } else {
        $name = Test_User_Input($_POST["name"]);
    }

    if(empty($_POST["email"])) {
        $emailError = "email is required";
    } else {
        $email = Test_User_Input($_POST["email"]);
    }

    if(empty($_POST["website"])) {
        $websiteError = "website is required";
    } else {
        $website = Test_User_Input($_POST["website"]);
    }

    if(empty($_POST["gender"])) {
        $genderError = "gender is required";
    } else {
        $gender = Test_User_Input($_POST["gender"]);
    }
}

function Test_User_Input($data) {
    return $data;
}


?>


<!DOCTYPE>

<html>


<head>

    <title></title>

</head>

<body>

<?php?>

<form action="FormValidationProject.php" method="Post">
	
	Name:<br>
	<input type="text" name="name"> * <?php echo $nameError; ?> <br>
	E-mail:<br>
	<input type="email" name="email"> <?php echo $emailError; ?> * <br>
	Gender: <?php echo $genderError; ?> *<br>
	<input type="radio" name="male" value="Male"> Male
	<input type="radio" name="female" value="Female"> Female <br>
	website:<br>
	<input type="text" name="website"> * <?php echo $websiteError; ?> <br>
	Comment:<br>
<!--	<input type="text" name="comment"> <br>
-->
    <textarea name="Comment" rows="5" cols="25"></textarea> <br> <br>
    <input type="submit" name="submit" value="submit">

</form>



</body>

</html> 