<h1 id="request">Movie Premier Booking Form</h1>
<p class="req">Interested in Movie Premier at NY Cinema? Please complete and submit the following form to the Booking
    Office. One of our representatives will send you an information package tailored to the field(s) of Premier that
    interest you. Please indicate whether you would like additional information or not</p>


<style type="text/css">
    input[type="text"], input[type="email"], textarea {
        border: 1px solid dashed;
        background-color: rgb(221, 216, 212);
        width: 480px;
        padding: .5em;
        font-size: 1.0em;
    }

    .Error {
        color: red;
        font-size: 1.2em;
        font-family: Bitter, Georgia, Times, "Times New Roman", serif;
    }

    input[type="submit"] {
        color: white;
        float: right;
        font-size: 1.3em;
        font-family: Bitter, Georgia, Times, "Times New Roman", serif;
        width: 170px;
        height: 40px;
        background-color: #5D0580;
        border: 5px solid;
        border-bottom-left-radius: 35px;
        border-bottom-right-radius: 35px;
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-color: rgb(221, 216, 212);
        font-weight: bold;
    }

    .FieldInfo {
        color: rgb(251, 174, 44);
        font-family: Bitter, Georgia, "Times New Roman", Times, serif;
        font-size: 1.3em;

    }

    .MF {
        color: black;
        font-size: 1.2em;
        font-family: Bitter, Georgia, Times, "Times New Roman", serif;
    }

</style>

<?php

$nameError = "";
$websiteError = "";
$genderError = "";
$emailError = "";

if (isset($_POST['submit'])) {

    if (empty($_POST["name"])) {
        $nameError = "name is required";
    } else {
        $name = Test_User_Input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z .]*$/", $name)) {
            $nameError = "only letter and white space are allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailError = "email is required";
    } else {

        $email = Test_User_Input($_POST["email"]);
        if(!preg_match("/[A-zA-Z.-_]{3,}@[a-zA-Z.-_]{3,}.[a-zA-Z.-_]{2,}/", $email)) {
            $emailError = "email address not valid";
        }

    }

    if (empty($_POST["website"])) {
        $websiteError = "website is required";
    } else {

        $website = Test_User_Input($_POST["website"]);
        if(!preg_match("/(https:)\/\/+[a-za-z0-9\-_%$\#\/?\~!&+*.]+\.[a-za-z0-9\-_%$\#\/?\~!&+*.]*/", $website)) {
            $websiteError = "address is not valid";
        }
    }

    if (empty($_POST["gender"])) {
        $genderError = "gender is required";
    } else {
        $gender = Test_User_Input($_POST["gender"]);
    }
}

function Test_User_Input($data)
{
    return $data;
}


?>


<!DOCTYPE>

<html>


<head>

    <title></title>

</head>

<body>

<? php ?>

<form action="" method="Post">

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


<div class="clear"></div>

