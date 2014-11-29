<html>
<head><title>Search for Business Customers</title></head>
<?php 
require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());

  $result = mysql_query("SELECT * FROM business");
  if(!$result) die ("Database access failed: " . mysql_error());
  $rows = mysql_num_rows($result);
  echo "<table><tr><th>Email</th><th>Name</th><th>Gross</th><th>Category</th>";
  for($j=0;$j<$rows;++$j){
  	$row = mysql_fetch_row($result);
  	echo "<tr>";
  	echo"<td>$row[0]</td>";
  	echo"<td>$row[1]</td>";
  	echo"<td>$row[2]</td>";
  	echo"<td>$row[3]</td>";
  	// echo"<td>$row[4]</td>";
  	// echo"<td>$row[5]</td>";
  	// echo"<td>$row[6]</td>";
  	// echo"<td>$row[7]</td>";
  	echo"</tr>";
  }
  echo "</table>";
 

  
?> 
</html>