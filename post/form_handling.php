<?php

if(isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username == "arafat" and $password == 1234)
        echo "ok";
    else
        echo "no";

}




?>



<!DOCTYPE>

<html>


<head>

    <title></title>

</head>

<body>

<?php
//echo "hello world"
?>

<form action="form_handling.php" method="post">
    First name:<br>
    <input type="text" name="username"><br>
    Last name:<br>
    <input type="password" name="password"> <br>

    <input type="submit" name="submit" value="submitted">
</form>

</body>

</html>