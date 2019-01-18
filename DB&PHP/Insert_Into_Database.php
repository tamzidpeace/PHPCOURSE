<?php
if (isset($_POST["Submit"])) {
    if (!empty($_POST['Ename']) && !empty($_POST['Ssn'])) {
        $Ename = $_POST['Ename'];
        $Ssn = $_POST['Ssn'];
        $Dept = $_POST['Dept'];
        $Salary = $_POST['Salary'];
        $Homeaddress = $_POST['Homeaddress'];

        $Connection = mysql_connect('localhost', 'root', '');
        $Selected = mysql_select_db('record', $Connection);

        $Query = "INSERT INTO emp_record(ename, ssn, dept, salary, homeaddress)
              values ('$Ename', '$Ssn', '$Dept', '$Salary', '$Homeaddress')";
        $Execute = mysql_query($Query);

        if ($Execute)
            echo "information updated";
        else
            "something is wrong";
    } else {
        echo "At least fill name and ssn";
    }
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
            Name: <input type="text" name="Ename"> <br> <br>
            Social Security No: <input type="text" name="Ssn"> <br> <br>
            Department: <input type="text" name="Dept"> <br> <br>
            Salary: <input type="text" name="Salary"> <br> <br>
            Home Address: <textarea name="Homeaddress"> </textarea> <br><br>
            <input type="submit" value="Insert Data" name="Submit">
        </fieldset>
    </form>
</div>

<?php

?>
</body>
</html>