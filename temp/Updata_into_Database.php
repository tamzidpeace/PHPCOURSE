<!DOCTYPE>
<html>
<head>
    <title></title>
</head>
<body>
<table width="1000" border="5" align="center">
    <caption>View from database</caption>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>ssn</th>
        <th>dept</th>
        <th>salary</th>
        <th>home</th>
        <th>delete</th>
        <th>update</th>
    </tr>

    <?php

    $Connection = mysql_connect('localhost', 'root', '');
    $Selected = mysql_select_db('record', $Connection);
    $ViewQuery = "Select * From emp_record";
    $Execute = mysql_query($ViewQuery);
    while ($DataRows = mysql_fetch_array($Execute)) {
        $id = $DataRows['id'];
        $Ename = $DataRows['ename'];
        $Ssn = $DataRows['ssn'];
        $Dept = $DataRows['dept'];
        $Salary = $DataRows['salary'];
        $Home = $DataRows['homeaddress'];

        ?>
        <tr>
            <td> <?php echo $id; ?></td>
            <td> <?php echo $Ename; ?></td>
            <td> <?php echo $Ssn; ?></td>
            <td> <?php echo $Dept; ?></td>
            <td> <?php echo $Salary; ?></td>
            <td> <?php echo $Home; ?></td>
            <td><a href="../DB&PHP/Delete.php?Delete=<?Php echo $id; ?>">delete</a></td>
            <td><a href="Update.php?Update=<?php echo $id ?>">update</a></td>
        </tr>
    <?php } ?>

</table>


<?php
?>
</body>
</html>