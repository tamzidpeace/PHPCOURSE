<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
Confirm_Login();
?>

<?php
if (isset($_POST["Submit"])) {
    $Category = mysql_real_escape_string($_POST["Category"]);
    date_default_timezone_set("Asia/Dhaka");
    $CurrentTime = time();
    //echo  $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    $DateTime;
    $Admin = $_SESSION["Username"];
    if (empty($Category)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("categories.php");
    } elseif (strlen($Category) > 99) {
        $_SESSION["ErrorMessage"] = "Too long name";
        Redirect_to("categories.php");
    } else {
        global $ConnectingDB;
        $Query = "INSERT INTO category(datetime, name, creatorname) values('$DateTime', '$Category', '$Admin')";
        $Execute = mysql_query($Query);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Category added successfully";
            Redirect_to("Categories.php");
        } else {
            $_SESSION["ErrorMessage"] = "Category failed to add";
            Redirect_to("categories.php");
        }
    }
}
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
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-th"></span> Dashboard</a>
                </li>
                <li><a href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"></span> Add New Post</a></li>
                <li class="active"><a href="categories.php"><span class="glyphicon glyphicon-tags"></span>
                        Categories</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-user"></span> Manage Admins</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-comment"></span> Comments</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div> <!-- end of col-sm-2-->
        <div class="col-sm-10">
            <h1 class="FieldInfo2">Manage Categories</h1>
            <div><?php echo Message();
                echo SuccessMessage(); ?></div>
            <div>
                <form action="categories.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="categoryname"><span class="FieldInfo">Name:</span></label>
                            <input class="form-control" type="text" name="Category" id="categoryname"
                                   placeholder="Name">
                        </div>
                        <br>
                        <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Category">
                        <br>

                    </fieldset>
                </form>
            </div> <!-- end of form -->

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr No.</th>
                        <th>Date & Time</th>
                        <th>Category Name</th>
                        <th>Creator Name</th>
                        <th>Delete Category</th>
                    </tr>
                    <?php
                    global $ConnectingDB;
                    $ViewQuery = "select * from category order by datetime desc";
                    $Execute = mysql_query($ViewQuery);
                    $SrNo = 0;
                    while ($DataRows = mysql_fetch_array($Execute)) {
                        $Id = $DataRows["id"];
                        $DateTime = $DataRows["datetime"];
                        $CategoryName = $DataRows["name"];
                        $CreatorName = $DataRows["creatorname"];
                        $SrNo++;

                        ?>
                        <tr>
                            <td><?php echo $SrNo; ?></td>
                            <td><?php echo $DateTime; ?></td>
                            <td><?php echo $CategoryName; ?></td>
                            <td><?php echo $CreatorName; ?></td>
                            <td><a href="DeleteCategory.php?id=<?php echo $Id;?>"><span class="btn btn-danger">Delete</span></a></td>
                        </tr>
                    <?php } ?>
                </table>

            </div>

        </div>

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br>
</div>

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

<!--end of footer section-->

</body>
</html>