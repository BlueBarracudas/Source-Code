<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	if(isset($_SESSION["account_id"]))
	{
		$ap = getLoggedInApplicant($_SESSION["account_id"]);
		$company = getCompanyById($_SESSION["account_id"]);


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
<title></title>
<link rel="shortcut icon" href="">

<!-- bootstrap css start  -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- bootstrap css end  -->



<!-- common css start  -->
<link rel="stylesheet" href="css/button.css">
<link rel="stylesheet" href="css/panels.css">
<link rel="stylesheet" href="css/errormessage.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/jobitmenu.css">
<!-- common css end  -->

<!-- specific for this page css start  -->
<link rel="stylesheet" href="css/companyViewProfile.css">
<!-- specific for this page css start  -->


<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->


 
</head>
<body>


	<?php include 'headers/header-company.php'; ?>
	<script src="js/companyProfileActive.js"></script>


<div class="container mainContainer">

 	<div class="row containerRow">
		 		<div class="col-md-offset-2 col-md-8 containerCol">
					<div class="panel panel-default profile-panel">
					
				  		<div class="panel-body">
						  		<div class="row">
						  			<div class="col-md-3">
						  				<img class="profileImg" src="#">
						  			</div>

						  			<div class="col-md-8">
						  				<br>
						  				<label class="output-label" id="nameOutput" name="nameOutput"><b> Company Name: </b><?php echo $company->get_name(); ?></label> <br>
						  				<label class="output-label" id="birthdateOutput" name="birthdateOutput"><b> Contact Number: </b><?php echo $company->get_contactno(); ?></label> <br>
						  				<label class="output-label" id="genderOutput" name="genderOutput"> <b> Address: </b><?php echo $company->get_address(); ?></label> <br>
						  			</div>

						  		</div>

						  		<br><br>


						  		<div class="row">
						  			<div class="col-md-12">
							  			<label class="output-label" id="nameOutput" name="nameOutput"><b> Company Description: </b><?php echo $company->get_description(); ?></label> <br>
						  			</div>
						  		</div>

					


						  	</div>





						   
					  	</div>

					</div> <!--  end of <div class="panel panel-default"> -->
				</div>
	 </div>
</div>  <!-- end of <div class="container mainContainer"> -->


</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
<!-- js end -->

</html>