<nav class="navbar navbar-fixed-top navbar-custom">
	  	<div class="container">
		    <div class="navbar-header">
		    	<a class="navbar-brand" href="#"><img alt="JobIT" src="images/logo.png" height="26px" width="76px;"></a>
		    </div>
		    <div>
		      <ul class="nav navbar-nav">
		        <li id="home" class="active"><a href="#" class="navigation">Home</a></li>
		        <li id="profile"><a href="applicant-setup.php" class="navigation">Profile</a></li>
		        <li id="search"><a href="#" class="navigation">Search Job Listings</a></li> 
		        <li id="appointments"><a href="#" class="navigation">Appointments</a></li> 
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
			        <li class="dropdown">
	          		<a id="dropdownComponent" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo "". $ap->get_firstname() . " " . $ap->get_lastname() .""; ?><span class="caret"></span></a>
		          	<ul class="dropdown-menu" role="menu">
		            <li id="settings"><a href="#">Account Settings</a></li>
		            <li><a href="logout.php">Sign Out</a></li>
	        		</ul>
	          	</ul>
		    </div>
		    
	  	</div>
	</nav>