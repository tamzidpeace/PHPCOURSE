<?php
require_once("Include/Sessions.php");
require_once("Include/Functions.php");
require_once("Include/DB.php");
?>

<?php
if (isset($_GET["id"])) {
    $IdFromUrl = $_GET["id"];
    //$Query = "update commets set status = 'OFF' where id='$IdFromUrl'";
    $Query = "delete from category where id='$IdFromUrl'";
    $Execute = mysql_query($Query);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "Category deleted successfully";
        Redirect_to("categories.php");
    } else {
        $_SESSION["ErrorMessage"] = "Something is wrong";
        Redirect_to("categories.php");
    }
}

?>
<?php