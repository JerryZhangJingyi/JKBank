<?php

session_start();
$user = $_POST[ 'user' ];
$pass = $_POST[ 'pass' ];
$type = $_POST[ 'type' ];
$link = mysql_connect('localhost', 'jzhang', '15821804287')
   or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('Bank') or die('Could not select database');


if($type == 'customer'){
    $query1 = "SELECT CustomerID FROM Customer WHERE Password = '$pass' AND UserName = '$user'";
   
    $result = mysql_query($query1);
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $count = mysql_num_rows($result);
    if ($count == 1)
        {
        $_SESSION['id']=$result;
        $_SESSION['user']=$user;
        $_SESSION['pass']=$pass;
        header("Location: customer.php");
        exit;
        }
        else {
         header("Location: loginerror.html");
        }
}
else{
    $query = "SELECT EmployeeID FROM Employee WHERE EmployeeID = '$user' AND Password = '$pass'";

    $result1 = mysql_query($query);
    $row1 = mysql_fetch_array($result1,MYSQL_ASSOC);
    $count1 = mysql_num_rows($result1);

    if ($count1 == 1)
    {
    $_SESSION['id']=$result1;
    $_SESSION['user']=$user;
    $_SESSION['pass']=$pass;
    header("Location: employee.php");
    exit;
    }
else {
header("Location: loginerror.html");
}

}







mysql_close($link);
?>