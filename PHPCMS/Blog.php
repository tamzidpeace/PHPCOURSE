<!--included file-->
<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
?>

<!DOCTYPE>
<html>

<!--head section-->

<head>
    <title></title>
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
                $ViewQuery = "SELECT * FROM admin_panel ORDER BY datetime desc";
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
                            if (strlen($Post) > 150) {
                                $Post = substr($Post, 0, 150) . "...";
                            }
                            echo $Post; ?></p>
                    </div>
                    <a href="FullPost.php?id=<?php echo $PostId; ?>"><span
                                class="btn btn-info"> Read More &rsaquo;&rsaquo;</span></a>
                </div>
            <?php } ?>
        </div>
        <div style="background: #2b542c" class="col-sm-offset-1 col-sm-3"> <!--sidebar section-->
            <h2> side section</h2>
            <p style="color: #2b542c">PHP: Hypertext Preprocessor is a server-side scripting language designed for Web
                development. It was
                originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The
                PHP Group</p>
        </div>
    </div>


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