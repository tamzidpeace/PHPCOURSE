<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
?>

<?php
if (isset($_POST["Submit"])) {
    $Title = mysql_real_escape_string($_POST["Title"]);
    $Category = mysql_real_escape_string($_POST["Category"]);
    $Post = mysql_real_escape_string($_POST["Post"]);
    date_default_timezone_set("Asia/Dhaka");
    $CurrentTime = time();
    //echo  $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    $DateTime;
    $Admin = "Arafat";
    $Image = $_FILES["Image"]["name"];
    $Target = "Upload/" . basename($_FILES["Image"]["name"]);
    if (empty($Title)) {
        $_SESSION["ErrorMessage"] = "Title must be filled out";
        Redirect_to("AddNewPost.php");
    } elseif (strlen($Title) < 2) {
        $_SESSION["ErrorMessage"] = "Title must be at least 2 character";
        Redirect_to("AddNewPost.php");
    } else {
        global $ConnectingDB;
        $Query = "INSERT INTO admin_panel(datetime, title, category, author, image, post) 
        values('$DateTime', '$Title', '$Category', '$Admin', '$Image', '$Post')";
        $Execute = mysql_query($Query);
        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Post added successfully";
            Redirect_to("AddNewPost.php");
        } else {
            $_SESSION["ErrorMessage"] = "Category failed to add";
            Redirect_to("AddNewPost.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title> Add New Post</title>
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
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a>
                </li>
                <li class="active"><a href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"></span> Add New
                        Post</a></li>
                <li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span>
                        Categories</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> Manage Admins</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-comment"></span> Comments</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div> <!-- end of col-sm-2-->
        <div class="col-sm-10">
            <h1 class="FieldInfo2">Add New Post</h1>
            <div><?php echo Message();
                echo SuccessMessage(); ?></div>
            <div>
                <form action="AddNewPost.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="title"><span class="FieldInfo">Title:</span></label>
                            <input class="form-control" type="text" name="Title" id="title"
                                   placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
                            <select class="form-control" id="categoryselect" name="Category">
                                <?php
                                global $ConnectingDB;
                                $ViewQuery = "SELECT * FROM category order by datetime desc";
                                $Execute = mysql_query($ViewQuery);
                                while ($DataRows = mysql_fetch_array($Execute)) {
                                    $Id = $DataRows["id"];
                                    $CategoryName = $DataRows["name"];
                                    ?>
                                    <option><?php echo $CategoryName; ?></option>

                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
                            <input type="file" class="form-control" name="Image" id="imageselect">
                        </div>
                        <div class="form-group">
                            <label for="postarea"><span class="FieldInfo">Post:</span></label>
                            <textarea class="form-control" name="Post" id="postarea"></textarea>
                        </div>
                        <br>
                        <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Post">
                        <br>

                    </fieldset>
                </form>
            </div> <!-- end of form -->


        </div>

    </div>
</div>

<!--end of container class-->

<!--start of footer section-->

<div id="footer">
    <hr>
    <p>Designed by Arafat. No right reserved</p>
    <a style="color: white; text-decoration: none; cursor: pointer; font-weight: bold;" href="dashboard.php">
        <p> There is no God none but Allah <br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br></p>
    </a>
    <hr>
</div>
<div style="height: 10px; background: #211f22;"></div>

<!--end of footer section-->

</body>
</html>