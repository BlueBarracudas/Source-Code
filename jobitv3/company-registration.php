<?php 
	
	session_start();

	include 'MVC/controller.php';
	loadAll();

  if(isset($_SESSION["account_id"]))
  {
      $ac = getLoggedInAccount($_SESSION["account_id"]);
      $admin_name = $ac->get_email();
  } else {
    echo "You are not logged in.";
    header('Refresh: 3; URL=admin-login.php');
    exit;
  }

  include 'logic/logic_companyregistration.php'; 

?> 

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

		.reply {
        color: black;
        font: bold;
       
    }

		@import url("//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-glyphicons.css");
	</style>
<head>
	<title>JobIT | Company Registration </title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  
	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/bootstrap-theme.css">
	  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
	  <link rel="stylesheet" href="css/admin_companyRegistration.css">
        <link rel="stylesheet" href="css/errormessage.css">
        <link rel="stylesheet" href="css/button.css">
    
	  <script src="js/jquery-2.1.3.js"></script>
	  <script src="js/adminRegistrationCompany.js"></script>
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
    <div class ="mainContainer">
    	
        <?php include 'headers/header-admin.php'; ?>
        
        <div class = "row">
        
            
              <div class ="container" id="companyRegisterContainer">

        <div class="row" id="row1">
              <div class="col-md-offset-3 col-md-6">
                    <div class="panel panel-default" id="companyReginstrationPanel">
                               <div class="panel-heading" id="companyReginstrationPanelTitle">
                                  <h3 class="panel-title" id="companyReginstrationPanelHeader">Company Registration <p class="reply"> <?php echo $reply ?> <p> </h3>
                               </div>

                               <div class="panel-body">
                                  <form class=" col-md-12 form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                                      

                                            <div class="form-group">
                                              <label for="companyEmailInput" class="col-md-4 control-label">Email:<span style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                <input type="email" class="form-control" id="companyEmailInput" placeholder="email@domain.com" name="email">
                                                  <div class="error_container" id="companyEmail_errorMessageContainer"><label class="error_message" id="companyEmail_errorMessage" name="companyEmail_errorMessage"><?php echo $emailErr; ?></label></div>
                                                  
                                                  
                                                  
                                                  
                                              </div>
                                        </div>
            
                                        <div class="form-group">
                                                  <label for="companyPasswordInput" class="col-md-4 control-label">Password:<span style="color:red">*</span></label>
                                                  <div class="col-md-8">
                                                    <input type="password" class="form-control" id="companyPasswordInput" placeholder="Password (6-15 characters long)" name="password">
                                                      
                                                      
                                                      
                                                      <div class="error_container" id="companyPassword_errorMessageContainer"><label class="error_message" id="companyPassword_errorMessage" name="companyPassword_errorMessage"><?php echo $pwErr; ?>	</label></div>
                                                      
                                                      
                                                  </div>
                                        </div>

                                        <div class="form-group">
                                                  <label for="companyConfirmPasswordInput" class="col-md-4 control-label">Confirm Password:<span style="color:red">*</span></label>
                                                  <div class="col-md-8">
                                                    <input type="password" class="form-control" id="companyConfirm" placeholder="" name="confirmPassword">
                                                      
                                                      
                                                      
                                                      <div class="error_container" id="newCompanyPassword_errorMessageContainer"><label class="error_message" id="newCompanyPassword_errorMessage" name="newCompanyPassword_errorMessage"><?php echo $cpErr; ?></label></div>
                                                      
                                                  </div>
                                        </div>



                                        <div class="form-group">
                                                <div class="col-md-offset-4 col-md-8" >
                                                  <button type="button" class="btn btn-default">Cancel</button>
                                                    
                                                  <input type="submit" id="submitBtn" class="btn btn-success" value="Create account"></input>
                                                </div>
                                              </div>

                                   

                        </form>
                               </div>    <!-- <div class="panel-body"> end -->

                      </div>
                </div>

            

          </div>
                     
                    

              
    </div>     

        
        
        
        </div>
        
	<p id="snoop" class="posfixed">
		<img src="snoop.gif">
		<br><br>
	</p>
    </div>
</body>
</html>