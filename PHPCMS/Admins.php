<?php
require_once("Include/DB.php");
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
Confirm_Login();
?>

<?php
if (isset($_POST["Submit"])) {
    $Username = mysql_real_escape_string($_POST["Username"]);
    $Password = mysql_real_escape_string($_POST["Password"]);
    $ConfirmPassword = mysql_real_escape_string($_POST["ConfirmPassword"]);
    date_default_timezone_set("Asia/Dhaka");
    $CurrentTime = time();
    //echo  $DateTime = strftime("%Y-%m-%d %H:%M:%S", $CurrentTime);
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    $DateTime;
    $Admin = "Arafat";
    if (empty($Username) || empty($Password) || empty($ConfirmPassword)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("Admins.php");
    } elseif (strlen($Password) < 4) {
        $_SESSION["ErrorMessage"] = "Password at least 4 characters";
        Redirect_to("Admins.php");
    } elseif ($Password != $ConfirmPassword) {
        $_SESSION["ErrorMessage"] = "Password doesn't match";
        Redirect_to("Admins.php");
    } else {
        global $ConnectingDB;
        $Query = "INSERT INTO registration(datetime, username, password, addedby) values('$DateTime', '$Username', '$Password', '$Admin')";
        $Execute = mysql_query($Query);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Admin added successfully";
            Redirect_to("Admins.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something is wrong";
            Redirect_to("Admins.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="english">
<head>
    <title>Admins</title>
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
                <li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span>
                        Categories</a></li>
                <li class="active"><a href="Admins.php"><span class="glyphicon glyphicon-user"></span> Manage Admins</a>
                </li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-comment"></span> Comments</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-equalizer"></span> Live Blog</a></li>
                <li><a href="dashboard.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div> <!-- end of col-sm-2-->
        <div class="col-sm-10">
            <h1 class="FieldInfo2">Manage Admins Access</h1>
            <div><?php echo Message();
                echo SuccessMessage(); ?></div>
            <div>
                <form action="Admins.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="Username"><span class="FieldInfo">Usename:</span></label>
                            <input class="form-control" type="text" name="Username" id="Username"
                                   placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="categoryname"><span class="FieldInfo">Password:</span></label>
                            <input class="form-control" type="password" name="Password" id="Password"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="ConfirmPassword"><span class="FieldInfo">Name:</span></label>
                            <input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword"
                                   placeholder="ConfirmPassword">
                        </div>
                        <br>
                        <input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add New Admin">
                        <br>

                    </fieldset>
                </form>
            </div> <!-- end of form -->

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>Sr No.</th>
                        <th>Date & Time</th>
                        <th>Admin Name</th>
                        <th>Added By</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    global $ConnectingDB;
                    $ViewQuery = "select * from registration order by datetime desc";
                    $Execute = mysql_query($ViewQuery);
                    $SrNo = 0;
                    while ($DataRows = mysql_fetch_array($Execute)) {
                        $Id = $DataRows["id"];
                        $DateTime = $DataRows["datetime"];
                        $AdminName = $DataRows["username"];
                        $AddedBy = $DataRows["addedby"];
                        $SrNo++;

                        ?>
                        <tr>
                            <td><?php echo $SrNo; ?></td>
                            <td><?php echo $DateTime; ?></td>
                            <td><?php echo $AdminName; ?></td>
                            <td><?php echo $AddedBy; ?></td>
                            <td><a href="DeleteAdmin.php?id=<?php echo $Id; ?>"><span
                                            class="btn btn-danger">Delete</span></a></td>
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