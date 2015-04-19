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

  include 'logic/logic_adminregistration.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register Admin</title>
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
 
<!-- 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

</head>

<body>

<?php include'headers/header-superadmin.php'; ?>
<script src="js/superAdminRegisterAdminActive.js"></script>

<div id="mainContainer" class="container-fluid">

    <div class="container" id="">

        <div class="row" id="row1">
         
              <div class="col-md-offset-3 col-md-6">

                    <div class="panel panel-default" id="adminRegistrationPanel">
                               <div class="panel-heading" id="adminRegistrationPanelTitle">
                                  <h3 class="panel-title" id="adminRegistrationPanelHeader">Admin Registration</h3>
                               </div>

                               <div class="panel-body"> <label class="error_message col-md-6" id="header_errorMessage" name="header_errorMessage"><?php echo $reply; ?></label>
                                  <form class=" col-md-12 form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


                                      

                                            <div class="form-group">
                                              <label for="adminEmailInput" class="col-md-4 control-label">Email:<span style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                <input type="email" name = "email" class="form-control" id="adminEmailInput" placeholder="email@domain.com">
                                                  <div class="error_container" id="adminEmail_errorMessageContainer"><label class="error_message" id="adminEmail_errorMessageContainer" name="adminEmail_errorMessageContainer"><?php echo $emailErr; ?></label></div>
                                                  
                                                  
                                                  
                                                  
                                              </div>
                                        </div>
            
                                        <div class="form-group">
                                                  <label for="adminPasswordInput" class="col-md-4 control-label">Password:<span style="color:red">*</span></label>
                                                  <div class="col-md-8">
                                                    <input type="password" name = "password" class="form-control" id="adminPasswordInput" placeholder="(8-16 characters)">
                                                      
                                                      
                                                      
                                                      <div class="error_container" id="adminPassword_errorMessageContainer"><label class="error_message" id="adminPassword_errorMessage" name="adminPassword_errorMessage"><?php echo $pwErr; ?></label></div>
                                                      
                                                      
                                                  </div>
                                        </div>

                                        <div class="form-group">
                                                  <label for="adminConfirmPasswordInput" class="col-md-4 control-label">Confirm Password:<span style="color:red">*</span></label>
                                                  <div class="col-md-8">
                                                    <input type="password" name ="confirmPassword" class="form-control" id="adminConfirm" placeholder="">
                                                      
                                                      
                                                      
                                                      <div class="error_container" id="newAdminPassword_errorMessageContainer"><label class="error_message" id="newAdminPassword_errorMessage" name="newAdminPassword_errorMessage"><?php echo $cpErr; ?></label></div>
                                                      
                                                  </div>
                                        </div>



                                        <div class="form-group">
                                                <div class="col-md-12 button-row" id="buttonGroup">
                                                  <a href="superAdminHomePage.php"><button type="button" class="btn btn-default">Cancel</button></a>
                                                  <input type="submit" class="btn btn-success"></input>
                                                </div>
                                        </div>

                                   

                        </form>
                               </div>    <!-- <div class="panel-body"> end -->

                      </div>
                </div>

            

          </div>
                     
                    

              
    </div>     

  </div>



</body>

</html>

