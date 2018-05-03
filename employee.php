<?php
session_start();
$user = $_SESSION[ 'user' ];
$pass = $_SESSION[ 'pass' ];
?>
<html>
<head>
      <title>Employee Homepage</title>
<style> 
    header, footer {
        padding: 1em;
        color: white;
        background-color: cornflowerblue;
        clear: left;
        text-align: center;
    }

    article {
        margin-left: 770px;
        padding: 5em;
        overflow: hidden;
        text-align: center;
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
</style>
</head>
<body>
<header>
   <img src="logo.jpg" alt="bank icon" height="169" width="447">
</header>

<h2 align="center">Employee Homepage</h2>


<form action="record.php" method="post">  

        <table border="0" align="center">
            <tr>
                <td>Username <input type="text" name="user1" maxlength="13" size="12"></td>
            </tr>

            <tr>
                <td><input type="submit" value="Lookup Customer Information"></td>
            </tr>
        </table>


</form>
<footer> © 2000 - 2016 JK Bank. All rights reserved.</footer>

</body>
</html>