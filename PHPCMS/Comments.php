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
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a>
                </li>
                <li><a href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"></span> Add New Post</a></li>
                <li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span> Categories</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> Manage Admins</a></li>
                <li class="active"><a href="Comments.php"><span class="glyphicon glyphicon-comment"></span> Comments</a>
                </li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div> <!-- end of col-sm-2-->
        <div class="col-sm-10">
            <div><?php echo Message();
                echo SuccessMessage(); ?></div>
            <h2>Unapproved Comments</h2>

            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Approve</th>
                        <th>Delete Comment</th>
                        <th>Details</th>
                    </tr>

                    <?php
                    $ConnectingDB;
                    $Query = "select * from commets where status='OFF' order by datetime";
                    $Execute = mysql_query($Query);
                    $SrNo = 0;
                    while ($Datarows = mysql_fetch_array($Execute)) {
                        $CommentId = $Datarows['id'];
                        $DateTimeofComment = $Datarows['datetime'];
                        $PersonName = $Datarows['name'];
                        $PersonCommnet = $Datarows['comment'];
                        $CommentPostId = $Datarows['admin_panel_id'];
                        $SrNo++;
                        //if (strlen($PersonCommnet) > 30) $PersonCommnet = substr($PersonCommnet, 0, 20). "...";
                        if (strlen($PersonName) > 20) $PersonName = substr($PersonName, 0, 12) . "...";

                        ?>

                        <tr>
                            <td><?php echo $SrNo; ?></td>
                            <td><?php echo $PersonName; ?></td>
                            <td><?php echo $DateTimeofComment; ?></td>
                            <td><?php echo $PersonCommnet; ?></td>
                            <td><a href="ApproveComments.php?id=<?php echo $CommentId; ?>"><span
                                            class="btn btn-success">Approve</span></a></td>
                            <td><a href="DeleteComment.php?id=<?php echo $CommentId; ?>"><span class="btn btn-danger">Delete</span></a>
                            </td>
                            <td><a href="FullPost.php?id=<?php echo $CommentPostId; ?>"><span class="btn btn-primary">Live Preview</span></a>
                            </td>
                        </tr>

                    <?php } ?>
                </table>
            </div> <!-- end of un-approved comment -->

            <div class="table-responsive">
                <h2>Approved Comments</h2>
                <table class="table table-hover">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Comment</th>
                        <th>Approved</th>
                        <th>Delete Comment</th>
                        <th>Details</th>
                    </tr>

                    <?php
                    $ConnectingDB;
                    $Query = "select * from commets where status='ON' order by datetime";
                    $Execute = mysql_query($Query);
                    $SrNo = 0;
                    while ($Datarows = mysql_fetch_array($Execute)) {
                        $CommentId = $Datarows['id'];
                        $DateTimeofComment = $Datarows['datetime'];
                        $PersonName = $Datarows['name'];
                        $PersonCommnet = $Datarows['comment'];
                        $CommentPostId = $Datarows['admin_panel_id'];
                        $SrNo++;
                        //if (strlen($PersonCommnet) > 30) $PersonCommnet = substr($PersonCommnet, 0, 20) . "...";
                        if (strlen($PersonName) > 30) $PersonName = substr($PersonName, 0, 12) . "...";

                        ?>

                        <tr>
                            <td><?php echo $SrNo; ?></td>
                            <td><?php echo $PersonName; ?></td>
                            <td><?php echo $DateTimeofComment; ?></td>
                            <td><?php echo $PersonCommnet; ?></td>
                            <td><a href="RevertApprove.php?id=<?php echo $CommentId; ?>"><span class="btn btn-warning">Revert Approve</span></a>
                            </td>
                            <td><a href="DeleteComment.php?id=<?php echo $CommentId; ?>"><span class="btn btn-danger">Delete</span></a>
                            </td>
                            <td><a href="FullPost.php?id=<?php echo $CommentPostId; ?>"><span class="btn btn-primary">Live Preview</span></a>
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