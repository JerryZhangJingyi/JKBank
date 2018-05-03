<html>
<head>
    <title>Account Information</title>
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

<h2 align="center">Account Information Page</h2>

<p align ="center">
<?php
session_start();
//$id = $_SESSION[ 'id'];
$user = $_SESSION[ 'user' ];
$pass = $_SESSION[ 'pass' ];

$link = mysql_connect('localhost', 'jzhang', '15821804287')
   or die('Could not connect: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('Bank') or die('Could not select database');

// Performing SQL query
$id = mysql_query("SELECT CustomerID FROM Customer WHERE Password = '$pass' AND UserName = '$user'");

// Printing results in HTML
while ($line = mysql_fetch_array($id, MYSQL_ASSOC)) {
   foreach ($line as $col_value) {
       $result = mysql_query("SELECT * FROM Account WHERE Customer_CustomerID = '$col_value'") or die('Query failed: ' . mysql_error());
        if ($result != NULL) {
                        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
                            echo "<br>Account Number: ". $line["AccountNumber"]. "<br>";
                            echo "<br>Account Type: ". $line["AccountType"]. "<br>";
                            if ($line["AccountNotes"]==NULL)
                                echo "<br>Account Notes: ". "N/A <br>";
                            else
                                echo "<br>Account Notes: ". $line["AccountNotes"]. "<br>";
                        }
        } else {
            echo "0 records";
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