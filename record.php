<html>
<head>
      <title>Customer Information</title>
<style> 
    header, footer {
        padding: 1em;
        color: white;
        background-color: cornflowerblue;
        clear: left;
        text-align: center;
    }
    article {
        margin-left: 820px;
        padding: 1em;
        overflow: hidden;
        text-align: left;
    }
.flex-container {
    display: -webkit-flex;
    display: flex;  
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    font-weight: bold;
    text-align: center;
}

.flex-container > * {
    padding: 10px;
    flex: 1 100%;
}

.main {
    text-align: left;
    background: snow;
}

.header {background: lightskyblue;}
.footer {background: lightskyblue;}
.aside1 {background: lightskyblue;}
.aside2 {background: lightskyblue;}

@media all and (min-width: 768px) {
    .aside { flex: 1 auto; }
    .main    { flex: 3 0px; }
    .aside1 { order: 1; } 
    .main    { order: 2; }
    .aside2 { order: 3; }
    .footer  { order: 4; }
}
</style>
</head>
<body>
<header>
   <img src="logo.jpg" alt="bank icon" height="169" width="447">
</header>

<h2 align="center">Customer Information</h2>

<p align ="center">
<?php

session_start();
$user1 = $_POST[ 'user1' ];
$link = mysql_connect('localhost', 'jzhang', '15821804287')
   or die('Could not connect: ' . mysql_error());
mysql_select_db('Bank') or die('Could not select database');

$query1 = "SELECT CustomerID FROM Customer WHERE  UserName = '$user1'";
   
    $result = mysql_query($query1);
    $row = mysql_fetch_array($result,MYSQL_ASSOC);
    $count = mysql_num_rows($result);
    if ($count != 1)
        {
         header("Location: loginerror2.html");
        }



// Performing SQL query
$id = mysql_query("SELECT CustomerID FROM Customer WHERE UserName = '$user1'");

// Printing results in HTML
while ($line = mysql_fetch_array($id, MYSQL_ASSOC)) {
   foreach ($line as $col_value) {
        $result1 = mysql_query("SELECT * FROM Person WHERE PersonID = '$col_value'") or die('Query failed: ' . mysql_error());

                        while ($line = mysql_fetch_array($result1, MYSQL_ASSOC)) {
                            echo "<br>Name: ". $line["FirstName"]. " " . $line["LastName"] . "<br>";
                            echo "<br>Address: ". $line["Address"]. "<br>";
                            echo "<br>Cell Phone: ". $line["CellPhone"]. "<br>";
                            echo "<br>Home Phone: ". $line["HomePhone"]. "<br>";
                            echo "<br>Work Phone: ". $line["WorkPhone"]. "<br>";
                            echo "<br>Email: ". $line["Email"]. "<br>";
                        }

        $result2 = mysql_query("SELECT * FROM Account WHERE Customer_CustomerID = '$col_value'") or die('Query failed: ' . mysql_error());
                        while ($line = mysql_fetch_array($result2, MYSQL_ASSOC)) {
                            echo "<br>Account Number: ". $line["AccountNumber"]. "<br>";
                            echo "<br>Account Type: ". $line["AccountType"]. "<br>";
                            if ($line["AccountNotes"]==NULL)
                                echo "<br>Account Notes: ". "N/A <br>";
                            else
                                echo "<br>Account Notes: ". $line["AccountNotes"]. "<br>";
                        }
    
        $result3 = mysql_query("SELECT * FROM Card WHERE Account_AccountID = '$col_value'") or die('Query failed: ' . mysql_error());
                        while ($line = mysql_fetch_array($result3, MYSQL_ASSOC)) {
                            echo "<br>Card Number: ". $line["CardNumber"]. "<br>";
                            echo "<br>Security Code: ". $line["SecurityCode"]. "<br>";
                            echo "<br>Expire Date: ". $line["ExpireDate"]. "<br>";
                            if ($line["CardDescription"]==NULL)
                                echo "<br>Card Description: ". "N/A <br>";
                            else
                                echo "<br>Card Description: ". $line["CardDescription"]. "<br>";
                        }

        $result4 = mysql_query("SELECT * FROM Loan WHERE Customer_CustomerID = '$col_value'") or die('Query failed: ' . mysql_error());
                        while ($line = mysql_fetch_array($result4, MYSQL_ASSOC)) {
                            echo "<br>Loan Date: ". $line["LoanDate"]. "<br>";
                            echo "<br>Loan Amount: $". $line["LoanAmount"]. "<br>";
                            echo "<br>Loan Period: ". $line["LoanPeriod"]. "<br>";
                            echo "<br>Loan Interest Rate: ". $line["LoanInterestRate"]. "%<br>";
                            if ($line["LoanNotes"]==NULL)
                                echo "<br>Loan Notes: ". "N/A <br>";
                            else
                                echo "<br>Loan Notes: ". $line["LoanNotes"]. "<br>";
                        }

   }
}

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>
</p>


<footer> © 2000 - 2016 JK Bank. All rights reserved.</footer>

</body>
</html>