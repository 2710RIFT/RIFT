<?php  //This file is used for searching information about home customers.
require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db($db_databse) or die("Unable to select database: " . mysql_error());

if (isset($_POST['cusName']))
  	$proName = fix_string($_POST['cusName']);

$cusQuery = "SELECT fname, lname, type, email FROM homeCus, customer WHERE ID = cusName";
$result = mysql_query($proQuery);
if(!$result) die ("Database access failed: " . mysql_error());

echo "<html><head><title>Search for Customer</title></head></html>";
if($result == null){
	echo "<html><body>Sorry, Customer cannot be found</body</html>";
else{
	echo "<table><tr><th>ID</th><th>First_Name</th><th>Last_Name</th><th>Type</th><th>Email</th>"
	for ($j = 0; $j < $row; ++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";

  	for ($k = 0; $k < 4; ++$k){
  		echo "<td>$row[$k]</td>";

  	echo "</tr>"
  	}

  	echo "</table>";
}
}
?>