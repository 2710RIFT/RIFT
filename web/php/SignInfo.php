<?php //This file is used for signing up. 
  $fname = $lname = $password = $gender = $marital = $email = $bday = $city = $zip = $state = $street = $type = $category = $gross =$name = " ";
  if (isset($_POST['fame'])) //customer first name
  	$fname = fix_string($_POST['Fname']); 
  if (isset($_POST['lname'])) //customer last name
    $lname = fix_string($_POST['Lname']);
  if (isset($_POST['Password'])) //customer password
  	$password = fix_string($_POST['Password']);
  if (isset($_POST['Email'])) //customer email
  	$email = fix_string($_POST['Email']);
  if (isset($_POST)['gender']) //gender for home customer
    $gender = fix_string($_POST['gender']);
  if (isset($_POST['marital']))  //marital status for home customer
    $marital = fix_string($_POST)['marital'];
  if (isset($_POST['bday']))  //birthday fro home customer
    $bday = fix_string($_POST['bday']);
  if (isset($_POST['city'])) 
    $city = fix_string($_POST['city']);
  if (isset($_POST['zip']))
    $zip = fix_string($_POST['zip']);
  if (isset($_POST['state']))
    $state = fix_string($_POST['state']);
  if (isset($_POST['street']))
    $street = fix_string($_POST['street']);
  if (isset($_POST['type'])) //type or the customer, home or business
    $type = fix_string($_POST['type']);
  if (isset($_POST['category'])) //category of the business customer
    $category = fix_string($_POST['category']);
  if (isset($_POST['gross'])) //gross of the business customer
    $gross = fix_string($_POST['gross']);
  if (isset($_POST['name'])) //name of business customer
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
  echo "<html><body>You've registered for our system successfully! Now you can enjoy shopping here!</body></html>";

  //Enter the posted fields into a database
  require_once 'login.php';
  $db_server = mysql_connect($db_hostname, $db_username, $db_password);

  if (!db_server) die("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database) or die ("Unable to select database: " . mysql_error() );

  if($type == "Company"){
   $insertQuery1 = "INSERT INTO Customer(email, street, city, state, zip, type) VALUES ($email, $street, $city, $state, $zip, $type)";
   $result1 = mysql_query($insertQuery1);
   $insertQuery2 = "INSERT INTO Business(email, name, gross, category) VALUES ($email, $name, $gross, $category)";
   $result2 = mysql_query($insertQuery2);
   if(!result1 or !result2) die ("Database access failed:" . mysql_error());
  }
  else{
    $insertQuery3 = "INSERT INTO Customer(email, street, city, state, zip, type) VALUES ($email, $street, $city, $state, $zip, $type)";
    $result3 = mysql_query($insertQuery3);
    $insertQuery4 ="INSERT INTO Home(fname, lname, password, email, street, city, state, zip, gender, bday, marital) VALUES ($fname, $lname, $email, $street, $city, $state, $zip, $gender, $bday, $marital)";
    $result4 = mysql_query($insertQuery4);
    if(!result3 or !result4) die ("Database access failed:" . mysql_error());
  }

}
  else{
    echo "<html><body>Please fill in the required areas.</body></html>"
  }

?>