<?php
$Connection = mysql_connect('localhost', 'root', '');
$Selected = mysql_select_db('record', $Connection);
$update_record = $_GET['Update'];
$show_query = "select * from emp_record where id='$update_record'";
$update = mysql_query($show_query);
while ($DataRows = mysql_fetch_array($update)) {
    $Update_ID = $DataRows['id'];
    $Ename = $DataRows['ename'];
    $Ssn = $DataRows['ssn'];
    $Dept = $DataRows['dept'];
    $Salary = $DataRows['salary'];
    $Home = $DataRows['homeaddress'];
}

?>


<!DOCTYPE>
<html>
<head>
    <title></title>
</head>
<body>
<div>
    <form action="Update.php?Update_ID=<?php echo $update_id; ?>" , method="post">
        <fieldset>
            Name: <input type="text" name="Ename" value="<?php echo $Ename; ?>"> <br> <br>
            Social Security No: <input type="text" name="Ssn" value="<?php echo $Ssn; ?>"> <br> <br>
            Department: <input type="text" name="Dept" value="<?php echo $Dept; ?>"> <br> <br>
            Salary: <input type="text" name="Salary" value="<?php echo $Salary; ?>"> <br> <br>
            Home Address: <textarea name="Homeaddress"> <?php echo $Home; ?> </textarea> <br><br>
            <input type="submit" value="Insert Data" name="Submit">
        </fieldset>
    </form>
</div>

<?php

?>
</body>
</html>

<?php
// this block is for updating
$Connection = mysql_connect('localhost', 'root', '');
$Selected = mysql_select_db('record', $Connection);
if (isset($_POST['Submit'])) {
    $update_id = $_GET['Update_ID'];
    $ename = $_POST['Ename'];
    $ssn = $_POST['Ssn'];
    $dept = $_POST['Dept'];
    $salary = $_POST['Salary'];
    $homeaddress = $_POST['Homeaddress'];

    $update_query = "update emp_record set ename='$ename', ssn='$ssn', dept='$dept', salary='$salary', homeaddress='$homeaddress' 
                     where id='$update_id'";
    $execute = mysql_query($update_query);
    if ($execute) {
        function redirect_to($newLocation)
        {
            header("Location:" . $newLocation);
            exit;
        }

        redirect_to("Update_Into_Database.php?Updated=Record has been updated successfully");
    }

}
?>