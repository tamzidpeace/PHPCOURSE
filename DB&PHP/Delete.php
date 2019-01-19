<?php
$Connection = mysql_connect('localhost', 'root', '');
$Selected = mysql_select_db('record', $Connection);
$delete_record_id = $_GET['Delete'];
$delete_query = "delete from emp_record where id = '$delete_record_id'";
$execute = mysql_query($delete_query);
if ($execute) {
    //echo '<script>window.open("Delete_From_Database.php?Deleted=record deleted successfully", "_self")</script>';
    echo "item deleted successfully";
} else {
    echo "something is wrong";
}
?>