<?php

  session_start();

  include '/MVC/controller.php';

  loadAll();

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

    $cErr = $pReply = $pErr = $cpErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      
      if(!empty($_POST["currPassword"]))
      {
        $currPw = test_input($_POST['currPassword']);
        if(strcmp($ap->get_password(), $currPw) != 0)
          $cErr = "Wrong current password";

        if(strcmp($ap->get_password(), $currPw) == 0 && !empty($_POST["password"]) && !empty($_POST["confirmPassword"]))
        {
          $password = test_input($_POST["password"]);
          $confirmPassword = test_input($_POST["confirmPassword"]);

          if(strlen($password) >= 8 && strlen($password) <= 16 && strcmp($password, $confirmPassword) == 0)
          {
            changePassword($ap->get_accid(), $password);
            $pReply = "Successfuly changed password!";
          } else $pErr = "Password does not match, short or too long";
        }
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">




  <link rel="stylesheet" href="css/errormessage.css">
  <link rel="stylesheet" href="css/button.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/panels.css">

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
 




<!-- 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

</head>

<body>


<div id="mainContainer" class="container-fluid">

 
    <div class="container" id="">

        <div class="row" id="row1">
              <div class="col-md-offset-3 col-md-6">
                    <div class="panel panel-default" id="changePasswordPanel">
                               <div class="panel-heading" id="changePasswordPanelTitle">
                                  <h3 class="panel-title" id="changePasswordPanelHeader">Change Password</h3>
                               </div>
                               
                               <div class="panel-body">
                                
                                  <form class=" col-md-12 form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                                        <label class="error_message" id="currentPassword_errorMessage" name="current_errorMessage"><?php echo $pReply; ?></label>

                                            <div class="form-group">
                                              <label for="currentPasswordInput" class="col-md-4 control-label">Current Password:<span style="color:red">*</span></label>
                                              <div class="col-md-8">
                                                <input type="password" name="currPassword" class="form-control" id="currentPasswordInput">
                                                  <div class="error_container" id="currentPassword_errorMessageContainer"><label class="error_message" id="currentPassword_errorMessage" name="current_errorMessage"><?php echo $cErr; ?></label></div>
                                                  
                                                  
                                                  
                                                  
                                              </div>
                                        </div>
            
                                        <div class="form-group">
                                                  <label for="newPasswordInput" class="col-md-4 control-label">New Password:<span style="color:red">*</span></label>
                                                  <div class="col-md-8">
                                                    <input type="password" name="password" class="form-control" id="newPasswordInput" placeholder="(8-16 characters)">
                                                      
                                                      
                                                      
                                                      <div class="error_container" id="newPassword_errorMessageContainer"><label class="error_message" id="newPassword_errorMessage" name="newPassword_errorMessage"><?php echo $pErr; ?></label></div>
                                                      
                                                      
                                                  </div>
                                        </div>

                                        <div class="form-group">
                                                  <label for="confirmNewPasswordInput" class="col-md-4 control-label">Confirm New Password:<span style="color:red">*</span></label>
                                                  <div class="col-md-8">
                                                    <input type="password" name="confirmPassword" class="form-control" id="adminConfirm" placeholder="">
                                                      
                                                      
                                                      
                                                      <div class="error_container" id="confirmNewPassword_errorMessageContainer"><label class="error_message" id="confirmNewPassword_errorMessage" name="confirmNewPassword_errorMessage"><?php echo $cpErr; ?></label></div>
                                                      
                                                  </div>
                                        </div>



                                        <div class="form-group">
                                                <div class="col-md-12 button-row" id="buttonGroup">
                                                  <?php 
                                                      if($ap->get_acctype() == 0)
                                                      {
                                                         echo "<a href=\"applicantHomePage.php\"><button type=\"button\" class=\"btn btn-default\">Cancel</button></a>";
                                                      } else if ($ap->get_acctype() == 2)
                                                      {
                                                          echo "<a href=\"company-home.php\"><button type=\"button\" class=\"btn btn-default\">Cancel</button></a>";
                                                      }
                                                        else if($ap->get_acctype() == 1)
                                                      {
                                                        if(isSuperAdmin($ap->get_accid()))
                                                          echo "<a href=\"superAdminHomePage.php\"><button type=\"button\" class=\"btn btn-default\">Cancel</button></a>";
                                                        else
                                                          echo "<a href=\"adminHomePage.php\"><button type=\"button\" class=\"btn btn-default\">Cancel</button></a>";
                                                      }
                                                  ?>
                                                  <input type="submit" class="btn btn-success" value="Change password"></input>
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

