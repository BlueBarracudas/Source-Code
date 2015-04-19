<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	if(isset($_SESSION["account_id"]))
	{
		$ap = getLoggedInApplicant($_SESSION["account_id"]);

	}

	else
	{
		echo "You are not logged in.";
		header('Refresh: 3; URL=main_login.php');
		exit;	
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Applicant Homepage</title>
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap.theme.min.css">
<link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/button.css">
        <link rel="stylesheet" href="css/jobitmenu.css">
<script src="js/jquery-2.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="css/notification.css">	


</head>
<body>
<?php include 'headers/header-applicant.php'; ?>
<script>
    
        $('#home').addClass("active");</script>';

<div class="container-fluid">

</div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</html>