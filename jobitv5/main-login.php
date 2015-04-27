<?php

  session_start();
  include 'MVC/controller.php';

    loadAll();

    if(isset($_SESSION["account_id"]))
    {
      $account = getLoggedInAccount($_SESSION["account_id"]);
            
            if($account->get_acctype() == 0)
            {
              header("Location: applicantHomePage.php");
            } else if ($account->get_acctype() == 2)
            {
              header("Location: companyHomePage.php");
            }
            else if($account->get_acctype() == 1)
            {
               if(isSuperAdmin($account->get_accid()))
                header("Location: superAdminHomePage.php");
              else
                header("Location: adminHomePage.php");
            }

    }

    $loggedin = false;

    $reply = "";

    if(isset($_SESSION['logintype_purpose']) && $_SESSION['logintype_purpose'] == 1 && $_SESSION['logintype_purpose'] != null)  
      $header = "Sign in as Admin";
    else {
      $header = "Sign in";
      $_SESSION['logintype_purpose'] = 0;
    }

    $eErr = $pErr = ""; 

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $loggedin = false;

          if (!empty($_POST["email"])) {
            $email = test_input($_POST["email"]); 
            $loggedin = true; 
          } else if($loggedin == false){
            $eErr = "Email field is empty";
          }

          if (!empty($_POST["password"])) {
            $password = test_input($_POST["password"]);
          } else $pErr = "Password field is empty";

        if($loggedin == true && !empty($_POST["password"]) && !empty($_POST["email"])){

          if(($account = verify($email, $password)) != null)
          {
            
            if($account->get_acctype() == 0 && $_SESSION['logintype_purpose'] == 0)
            {
              $_SESSION["account_id"] = $account->get_accid();
              $_SESSION['logintype_purpose'] = null;
              header("Location: applicantHomePage.php");
              exit;
            } 
            else if ($account->get_acctype() == 2 && $_SESSION['logintype_purpose'] == 0)
            {
              $_SESSION["account_id"] = $account->get_accid();
              $_SESSION['logintype_purpose'] = null;
              header("Location: companyHomePage.php");
              exit;
            }
            else if($account->get_acctype() == 1 && $_SESSION['logintype_purpose'] == 1)
            {
              $_SESSION["account_id"] = $account->get_accid();
              $_SESSION['logintype_purpose'] = null;
              if(isActive($_SESSION["account_id"] )){
              if(isSuperAdmin($account->get_accid()))
              {
                header("Location: superAdminHomePage.php");
                $_SESSION["super"] = true;
              }

              else
              {
                header("Location: adminHomePage.php");
                $_SESSION["super"] = false;
              }
            } else {
               $reply = " Either account does not exist, is not an admin, or is deactivated<br><br>";
               session_destroy(); }

            } else 
            {
                $reply = " Either account does not exist, is not an admin, or is deactivated<br><br>";
                session_destroy();
            }


          }

          else if($loggedin == false)
          {
            $reply = "";
          }
          else
          {
            $reply = " Username does not exist or password is wrong<br><br>";
          }
        }
  
    }


  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
   <link rel="stylesheet" href="css/login.css">
   <link rel="stylesheet" href="css/errormessage.css">
   <link rel="stylesheet" href="css/button.css">
  <!-- <link rel="stylesheet" href="css/admin_companyRegistration.css"> -->

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>

<!-- 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->


</head>

<body>

<div class="container" id="mainContainer">

    <div class="container" id="logInContainer">
          <div class="row temp3">
              <div class="col-md-offset-3 col-md-6">
                <form  id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <div class="panel panel-default" id="loginPanel">
                               <div class="panel-heading" id="signInPanelTitle">
                                  <h3 class="panel-title" id="loginHeader">Sign in </h3>
                              </div>

                              <div class="panel-body">

                                <div class="row">
                                  <label class="error_message" id="password_errorMessage" name="password_errorMessage"> <?php echo $reply; ?> </label>
                                  <div class="form-group">
                                      <label for="emailInput" class=" control-label col-offset-md-1 col-md-3">Email</label>

                                      <div class="input-group col-md-offset-1 col-md-8">
                                          <span class="input-group-addon">
                                              <i class="glyphicon glyphicon-user"></i>
                                          </span>
                                          <input type="text" class="form-control" placeholder="email@domain.com" name="email" id="emailInput"/>

                                      </div>

                                      <div class="row">
                                      <div class="col-md-offset-3 col-md-9 error_container" id="email_errorMessageContainer"><label class="error_message" id="email_errorMessage" name="email_errorMessage"> <?php echo $eErr; ?> </label>
                                      </div>
                                       </div>

                                     </div>
                                </div>

                                <div class="row">
                                  <div  class="form-group">
                                  
                                       <label for="passwordInput" class="control-label col-md-3">Password</label>

                                    
                                        <div class="input-group col-md-offset-1 col-md-8">
                                             <span class="input-group-addon">
                                                 <i class="glyphicon glyphicon-lock"></i>
                                              </span>
                                              <input type="password" class="form-control" name="password" id="passwordInput"/>
                                      
                                        </div>

                                         <div class="row">
                                        <div class="col-md-offset-3 col-md-9 error_container" id="password_errorMessageContainer"><label class="error_message" id="password_errorMessage" name="password_errorMessage"> <?php echo $pErr; ?> </label>
                                        </div>
                                       </div>

                                        

                                  </div> 
                                </div>

                                  <div class="row" id="pop">
                                         <div class="row" id="loginBtnRow">
                                            <div class=" col-md-offset-3 col-md-6 loginElements">
                                             <input type="submit" class="btn btn-success" id="loginBtn" name="loginBtn" value="Sign in"></input>
                                             <!--  <label class=" control-label">Dont have an account yet?</label> -->
                                            </div>
                                        </div>

                                          <div class="row">
                                             <div class=" col-md-offset-3 col-md-6 loginElements">
                                                  <label id="dontHaveAnAccountYet" name="dontHaveAnAccountYet" class=" control-label">Don't have an account yet?</label> <a href="applicant-registration.php">Register</a>
                                            </div>
                                           </div>

                                            <div class="row">
                                              <div class=" col-md-offset-3 col-md-6 loginElements">
                                                    <a id="forgotPassword" name="forgotPassword" href="">Forgot Password?</a>
                                              </div>
                                           </div>

                                   </div>

                                       <!--  <div class="col-md-8">
                                          
                                           <div class="row">
                                             <div class="col-md-12 loginElements">
                                                  <label id="dontHaveAnAccountYet" name="dontHaveAnAccountYet" class=" control-label">Don't have an account yet?</label> <a href="">Register</a>
                                            </div>
                                           </div>

                                            <div class="row">
                                              <div class="col-md-12 loginElements">
                                                    <a id="forgotPassword" name="forgotPassword" href="">Forgot Password?</a>
                                              </div>
                                           </div>

                                        </div> -->
                                       
                                  </div>


                              </form>
                            </div>    <!-- <div class="panel-body"> end -->

                      </div>
                </form>
              </div>
          </div>
    </div>

</div>




</body>

</html>

