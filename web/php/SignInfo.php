<?php
  $fname = $lname = $password = $gender = $marital = $email = $bday = $city = $zip = $state = $street = $type = $category = $gross =$name = " ";
  if (isset($_POST['Name']))
  	$name = fix_string($_POST['Name']);
  if (isset($_POST['Password']))
  	$password = fix_string($_POST['Password']);
  if (isset($_POST['Email']))
  	$email = fix_string($_POST['Email']);
  if (isset($_POST)['gender'])
    $gender = fix_string($_POST['gender']);
  if (isset($_POST['marital']))
    $marital = fix_string($_POST)['marital'];
  if (isset($_POST['bday']))
    $bday = fix_string($_POST['bday']);
  if (isset($_POST['city']))
    $city = fix_string($_POST['city']);
  if (isset($_POST['zip']))
    $zip = fix_string($_POST['zip']);
  if (isset($_POST['state']))
    $state = fix_string($_POST['state']);
  if (isset($_POST['street']))
    $street = fix_string($_POST['street']);
  if (isset($_POST['type']))
    $type = fix_string($_POST['type']);
  if (isset($_POST['category']))
    $category = fix_string($_POST['category']);
  if (isset($_POST['gross']))
    $gross = fix_string($_POST['gross']);
  if (isset($_POST['name']))
    $name = fix_string($_POST['name']);

  $fail = validate_name($name);
  $fail .= validate_password($password);
  $fail .= validate_email($email);
  $fail .= validate_gender($gender);
  $fail .= validate_marital($marital);
  $fail .= validate_marital($bday);
  $fail .= validate_city($city);
  $fail .= validate_zip($zip);
  $fail .= validate_state($state);
  $fail .= validate_street($street);
  $fail .= validate_type($type);
  $fail .= validate_category($category);
  $fail .= validate_gross($gross);
  $fail .= validate_name($name);
  
  //validate information
  if($fail == ""){
  echo "<html><head><title>Successful Registration</title></head></html>";
  echo "<html><body>You've registered for our system successfully! Now you can enjoy shoppin here!</body></html>";

  //Enter the posted fields into a database
  require_once 'login.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!db_server) die("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database) or die("Unable to select database: " . mysql_error() );

  if($type == Company){
   $insertQuery = "INSERT INTO UserInfoCom(name, password, email, street, city, state, zip, gross_income, category) VALUES ($name, $password, $email, $street, $city, $state, $zip, $gross, $category)";
   $result = mysql_query($insertQuery);
   if(!result) die ("Database access failed:" . mysql_error());
  }
  else{
    $insertQuery ="INSERT INTO UserInfoHome(fname, lname, password, email, street, city, state, zip, gender, bday, marital) VALUES ($fname, $lname, $email, $street, $city, $state, $zip, $gender, $bday, $marital)";

  }

  ?>
}
