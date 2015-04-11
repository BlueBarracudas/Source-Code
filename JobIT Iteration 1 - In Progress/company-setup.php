<?php
  session_start();

  include 'MVC/controller.php';

loadAll();

if(isset($_SESSION["account_id"]))
  {
    
    $ap = getLoggedInApplicant($_SESSION["account_id"]);
    include 'logic/logic_companysetup.php';

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
  <title>Company Set-up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/company_setupProfile.css">
  <link rel="stylesheet" href="css/panels.css">
  <link rel="stylesheet" href="css/errormessage.css">
  <link rel="stylesheet" href="css/button.css">
  <link rel="stylesheet" href="css/style.css">

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="js/company_setupProfile.js"></script>


    
    </head>

<body>



<div class="container mainContainer">

 <div class="row col-md-offset-2 col-md-8 ">
  <div class="panel panel-default">
        <div class="panel-heading">
           <h3 class="panel-title" id="SetupHeader">Set-up Profile <?php echo $reply; ?></h3>
        </div>

        <div class="panel-body">
          
          <form class="form-horizontal company-setup-profile">

            <div class="">
              <div class="form-group">
                 <div class="col-md-4 align-center">
                    <!-- <div class="row"> -->

                     <img id="companyProfilePicImg" class="img-responsive img-rounded" src="images/logohere.png">


                       <div id="uploadCompanyLogoButtonDiv">
                     <span class="btn btn-default  btn-file col-md-12" id="uploadCompanyLogoButton">
                      Upload Logo <input type="file">
                    </span>
                  </div>
                


                 </div>

                 <div class="col-md-8">
                          <div class="form-group">

                                <label for="companyNameInput" class="col-md-4 control-label">Company Name:<span style="color:red">*</span></label>
                                    <div class="col-md-8">
                                          <input type="text" class="form-control" id="companyNameInput" placeholder="" name="name">
                                    </div>

                                 <div class="error_container col-md-offset-4 col-md-8" id="companyName_errorMessageContainer"><label class="error_message" id="companyName_errorMessage" name="companyName_errorMessage"><?php echo $nErr; ?></label></div>
                                  
                         </div>

                


                         <div class="form-group">

                                            <label for="contactNumberInput" class="col-md-4 control-label">Contact Number:<span style="color:red">*</span></label>
                                                <div class="col-md-8">
                                                      <input type="text" class="form-control" id="contactNumberInput" placeholder="" name="name">
                                                </div>
                                           <div class="error_container  col-md-offset-4 col-md-8" id="contactNumber_errorMessageContainer"><label class="error_message" id="contactNumber_errorMessage" name="contactNumber_errorMessage"><?php echo $cnErr; ?></label></div>
                                     
                         </div>


                          <div class="form-group">

                              <label for="companyAddressInputInput" class=" col-md-4 control-label">Address:<span style="color:red">*</span></label>
                                    <div class="col-md-8">
                                      <textarea class="form-control" id="companyAddressInputInput"  rows="3" id="companyDescriptionInput" name="address"></textarea>   
                                    </div>

                           <!--   <div class = "companySetupError">      -->                         
                           
                                
                                  <div class="error_container col-md-offset-4 col-md-8" id="companyName_errorMessageContainer"><label class="error_message" id="companyAdress_errorMessage" name="companyAdress_errorMessage"><?php echo $adErr; ?></label></div>        
                             
                             
                             <!-- </div> -->
                             
                             
                          </div>
                                  
                          <div class="form-group">
                               <label for="companyDescriptionInput" class="col-md-4 control-label">Company Description:</label>
             
                            <div class="col-md-8">
                                  <textarea class="form-control" rows="5" id="companyDescriptionInput" name="description"></textarea>
                                
                                          </div>
                                                  
                         
                        </div> 
                      </div>
                    </div>


                      <div class="form-group align-center">
                        <a href="company-home.php"><button type="button" class="btn btn-default">Cancel</button></a>  <input type="submit" id="submitBtn" class="btn btn-success" value="Submit"></input>
                      </div>
        

        </div>



          </form>

         



  </div>
 </div>
</div>


</body>

</html>

