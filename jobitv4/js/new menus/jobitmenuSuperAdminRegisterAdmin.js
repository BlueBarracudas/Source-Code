var    navBar = '<nav class="navbar navbar-fixed-top navbar-custom">'+
	  	'<div class="container">'+
		 '   <div class="navbar-header">'+
		  '  	<a class="navbar-brand" href="#"><img alt="JobIT" src="images/logo.png" height="26px" width="76px;"></a>'+
		   ' </div>'+
		    '<div>'+
		     ' <ul class="nav nav-tabs navbar-nav">'+
		     	'<li id="home" ><a href="superAdminHomePage.html" class="navigation">Home</a></li>'+
				'<li id="RegisterCompany"><a href="adminRegisterCompany.html">Register Company</a></li>'+
    			'<li id="RegisterAdmin"  class="active"><a href="superAdminRegisterAdmin.html">Register Admin</a></li>'+
    			'<li id="ListOfAdmins"><a href="superAdminViewListOfAdmins.html">JobIT Admins</a></li>'+
            '</ul>'+
		      '<ul class="nav navbar-nav navbar-right">'+
		      	'<li class="dropdown">'+
	          	'	<a id="dropdownComponent" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-bell"></span> <span class="badge">10</span> </a>'+
		         ' 	<ul class="dropdown-menu" id="notifications" role="menu">'+
			      '      <div class="list-group scrollable-menu">'+
					'	  <a href="#" class="list-group-item">Microsoft Inc. has messaged you. <div class="timestamp" align="right">12:47pm</div></a>'+
					'	  <a href="#" class="list-group-item">Snoop Dogg says: "Smoke weed everyday" <div class="timestamp" align="right">4:20am</div></a>'+
					'	  <a href="#" class="list-group-item">Porta ac consectetur ac <div class="timestamp" align="right">12:47pm</div></a>'+
					'	  <a href="#" class="list-group-item">Vestibulum at eros <div class="timestamp" align="right">12:47pm</div></a>'+
					'	  <a href="#" class="list-group-item">Microsoft Inc. has messaged you. <div class="timestamp" align="right">12:47pm</div></a>'+
					'	  <a href="#" class="list-group-item">Snoop Dogg says: "Smoke weed everyday" <div class="timestamp" align="right">4:20am</div></a>'+
					'	  <a href="#" class="list-group-item">Porta ac consectetur ac <div class="timestamp" align="right">12:47pm</div></a>'+
					'	  <a href="#" class="list-group-item">Vestibulum at eros <div class="timestamp" align="right">12:47pm</div></a>'+
					'	</div>'+
				'<button id="notifSettings" class="btn btn-default btn-fill"  data-toggle="modal" data-target="#notifModal"><center>Notification Settings</center></button>' +
	        		'</ul>'+
			        '<li class="dropdown">'+
	          		'<a id="dropdownComponent" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'+
    '                Super Admin Name <span class="caret"></span></a>'+
		          	'<ul class="dropdown-menu" role="menu">'+
		            '<li id="settings"><a href="companyEditProfile.html">Edit Account Info</a></li>'+
		             '<li><a href="userChangePassword.html">Change Password</a></li>'+
                    '<li><a href="#">Sign Out</a></li>'+
	        		'</ul>'+
	          	'</ul>'+
		    '</div>'+
		    
	  '	</div>'+
	'</nav>' +
	 '<link rel="stylesheet" href="css/userNotificationSettings.css">' +
	'<script src="js/userNotificationSettings.js"></script>';
	// <div class="tab-content">
	// 	<div class= "content tab-pane" id="companyregister">
	// 		<object type="text/html" data="adminRegisterCompany.html" ></object>
	// 	</div>
	// 	<div class= "content tab-pane" id="adminregister">
	// 		<object type="text/html" data="adminRegistration.html" ></object>
	// 	</div>
	// </div>';
			          
		       

document.write(navBar);

