<?php

	session_start();

	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	header("Cache-Control: no-store, no-cache, must-revalidate"); 
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	include '/MVC/controller.php';

	loadAll();

	$searchresults = "";
	$by_search = "";


	if($_SERVER["REQUEST_METHOD"] == "POST") {


		 if(!empty($_POST["keyInput"]) && $_GET['id'] == 1)
		 {
		 	$searchresults = searchJobListingByKeyWord($_POST["keyInput"]);
		 }

		 else if($_GET['id'] == 2)
		 {
		 	$searchresults = filteredSearchJobListing($_POST);
		 } 
		
	}

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
<link rel="stylesheet" href="css/jobitmenu.css">
<!-- common css end  -->


<!-- specific css start -->
<link rel="stylesheet" href="css/applicantSearch.css">
<link rel="stylesheet" href="css/search.css">
<!-- specific css end-->

<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->


 
</head>
<body>

	<?php include 'headers/header-applicant.php'; ?>
	<script src="js/applicantSearchActive.js"></script>';



<div class="container mainContainer">
	<div class="row containerRow">
		<div class="col-md-3">

			<div class="panel panel-default">
			    
			        <div class="panel-body">
			            
						<div class="row center">
							<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=1" method="POST">
									<div class="form-group">
										<label class="col-md-12">Search by Keyword/s:</label>
										<div class="col-md-12">
											<input type="text" class="form-control searchInput" name ="keyInput" placeholder="Search" id="searchInput"/>
										</div>
										<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
										<div class="col-md-12">
											<input type="submit" class="btn btn-success searchButtonInput" id="searchButtonInput" value="Search"/>
										</div>

										<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
							
										<div class="col-md-12">
											<a href="#filteredSearchDiv" data-toggle="collapse" aria-expanded="false" aria-controls="filteredSearchDiv">Filtered Search</a>
										</div>


									</div>
							</form>

							<div class="filteredSearchDiv collapse" id="filteredSearchDiv">
				
								<div class="form-group">
									<div class="col-md-12">
										<hr>
									</div>
								</div>

								<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=2" method="post">
									<div class="form-group">
										<label class="col-md-12">Company Name</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="companyInput" name="companyInput" class="companyInput"/>
										</div>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->


									<div class="form-group">
										<label class="col-md-12">Job Position</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="jobPositionInput" name="jobPositionInput" class="jobPositionInput"/>
										</div>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

									<div class="form-group">
										<label class="col-md-12">College Course</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="collegeCourseInput" name="collegeCourseInput" class="collegeCourseInput"/>
										</div>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->


									<div class="form-group">
										<label class="col-md-12">Skills Required</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="skillsInput" name="skillsInput" class="skillsInput"/>
										</div>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

									<div class="form-group">
										<label class="col-md-12">Location</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="locationInput" name="locationInput" class="locationInput"/>
										</div>
									</div>

									
									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
									<div class="form-group">
										<label class="col-md-12">Work Experience</label>
									
									<div class="form-group">
											<label class="col-md-12">Job Title</label>
											<div class="col-md-12">
											<input type="text" class="form-control" id="collegeCourseInput" name="jobTitleInput" class="collegeCourseInput"/>
											</div>
										</div>

										<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
										
									<div class="form-group">
											<label class="col-md-12">Years of Experience</label>
											<div class="col-md-12">
											<input type="number" class="form-control" id="collegeCourseInput" name="yearsInput" class="collegeCourseInput"/>
											</div>
										</div>

										
									</div>


									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
									<div class="col-md-12">
											<input type="submit" class="btn btn-success filteredSearchButtonInput" id="filteredSearchButtonInput" value="Search"/>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
									<div class="col-md-12">
										<a href="#filteredSearchDiv" data-toggle="collapse" aria-expanded="false" aria-controls="filteredSearchDiv">Hide</a>
									</div>
									
						
									
								</form>
					
							</div>






						</div>

			        </div>

			</div> <!--  end of <div class="panel panel-default"> -->

			

		</div>
			<!-- this line subject to change -->

		<div class="col-md-8">

			<?php if($searchresults != ""){

				if($_GET['id']==1)
					populateJobListings($searchresults, $_POST["keyInput"]);
				if($_GET['id']==2)
					populateJobListings($searchresults, "filtered search");
			} 

					 
			?>

		</div> <!--  end of <div class="panel panel-default"> -->

			<hr id="bottomOfResults">

			<br>
			<?php 
				if(count($searchresults) <= 0)
				echo "<b><p align=\"center\" class =\"emptyMessage\"> No results. </p></b>"; ?>
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

</div>


    
    
    

</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
<!-- js end -->

</html>