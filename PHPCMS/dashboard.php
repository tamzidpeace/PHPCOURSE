<?php
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title></title>
    <link rel="stylesheet" type="" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/adminstyles.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <h2>Admin Panel</h2>
            <ul id="side-menu" class="nav nav-fills nav-stacked">
                <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a>
                </li>
                <li><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"></span> Add New Post</a></li>
                <li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span> Categories</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> Manage Admins</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-comment"></span> Comments</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div> <!-- end of col-sm-2-->
        <div class="col-sm-10">
            <h1>Admin Dashboard</h1>
            <div><?php echo Message();
                echo SuccessMessage(); ?></div>
            <h4>About</h4>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <h1>About</h1>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <h1>About</h1>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
            <p>
                XAMPP has been around for more than 10 years – there is a huge community behind it. You can get involved
                by joining our Forums, adding yourself to the Mailing List, and liking us on Facebook, following our
                exploits on Twitter, or adding us to your Google+ circles.
            </p>
        </div>

    </div>
</div>

<!--end of container class-->

<!--start of footer section-->

<div id="footer">
    <hr>
    <p>Designed by Arafat. No right reserved</p>
    <a style="color: white; text-decoration: none; cursor: pointer; font-weight: bold;" href="dashboard.php">
        <p> There is no God none but Allah</p>
    </a>
    <hr>
</div>
<div style="height: 10px; background: #211f22;"></div>

<!--end of footer section-->

</body>
</html>