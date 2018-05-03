<?php
$user = $_POST[ 'user' ];
$pass = $_POST[ 'pass' ];
$database = $_POST[ 'database' ];
$query = $_POST[ 'query' ];
// Connecting, selecting database (localhost is default
$link = mysql_connect('localhost', $user, $pass)
   or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db($database) or die('Could not select database');

// Performing SQL query

$result = mysql_query($query) or die('Query failed: ' . mysql_error());

// Printing results in HTML
echo "<table>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
   echo "\t<tr>\n";
   foreach ($line as $col_value) {
       echo "\t\t<td>$col_value</td>\n";
   }
   echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);
?>
