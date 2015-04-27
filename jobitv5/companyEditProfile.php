<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	if(isset($_SESSION["account_id"]))
	{
		$ap = getLoggedInAccount($_SESSION["account_id"]);
		$company = getCompanyById($_SESSION["account_id"]);

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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<link rel="shortcut icon" href="">

<!-- bootstrap css start  -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- bootstrap css end  -->



<!-- common css start  -->
<link rel="stylesheet" href="css/button.css">
<link rel="stylesheet" href="css/panels.css">
<link rel="stylesheet" href="css/errormessage.css">
<link rel="stylesheet" href="css/style.css">
<!-- common css end  -->

<!-- specific for this page css start  -->
<link rel="stylesheet" href="css/company_setupProfile.css">
<!-- specific for this page css start  -->


<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->


 
</head>
<body>


<div class="container mainContainer">
	<div class="row containerRow">
		<div class="col-md-offset-2 col-md-8">
			<div class="panel panel-default">
       				 <div class="panel-heading">
			            <h3 class="panel-title">Edit Profile</h3>
			        </div>

			        <div class="panel-body">
			            <div class="row">
			            	<div class="col-md-12">
			            	<div class="col-md-4">
			            		<div class="col-md-12 align-center">
			            		 <img id="companyProfilePicImg" class="img-responsive img-rounded col-md-8" src="images/logo.png">
			           			</div> 
			            		 <div class="col-md-12">
			            		 	<div class="btn btn-default  btn-file  btn-fill" id="uploadCompanyLogoButton">
					                      Upload Logo <input type="file">
					                </div>
			            		 </div>
			            	</div>

			            	<div class="col-md-8">
			            		<form class="form-horizontal">
			            		

			            			<!-- <div class="form-group">
			            				<label class="col-md-4">Company Name:</label>
			            				<div class="col-md-8">
			            					  <input type="text" class="form-control" id="companyNameInput" placeholder="">
			            				</div>
			            			</div>
			            			<div class="form-group">
			            				<label class="col-md-4">Contact Number:</label>
			            				<div class="col-md-8">
			            					  <input type="text" class="form-control" id="companyNameInput" placeholder="">
			            				</div>
			            			</div> -->




  <div class="form-group">

                                    <label for="companyNameInput" class="col-sm-5 control-label">Company Name:<span style="color:red">*</span></label>
                                     <div class="col-sm-7">
                                              <input type="text" class="form-control" id="companyNameInput" placeholder="">
                                  
                                   
                                     
                                     </div>
                                     
<div class = "companySetupError">                                    
                                                              <div class="error_container" id="companyName_errorMessageContainer"><label class="error_message" id="companyName_errorMessage" name="companyName_errorMessage">Error Message</label></div>
                                     </div>    
                         
                         </div>


                         
                               <div class="form-group">

                                    <label for="companyContactNumberInput" class="col-sm-5 control-label">Contact Number:<span style="color:red">*</span></label>
                                     <div class="col-sm-7">
                                              <input type="text" class="form-control" id="companyContactNumberInput" placeholder="">
                                         
                                         
 
                                    </div>

                       
                <div class = "companySetupError">                        
                                         <div class="error_container" id="contactNumber_errorMessageContainer"><label class="error_message" id="contactNumber_errorMessage" name="contactNumber_errorMessage">Error Message</label></div>
                                         
                                   </div>
                         
                         
                         </div>



                                     <div class="form-group">

                                    <label for="companyAddressInputInput" class=" col-sm-5 control-label">Address:<span style="color:red">*</span></label>
                                     <div class="col-sm-7">
                                         <textarea class="form-control" id="companyAddressInputInput"  rows="7" id="companyDescriptionInput"></textarea>
            
                                         
                                    </div>

                             <div class = "companySetupError">                              
                           
     <div class="error_container" id="companyAdress_errorMessageContainer"><label class="error_message" id="companyAdress_errorMessage" name="companyAdress_errorMessage">Error Message</label></div>
                                         
                             
                             
                             </div>
                             
                             
                              </div>

                               </div>









			            		</form>
			            	</div>

			            </div>

			            <div class="row">

			            	<div class="col-md-12">

			            <div class="form-group">
          					<label for="companyDescriptionInput" class="col-md-12 control-label">Company Description:</label>
             
		      
		            	<div class="col-md-12">
		                  <textarea class="form-control" rows="5" id="companyDescriptionInput"></textarea>
		                </div>

                     
            			 </div>


			            	</div>

			       
			            </div>

			            <br>

			            <div class="row button-row">
			            
			            		<button type="reset" class="btn btn-default" >Cancel</button>
                                <button type="submit" class="btn btn-success">Update</button>
			            
			            </div>


			            </div>


			        </div>

			</div> <!--  end of <div class="panel panel-default"> -->




		</div>
	</div>

</div>


</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
<!-- js end -->

</html>