<?php
  $first_name = $last_name = $password = $gender = $martial = $email = " ";
  if (isset($_POST['First_Name']))
  	$first_name = fix_string($_POST['First_Name']);
  if (isset($_POST['Last_Name']))
  	$last_name = fix_string($_POST['Last_Name']);
  if (isset($_POST['Password']))
  	$password = fix_string($_POST['Password']);
  if