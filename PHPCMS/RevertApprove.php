<?php
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
require_once("Include/DB.php");
?>

<?php
if (isset($_GET["id"])) {
    $IdFromUrl = $_GET["id"];
    $Query = "update commets set status = 'OFF' where id='$IdFromUrl'";
    $Execute = mysql_query($Query);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "Comment revert successfully";
        Redirect_to("Comments.php");
    } else {
        $_SESSION["ErrorMessage"] = "Something is wrong";
        Redirect_to("Comments.php");
    }
}

?>
<?php
/**
 * Created by PhpStorm.
 * User: arafa
 * Date: 24-Jan-19
 * Time: 1:07 AM
 */