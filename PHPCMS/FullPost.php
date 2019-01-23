<!--included file-->
<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
?>

<?php
if (isset($_POST["Submit"])) {
    $Name = mysql_real_escape_string($_POST["Name"]);
    $Email = mysql_real_escape_string($_POST["Email"]);
    $Comment = mysql_real_escape_string($_POST["Comment"]);
    date_default_timezone_set("Asia/Dhaka");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    $DateTime;
    $PostId = $_GET["id"];
    if (empty($Name) || empty($Email) || empty($Comment)) {
        $_SESSION["ErrorMessage"] = "Title, Email and Comment must be filled out";
    } elseif (strlen($Comment) > 300) {
        $_SESSION["ErrorMessage"] = "Comment can't exceed 300 character";
    } else {
        global $ConnectingDB;
        $PostIDFromURL = $_GET['id'];
        $Query = "insert into commets (datetime, name, email, comment, status, admin_panel_id) 
values ('$DateTime', '$Name', '$Email', '$Comment', 'OFF', '$PostIDFromURL')";
        $Execute = mysql_query($Query);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Comment submitted successfully";
            Redirect_to("FullPost.php?id={$PostId}");
        } else {
            $_SESSION["ErrorMessage"] = "Something is wrong";
            Redirect_to("FullPost.php?id={$PostId}");
        }
    }
}
?>

<!DOCTYPE>
<html>

<!--head section-->

<head>
    <title>Full Blog Post</title>
    <link rel="stylesheet" type="" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/publicstyle.css">
</head>

<body>


<!--start of nav-bar section-->

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
                <li><a href="#">Home</a></li>
                <li class="active"><a href="Blog.php">Blog</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Feature</a></li>
            </ul>
            <form action="Blog.php" class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="Search">
                </div>
                <button class="btn btn-default" name="SearchButton">Go</button>

            </form>
        </div>

    </div>
</nav>
<div class="Line" style="height: 10px; background: #27aae1;"></div>

<!--end of nav-bar section-->


<!--start of main area section-->

<div class="container">
    <div class="blog-header">
        <div><?php echo Message();
            echo SuccessMessage(); ?></div>
        <h1> the complete cms blog</h1>
        <p> this blog is developing using php only</p>
    </div>
    <div class="row"> <!--post section-->
        <div class="col-sm-8">
            <?php
            global $ConnectingDB;
            if (isset($_GET["SearchButton"])) {
                $Search = $_GET["Search"];
                $ViewQuery = "SELECT * FROM admin_panel WHERE 
datetime like '%$Search%' or category like '%$Search%' or post like '%$Search%'";
            } else {
                $PostIDFromURL = $_GET["id"];
                $ViewQuery = "SELECT * FROM admin_panel where id='$PostIDFromURL' ORDER BY datetime desc";
            }
            $Execute = mysql_query($ViewQuery);
            while ($DataRows = mysql_fetch_array($Execute)) {
                $PostId = $DataRows["id"];
                $DateTime = $DataRows["datetime"];
                $Title = $DataRows["title"];
                $Category = $DataRows["category"];
                $Admin = $DataRows["author"];
                $Image = $DataRows["image"];
                $Post = $DataRows["post"];
                ?>
                <div class="blogpost thumbnail">
                    <img class="img-responsive img-rounded" src="Upload/<?PHP echo $Image; ?>">
                    <div class="caption">
                        <h1 id="heading"><?php echo htmlentities($Title) ?></h1>
                        <p class="description">Category: <?php echo htmlentities($Category); ?>, Published on:
                            <?php echo htmlentities($DateTime); ?></p>
                        <p class="post"><?php
                            echo $Post; ?></p>
                    </div>
                </div>
            <?php } ?>

            <div>
                <span class="FieldInfo"><br>Share Your Comment <br> <br></span>
            </div>

            <div> <!-- start the from -->
                <form action="FullPost.php?id=<?php echo $PostId; ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="name"><span class="FieldInfo">Name:</span></label>
                            <input class="form-control" type="text" name="Name" id="Name"
                                   placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email"><span class="FieldInfo">Email:</span></label>
                            <input class="form-control" type="email" name="Email" id="Email" placeholder="Email">

                        </div>
                        <div class="form-group">
                            <label for="Commentarea"><span class="FieldInfo">Comment:</span></label>
                            <textarea class="form-control" name="Comment" id="Commentarea" placeholder="Comment"></textarea>
                        </div>
                        <br>
                        <input class="btn btn-primary" type="Submit" name="Submit" value="Submit Comment">
                        <br>

                    </fieldset>
                </form>
            </div> <!-- end of form -->


        </div>
        <div style="background: #2b542c" class="col-sm-offset-1 col-sm-3"> <!--sidebar section-->
            <h2> side section</h2>
            <p style="color: #2b542c">PHP: Hypertext Preprocessor is a server-side scripting language designed for Web
                development. It was
                originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The
                PHP Group</p>
        </div>
    </div>

    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

</div>

<!--end of main area section-->

<!--footer section-->
<div id="footer">
    <hr>
    <p>Designed by Arafat. No right reserved</p>
    <a style="color: white; text-decoration: none; cursor: pointer; font-weight: bold;" href="dashboard.php">
        <p> There is no God none but Allah</p>
    </a>
    <hr>

</div>

<!--end of footer section-->


</body>
</html>