<?php 
	
	session_start();

	include 'MVC/controller.php';
	loadAll();

  $super = $_SESSION["super"];

  if(isset($_SESSION["account_id"]))
  {
      $ap = getLoggedInAccount($_SESSION["account_id"]);
      $admin_name = $ap->get_email();
  } else {
    echo "You are not logged in.";
    header('Refresh: 3; URL=admin-login.php');
    exit;
  }

  include 'logic/logic_companyregistration.php'; 

?> 

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">

  <link rel="stylesheet" href="css/notification.css">
  <link rel="stylesheet" href="css/adminRegistration.css">
  <link rel="stylesheet" href="css/panels.css">
  <link rel="stylesheet" href="css/errormessage.css">
  <link rel="stylesheet" href="css/button.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="css/jobitmenu.css">

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>

<!-- important initialization js files end -->

<script>
        $('#home').removeClass("active");
        $('#RegisterCompany').addClass("active");</script>;


 
</head>
<body>
    <div class ="mainContainer">
    	
        <?php if($super == true)
        		include 'headers/header-superadmin.php'; 
        	  else
        	  	include 'headers/header-admin.php'; ?>
        	  <script src="js/superAdminRegisterCompanyActive.js"></script>
        
        <div class = "row">
        
            
              <div class ="container" id="companyRegisterContainer">

        <div class="row" id="row1">
              <div class="col-md-offset-3 col-md-6">
                    <div class="panel panel-default" id="companyReginstrationPanel">
                               <div class="panel-heading" id="companyReginstrationPanelTitle">
                                  <h3 class="panel-title" id="companyReginstrationPanelHeader">Company Registration </h3>
                               </div>

                                <div class="row">
            <label class="error_message col-md-6" id="header_errorMessage" name="header_errorMessage"><?php echo $reply?></label>
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
    </div>
</body>
</html>