<?php

/*** mysql hostname ***/
$hostname = 'localhost';
$username = $_POST[ 'user' ];
$password = $_POST[ 'pass' ];


try {
    $dbh = new PDO("mysql:host=$hostname;dbname=bookstore", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
     /*** The SQL SELECT statement ***/
    $select ='SELECT * FROM authors';
    $sql = $select;
    print '<br />'. 'results of ' . $select . ' are: <br />';
    foreach ($dbh->query($sql) as $row)
        {
        print $row['au_fname'] .' - '. $row['au_lname'] . '<br />';
        }
    

    /*** close the database connection ***/
    $dbh = null;

    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }