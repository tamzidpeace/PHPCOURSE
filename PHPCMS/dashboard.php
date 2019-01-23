<?php
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
require_once("Include/DB.php");
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
                <li class=""><a href="Blog.php" target="_blank">Blog</a></li>
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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">
            <h2>Admin Panel</h2>
            <ul id="side-menu" class="nav nav-fills nav-stacked">
                <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a>
                </li>
                <li><a href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"></span> Add New Post</a></li>
                <li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span> Categories</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> Manage Admins</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-comment"></span> Comments</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div> <!-- end of col-sm-2-->
        <div class="col-sm-10">
            <div><?php echo Message();
                echo SuccessMessage(); ?></div>
            <h1>Admin Dashboard</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>Post Title</th>
                        <th>Date and Time</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Banner</th>
                        <th>Comments</th>
                        <th>Action</th>
                        <th>Details</th>
                    </tr>
                    <?php
                    $ConnectingDB;
                    $ViewQuery = "select * from admin_panel order by datetime desc";
                    $Execute = mysql_query($ViewQuery);
                    $serial_no = 0;
                    While ($Datarows = mysql_fetch_array($Execute)) {
                        $Id = $Datarows["id"];
                        $DateTime = $Datarows["datetime"];
                        $Title = $Datarows["title"];
                        $Category = $Datarows["category"];
                        $Admin = $Datarows["author"];
                        $Image = $Datarows["image"];
                        $Post = $Datarows["post"];
                        $serial_no++;
                        ?>
                        <tr>
                            <td><?php echo $serial_no; ?></td>
                            <td><?php
                                if (strlen($Title) > 15)
                                    $Title = substr($Title, 0, 15) . "... ";
                                echo $Title; ?></td>
                            <td><?php echo $DateTime; ?></td>
                            <td><?php echo $Admin; ?></td>
                            <td><?php echo $Category; ?></td>
                            <td><img src="Upload/<?php echo $Image; ?>" width="100px" height="100px"></td>
                            <td>Processing</td>
                            <td>
                                <a href="EditPost.php?Edit=<?php echo $Id; ?>"><span class="btn btn-warning">Edit</span></a>
                                <a href="DeletePost.php?Delete=<?php echo $Id; ?>"><span
                                            class="btn btn-danger">Delete</span></a>
                            <td>
                                <a href="FullPost.php?id=<?php echo $Id; ?>"> <span
                                            class="btn btn-primary">Live Preview</span> </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>


        </div>

    </div>
</div>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

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


<!--end of footer section-->

</body>
</html>