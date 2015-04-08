<?php

  session_start();

  include 'header.php';
  include '/MVC/controller.php';

    loadAll();

    $loggedin = false;

    $reply = "Sign in.";
echo "Lance! what is this fuckery?";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $loggedin = false;

          if (!empty($_POST["email"])) {
            $email = test_input($_POST["email"]); 
            $loggedin = true; 
          } else if($loggedin == false){
            $reply = "Username or Password field is empty.";
          }

          if (!empty($_POST["password"])) {
            $password = test_input($_POST["password"]);
          }

        if($loggedin == true){

          if(($account = verify($email, $password)) != null)
          {
            $_SESSION["account_id"] = $account->get_accid();

            if($account->get_acctype == 0)
            {
              header("Location: home.php");
            } else if ($account->get_acctype == 2)
            {
              header("Location: company-home.php");
            }


          }
          else if($loggedin == false)
          {
            $reply = "";
          }
          else
          {
            $reply = "Username does not exist or password is wrong";
          }
        }
  
    }

    if(isset($_SESSION["account_id"]))
    {
      $account = getLoggedInAccount($_SESSION["account_id"]);
            
            if($account->get_acctype() == 0)
            {
              header("Location: home.php");
            } else if ($account->get_acctype() == 2)

            {
              header("Location: company-home.php");
            }

    }
  
?>

<!DOCTYPE html>
<html>
<head>
	<title> JobIT | Sign In </title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/bootstrap.theme.min.css">
	<link rel="stylesheet" href="css/login.css">

	<script src="js/jquery-2.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/login.js"></script>

</head>


<body>

<div class="container" id="mainContainer">

    <div class="container" id="logInContainer">
          <div class="row temp3">
              <div class="col-md-offset-3 col-md-6">
                <form id="loginForm" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <div class="panel panel-default" id="loginPanel">
                               <div class="panel-heading" id="signInPanelTitle">
                                  <h3 class="panel-title" id="loginHeader"> <?php echo $reply; ?> </h3>
                              </div>

                              <div class="panel-body">
                                <form>
                                  <div class="form-group">
								  


                                      <label for="emailInput" class=" control-label">Email</label>

                                      <div class="input-group">
                                          <span class="input-group-addon">
                                              <i class="glyphicon glyphicon-user"></i>
                                          </span>
                                          <input type="text" class="form-control" placeholder="email@domain.com" name="email" id="email">

                                      </div>
                                  </div>


                                  <div  class="form-group">
                                       <label for="passwordInput" class=" control-label">Password</label>

                                        <div class="input-group col-span-">
                                             <span class="input-group-addon">
                                                 <i class="glyphicon glyphicon-lock"></i>
                                              </span> 
                                              <input type="password" class="form-control" name="password" id="mypassword">
                                         </div>

                                  </div> 

                                  <div class="row" id="pop">
                                         <div class="col-sm-2" id="loginBtn">
                                             <input type="submit" class="btn btn-success"name="loginBtn" value="Login"> <!-- Login button -->
                                             <!--  <label class=" control-label">Dont have an account yet?</label> -->
                                        </div>

                                        <div class="row col-sm-10">
                                          
                                           <div class="row">
                                             <div class="col-sm-12 loginElements">
                                                  <label id="dontHaveAnAccountYet" name="dontHaveAnAccountYet" class=" control-label">Don't have an account yet?</label> <a href="registration.php">Register</a>
                                            </div>
                                           </div>

                                            <div class="row">
                                              <div class="col-sm-12 loginElements">
                                                    <a id="forgotPassword" name="forgotPassword" href="">Forgot Password?</a>
                                              </div>
                                           </div>

                                        </div>
                                       
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





<!--  ////////////////
<body>
	<form name="form1" method="post" action="checklogin.php">
	E-mail: <input name="email" type="text" id="email">
	Password: <input name="mypassword" type="password" id="mypassword" >
	&nbsp;&nbsp;<input type="submit" name="Submit" value="Login">
	



</body>
</html>