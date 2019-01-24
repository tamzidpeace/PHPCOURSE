<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
?>

<?php
if (isset($_POST["Submit"])) {
    $Username = mysql_real_escape_string($_POST["Username"]);
    $Password = mysql_real_escape_string($_POST["Password"]);

    if (empty($Username) || empty($Password)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("Login.php");
    } else {
        $Found_Account = Login_Attempt($Username, $Password);
        $_SESSION["User_Id"] = $Found_Account["id"];
        $_SESSION["Username"] = $Found_Account["username"];
        if ($Found_Account) {
            $_SESSION["SuccessMessage"] = "Login Successful, Welcome $Username!";
            Redirect_to("Dashboard.php");
        } else {
            $_SESSION["ErrorMessage"] = "Wrong Username or Password, Please try again!";
            Redirect_to("Login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/adminstyles.css">
</head>
<body>

<!--nav-bar start-->

<div style="height: 10px; background: #27aae1;"></div>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Blog.php">
                <img style="margin-top: -20px;" src="images/web-icon.png" width=70;height=55;>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">techdroweb.com</a></li>
            </ul>
        </div>

    </div>
</nav>
<div class="Line" style="height: 10px; background: #27aae1;"></div>


<!--nav-bar end-->

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-offset-4 col-sm-4">
            <div><?php echo Message();
                echo SuccessMessage(); ?></div>
            <h1 class="loginpage">Welcome <br></h1>

            <div>
                <form action="Login.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="Username"><span class="loginpage"><h3>Usename:</h3></span></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                                </span>
                                <input class="form-control" type="text" name="Username" id="Username"
                                       placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password"><span class="loginpage"><h3>Password:</h3></span></label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock text-primary"></span>
                                </span>
                                <input class="form-control" type="password" name="Password" id="Password"
                                       placeholder="Password">
                            </div>
                        </div>
                        <br>
                        <input class="btn btn-info btn-block" type="Submit" name="Submit" value="Login">
                        <br>

                    </fieldset>
                </form>
            </div> <!-- end of form -->


        </div>

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<!--end of container class-->

<!--start of footer section-->


<!--end of footer section-->

</body>
</html>