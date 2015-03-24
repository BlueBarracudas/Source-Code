<?php

session_start();

loadAll();

if(isset($_SESSION["account_id"]))
  {
  	
  	$ap = getLoggedInApplicant($_SESSION["account_id"]);
    include 'applicant-setup.php';

  }

  else
  {
    echo "You are not logged in.";
    header('Refresh: 3; URL=main_login.php'); 
  }

?>

