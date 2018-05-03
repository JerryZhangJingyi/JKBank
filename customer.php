<?php
session_start();
$user = $_SESSION[ 'user' ];
$pass = $_SESSION[ 'pass' ];
$_SESSION['user']=$user;
$_SESSION['pass']=$pass;
?>
<html>
<head>
        <title>Customer Homepage</title>
<style> 
    header, footer {
        padding: 1em;
        color: white;
        background-color: cornflowerblue;
        clear: left;
        text-align: center;
    }

.flex-container {
    padding : 5px;
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

<h2 align="center">Customer Homepage</h2>

<div class="flex-container">
<a href="http://cerberus.westminstercollege.edu/~jzhang/PersonalInfo.php">Personal Info </a>
<a href="http://cerberus.westminstercollege.edu/~jzhang/AcctInfo.php">Account Info</a>
<a href="http://cerberus.westminstercollege.edu/~jzhang/CardInfo.php">Card Info</a>
<a href="http://cerberus.westminstercollege.edu/~jzhang/LoanInfo.php">Loan Info</a>

</div>
<footer> © 2000 - 2016 JK Bank. All rights reserved.</footer>

</body>
</html>