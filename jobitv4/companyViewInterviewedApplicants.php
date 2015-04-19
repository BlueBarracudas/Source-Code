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
<link rel="stylesheet" href="css/emptymessage.css">    
<link rel="stylesheet" href="css/style.css">
<!-- common css end  -->


<!-- specific css start  -->
<link rel="stylesheet" href="css/search.css">
<!-- specific css end  -->


<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>
<script src="js/companyViewInterviewedApplicants.js"></script>
<!-- important initialization js files end -->


 
</head>
<body>

	<link rel="stylesheet" href="css/jobitmenu.css">
    <?php include 'headers/header-company.php'; ?>
    <script src="js/applicantInterviewedApplicantsActive.js"></script>


<div class="container mainContainer">

 	<div class="row containerRow">
		 		<div class="col-md-offset-2 col-md-8 containerCol">
					<div class="panel panel-default profile-panel">

					
				  		<div class="panel-body">
						  		<div class="row">
						  			<div class="col-md-12">
						  				<h3>Interviewed Applicants</h3>
						  				<hr>
						  			</div>

						  		</div>


						  		<div class="row" id="listContainer">

						  			<div class=" col-md-12">
						  		<div class="panel panel-default" id="result1">
							        <div class="panel-heading">
							            <h3 class="panel-title">Applicant name here</h3>
							        </div>

							        <div class="panel-body">
							            <div class="row">
							            	<div class="col-md-6">
							            		<label class="col-md-4">Location: </label> <label class="col-md-8 output-label">Location here</label>
							            		<label class="col-md-4">Course: </label> <label class="col-md-8 output-label">Course here</label>
							            		<label class="col-md-4">School: </label> <label class="col-md-8 output-label">School here</label>
							            	</div>
							            	<div class="col-md-6 resultButtonCol">
							            		<div class="col-md-6 ">
							            			<input type="button" class="btn btn-default btn-fill " id="reject1" name="reject1" value="Reject" onclick="deleteDiv(this)"/>
							            		</div>
							            		<div class="col-md-6">
							            			<input type="button" class="btn btn-success btn-fill" id="hire1" name="hire1" value="Hire" onclick="deleteDiv(this)"/>
							            		</div>
							            	</div>
							            </div>
							        </div>

								</div> <!--  end of <div class="panel panel-default"> -->


								<div class="panel panel-default" id="result2">
							        <div class="panel-heading">
							            <h3 class="panel-title">Applicant name here</h3>
							        </div>

							        <div class="panel-body">
							            <div class="row">
							            	<div class="col-md-6">
							            		<label class="col-md-4">Location: </label> <label class="col-md-8 output-label">Location here</label>
							            		<label class="col-md-4">Course: </label> <label class="col-md-8 output-label">Course here</label>
							            		<label class="col-md-4">School: </label> <label class="col-md-8 output-label">School here</label>
							            	</div>
							            	<div class="col-md-6 resultButtonCol">
							            		<div class="col-md-6 ">
							            			<input type="button" class="btn btn-default btn-fill " id="reject2" name="reject2" value="Reject" onclick="deleteDiv(this)"/>
							            		</div>
							            		<div class="col-md-6">
							            			<input type="button" class="btn btn-success btn-fill" id="hire2" name="hire2" value="Hire" onclick="deleteDiv(this)"/>
							            		</div>
							            	</div>
							            </div>
							        </div>

								</div> <!--  end of <div class="panel panel-default"> -->


								</div>



			<div class="col-md-12">			
			<hr id="bottomOfResults">
			</div>

	<!-- 		<nav class="center">
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav> -->



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