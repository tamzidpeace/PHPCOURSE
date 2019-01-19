<?php
$Connection = mysql_connect('localhost', 'root', '');
$Selected = mysql_select_db('record', $Connection);
$update_record = $_GET['Update'];
$show_query = "select * from emp_record where id='$update_record'";
$update = mysql_query($show_query);
while ($DataRows = mysql_fetch_array($update)) {
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
    <form action="Insert_Into_Database.php" , method="post">
        <fieldset>
            Name: <input type="text" name="Ename" value="<?php echo $Ename; ?>"> <br> <br>
            Social Security No: <input type="text" name="Ssn" value="<?php echo $Ssn ?>"> <br> <br>
            Department: <input type="text" name="Dept" value="<?php echo $Dept ?>"> <br> <br>
            Salary: <input type="text" name="Salary" value="<?php echo $Salary ?>"> <br> <br>
            Home Address: <textarea name="Homeaddress"> <?php echo $Home ?> </textarea> <br><br>
            <input type="submit" value="Insert Data" name="Submit">
        </fieldset>
    </form>
</div>

<?php

?>
</body>
</html>