<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	$super = $_SESSION["super"];

	if(isset($_SESSION["account_id"]))
	{
		$ap = getLoggedInAccount($_SESSION["account_id"]);

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


<!-- specific css start  -->
<link rel="stylesheet" href="css/search.css">
<!-- specific css end  -->


<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->

<script>

	function activateDeactivate(aid, indicator){
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function(){
	            	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
	            		if(indicator == 0){
	            			alert("Activated!");
	            			document.getElementById(aid+"_status").innerHTML = "Active"
	            			document.getElementById(aid+"_button").value = "Deactivate"
	            			document.getElementById(aid+"_button").onclick = function(){ activateDeactivate(aid, 1); };
	            		}
	            		else if(indicator == 1)
	            		{
	            			alert("Deactivated!");
	            			document.getElementById(aid+"_status").innerHTML = "Deactivated"
	            			document.getElementById(aid+"_button").value = "Activate"
	            			document.getElementById(aid+"_button").onclick = function(){ activateDeactivate(aid, 0); };
	            		}
	           		}
       			}

        		xmlhttp.open("GET", "activate.php?aid="+aid+"&q="+indicator, true);
        		xmlhttp.send();
        	}

</script>


 
</head>
<body>


<?php include'headers/header-superadmin.php'; ?>
<script src="js/superAdminListOfAdminsActive.js"></script>

<div class="container mainContainer">

 	<div class="row containerRow">
		 		<div class="col-md-offset-2 col-md-8 containerCol">
					<div class="panel panel-default profile-panel">

					
				  		<div class="panel-body">
						  		<div class="row">
						  			<div class="col-md-12">
						  				<h3>JobIT Admins</h3>
						  				<hr>
						  			</div>

						  		</div>


						  		<div class="row" id="listContainer">

						  			<?php populateAdmins(); ?>

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
<script src="js/superAdminViewListOfAdmins.js"></script>    
<!-- js end -->

</html>