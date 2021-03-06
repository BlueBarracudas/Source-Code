<!DOCTYPE html>
<html lang="en">
	<style>
		html *{
		font-family: "Century Gothic" !important;
		}
		.navbar-custom{
			background-color: rgb(231,231,231);
			color: black;
		}
		.navbar-custom li a{
			color: black;
		}
		.nav li a:hover {
		    background-color: rgba(100, 100, 100, 0.5) !important; /*Changinh values will make this not work :(*/
			color: white;
		}
        
		.active > a {
            background-color: rgb(108,122,137) !important;
            color: white !important;
        }
        
		.navbar-brand:hover{
			color: white;
		}
		.posfixed{
			position: fixed;
			bottom:1px;
			right: 1px;
		}
		#snoop{
			display: none;
		}
		.navbar-brand{
			font-size: 26px !important;
			color: white;
		}

		#dropdownComponent:hover {
				 background-color: rgb(108,122,137) !important;
		}

		#dropdownComponent:focus{
			    background-color: none;
		}

		@import url("//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-glyphicons.css");
	</style>
<head>
	<title>Menu</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/bootstrap-theme.css">
	  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
	  <link rel="stylesheet" href="css/admin_companyRegistration.css">
	  <script src="js/jquery-2.1.3.js"></script>
	  <script src="js/bootstrap.min.js"></script>


	<script>
	if ( window.addEventListener ) {  
	  	var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];  
	  	window.addEventListener("keydown", function(e) {  
	    if ( e.keyCode == konami[state] ) state++;  
	    else state = 0;  
	    if ( state == 10 ) {
	    	var x = document.getElementById('snoop');
	    	x.style.display = "block";
	    } 
	    }, true);  
	}
	
	$(document).ready(function () {
    $(".nav .navigation").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });
	});
	</script>
</head>
<body>
	<nav class="navbar navbar-fixed-top navbar-custom">
	  	<div class="container">
		    <div class="navbar-header">
		    	<a class="navbar-brand" href="#"><img alt="JobIT" src="images/logo.png" height="26px" width="76px;"></a>
		    </div>
		    <div>
		      <ul class="nav navbar-nav">
		        <li id="home" class="active"><a href="#" class="navigation">Home</a></li>
		        <li id="profile"><a href="#" class="navigation">Profile</a></li>
		        <li id="search"><a href="#" class="navigation">Search</a></li> 
		        <li id="appointments"><a href="#" class="navigation">Appointments</a></li> 
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
			        <li class="dropdown">
	          		<a id="dropdownComponent" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo "". $ap->get_firstname() . " " . $ap->get_lastname() .""; ?> <span class="caret"></span></a>
		          	<ul class="dropdown-menu" role="menu">
		            <li id="settings"><a href="applicant-setup.php">Account Settings</a></li>
		            <li><a href="logout.php">Sign Out</a></li>
	        		</ul>
	          	</ul>
		    </div>
		    
	  	</div>
	</nav>
	<p id="snoop" class="posfixed">
		<img src="snoop.gif">
		<br><br>smoke weed everyday
	</p>
</body>
</html>