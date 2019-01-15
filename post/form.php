<?php

if (isset($_POST["Submit"])) {

    $Username = $_POST["Username"];

    $Password = $_POST["Password"];

    if ($Username == "arafat" && $Password == "arafat")
        echo "welcome";

    else echo "good bye";

}

?>


<!DOCTYPE>

<html>

<head> <title>Form</title> </head>

<body>

<?php ?>

<fieldset>
    <legend> HTML 5 Form</legend>

    <form action="" method="POST">

        <label for = "Username">Username:</label>
        <input id="Username" type="text" name="Username"> <br> <br>
        <label for="Password">Password:</label>
        &nbsp;
        <input id="Password" type="Password" name="Password"> <br> <br>
        <input type="Submit" name="Submit" value="Submitted">

        <!-- change 1-->


    </form>

</fieldset>

</body>


</html>