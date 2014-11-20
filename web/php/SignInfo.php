<?php
  $name = $password = $gender = $martial = $email = " ";
  if (isset($_POST['Name']))
  	$name = fix_string($_POST['Name']);
  if (isset($_POST['Password']))
  	$password = fix_string($_POST['Password']);
  if (isset($_POST['Email']))
  	$email = fix_string($_POST['Email']);

  $fail = validate_name($name);
  $fail .= validate_password($password);
  $fail .= validate_email($email);
  
  //validate information
  if($fail == ""){
  echo "<html><head><title>Successful Registration</title></head></html>";
  echo "<html><body>You've registered for our system successfully! Now you can enjoy shoppin here!</body></html>";

  //Enter the posted fields into a database
  require_once 'login.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!db_server) die("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database) or die("Unable to select database: " . mysql_error() );

  $insertQuery = "INSERT INTO UserInfo(name, password, email) VALUES ($name, $password, $email)";
  $result = mysql_query($insertQuery);
  if(!result) die ("Database access failed:" . mysql_error());

  ?>
}
