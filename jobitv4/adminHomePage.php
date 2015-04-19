<?php 
  session_start();

  include '/MVC/controller.php';

  loadAll();  

  $super = false;

  if(isset($_SESSION["account_id"]))
  {
      $ap = getLoggedInAccount($_SESSION["account_id"]);
      $admin_name = $ap->get_email();
  } else {
    echo "You are not logged in.";
    header('Refresh: 3; URL=admin-login.php');
    exit;
  }  

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Homepage</title>
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
  



</head>
<body>

	<?php include 'headers/header-admin.php'; ?>


<div class="container-fluid">

</div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</html>