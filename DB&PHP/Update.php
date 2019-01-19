<?php
$Connection = mysql_connect('localhost', 'root', '');
$Selected = mysql_select_db('record', $Connection);
$Update_Record = $_GET['Update'];
$ShowQuery = "SELECT * FROM emp_record where id ='$Update_Record'";
$Update = mysql_query($ShowQuery);
while ($DataRows = mysql_fetch_array($Update)) {
    $Update_Id = $DataRows['id'];
    $EName = $DataRows['ename'];
    $SSN = $DataRows['ssn'];
    $Dept = $DataRows['dept'];
    $Salary = $DataRows['salary'];
    $HomeAddress = $DataRows['homeaddress'];
}
?>

    <!DOCTYPE>
    <html>
    <head>
        <title></title>
    </head>
    <body>
    <div>
        <form action="Update.php?Update_Id=<?php echo $Update_Id; ?>" , method="post">
            <fieldset>
                Name: <input type="text" name="EName" value="<?php echo $EName; ?>"> <br> <br>
                Social Security No: <input type="text" name="SSN" value="<?php echo $SSN; ?>"> <br> <br>
                Department: <input type="text" name="Dept" value="<?php echo $Dept; ?>"> <br> <br>
                Salary: <input type="text" name="Salary" value="<?php echo $Salary; ?>"> <br> <br>
                Home Address: <textarea name="HomeAddress"> <?php echo $HomeAddress; ?> </textarea> <br><br>
                <input type="submit" value="Insert Data" name="Submit">
            </fieldset>
        </form>
    </div>

    <?php

    ?>
    </body>
    </html>

<?php
$Connection = mysql_connect('localhost', 'root', '');
$Selected = mysql_select_db('record', $Connection);

if (isset($_POST['Submit'])) {
    $Update_Id = $_GET['Update_Id'];
    $EName = $_POST['EName'];
    $SSN = $_POST['SSN'];
    $Dept = $_POST['Dept'];
    $Salary = $_POST['Salary'];
    $HomeAddress = $_POST['HomeAddress'];

    $UpdateQuery = "UPDATE emp_record SET ename='$EName', ssn='$SSN', dept='$Dept', salary='$Salary', homeaddress='$HomeAddress' 
    WHERE id='$Update_Id'";
    $Execute = mysql_query($UpdateQuery);
    if ($Execute) {
        function redirect_to($NewLocation)
        {
            header("Location:" . $NewLocation);
            exit;
        }

        redirect_to("Update_Into_Database.php?Updated=Recorded has been Updated Successfully");
    }
}

?>