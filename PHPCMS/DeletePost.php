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
        $DeleteFromUrl = $_GET["Delete"];
        $Query = "delete from admin_panel where id = $DeleteFromUrl";
        $Execute = mysql_query($Query);
        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Post Delete successfully";
            Redirect_to("Dashboard.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something is wrong";
            Redirect_to("Dashboard.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Delete Post</title>
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
            <h1 class="FieldInfo2">Delete Post</h1>
            <div><?php echo Message();
                echo SuccessMessage(); ?></div>
            <div>
                <?php
                $SearchQueryParameter = $_GET['Delete'];
                $ConnectingDB;
                $Query = "select * from admin_panel where id='$SearchQueryParameter'";
                $ExecuteQuery = mysql_query($Query);
                while ($DataRows = mysql_fetch_array($ExecuteQuery)) {
                    $TitleToBeUpdated = $DataRows['title'];
                    $CategoryToBeUpdated = $DataRows['category'];
                    $ImageToBeUpdated = $DataRows['image'];
                    $PostToBeUpdated = $DataRows['post'];
                }
                ?>
                <form action="DeletePost.php?Delete=<?php echo $SearchQueryParameter; ?>" method="post"
                      enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="title"><span class="FieldInfo">Title:</span></label>
                            <input disabled value="<?Php echo $TitleToBeUpdated; ?>" class="form-control" type="text"
                                   name="Title" id="title"
                                   placeholder="Title">
                        </div>
                        <div class="form-group">
                            <span
                                class="FieldInfo">Existing Category: <?php echo $CategoryToBeUpdated . "<br>"; ?></span>
                            <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
                            <select disabled class="form-control" id="categoryselect" name="Category">
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
                            <span class="FieldInfo">Existing Image: </span>
                            <img src="Upload/<?php echo $ImageToBeUpdated; ?>" width="90px" height="70px">
                            <br>
                            <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
                            <input disabled type="file" class="form-control" name="Image" id="imageselect">
                        </div>
                        <div class="form-group">
                            <label for="postarea"><span class="FieldInfo">Post:</span></label>
                            <textarea disabled class="form-control" name="Post"
                                      id="postarea"><?php echo $PostToBeUpdated; ?></textarea>
                        </div>
                        <br>
                        <input class="btn btn-danger btn-block" type="Submit" name="Submit" value="Delete Post">
                        <br>

                    </fieldset>
                </form>
            </div> <!-- end of form -->


        </div>

    </div>
</div>
<br> <br> <br> <br><br> <br> <br> <br><br> <br> <br> <br>
<!--end of container class-->

<!--start of footer section-->

<div id="footer">
    <hr>
    <p>Designed by Arafat. No right reserved</p>
    <a style="color: white; text-decoration: none; cursor: pointer; font-weight: bold;" href="dashboard.php">
        <p> There is no God none but Allah </p>
    </a>
    <hr>
</div>
<div style="height: 10px; background: #211f22;"></div>

<!--end of footer section-->

</body>
</html>