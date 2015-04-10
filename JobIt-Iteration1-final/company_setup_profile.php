<?php
session_start();

include 'MVC/controller.php';

loadAll();

if(isset($_SESSION["account_id"]))
  {
    
    $ac = getLoggedInAccount($_SESSION["account_id"]);
    include 'logic_companysetup.php';
  }

  else
  {
    echo "You are not logged in.";
    header('Refresh: 3; URL=main_login.php'); 
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

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="js/company_setupProfile.js"></script>

    <script>
		var xmlhttp;
			function loadXMLDoc(url, cfunc)
			{
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}

				xmlhttp.open("POST", url, true);
				xmlhttp.send();
			}

			function updateProfile()
			{
				var description = $('#description')[0].value;
				var address = $('#address')[0].value;
				var contactno = $('#contactno')[0].value;
				

				loadXMLDoc("companySetupProfile.php", function()
				{
					if(xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						alert("Updated Profile Information! :>");
					}
				});
				
			}

		</script>
    
    </head>

<body>
 
<div class="container" id ="setupElements">   
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" id="SetupHeader">Set-up Profile</h3>
        </div>
            <div class="panel-body" id="InnerContainer">
                <div class="container-fluid">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="wrapper">
                            <div class="row" id="temp">
                                <div class="col-sm-offset-1 col-sm-3 temp2" id="profilePicCol">
                                    <div class="row">
                                      <img id="companyProfilePicImg" class="img-responsive img-rounded" src="images/logohere.png">
                                    </div> 
                                    <div class="row">
                                        <div id="uploadCompanyLogoButtonDiv" class="col-sm-3">
                                         <span class="btn btn-default  btn-file col-sm-12" id="uploadCompanyLogoButton">
                                          Upload Logo <input type="file"></span>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-sm-7" id="companySetupProfileForm">
                                    <form class="col-sm-12   form-horizontal">
                                        <div class="form-group">
                                            <label for="companyNameInput" class="col-sm-5 control-label">Company Name:<span style="color:red">*</span></label>
                                             <div class="col-sm-7">
                                                    <input type="text" name="name"class="form-control" id="companyNameInput" placeholder="">
                                             </div>

                                             <div class = "companySetupError">                                    
                                                    <div class="error_container" id="companyName_errorMessageContainer"><label class="error_message" id="companyName_errorMessage" name="companyName_errorMessage">Error Message</label>
                                                    </div>
                                             </div>    

                                        </div>
                                        <div class="form-group">
                                            <label for="companyContactNumberInput" class="col-sm-5 control-label">Contact Number:<span style="color:red">*</span></label>
                                            <div class="col-sm-7">
                                                      <input type="text" name="contactno" class="form-control" id="companyContactNumberInput" placeholder="">
                                            </div>

                                            <div class = "companySetupError">                        
                                                 <div class="error_container" id="contactNumber_errorMessageContainer"><label class="error_message" id="contactNumber_errorMessage" name="contactNumber_errorMessage">Error Message</label>
                                                 </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="companyAddressInputInput" class=" col-sm-5 control-label">Address:<span style="color:red">*</span></label>
                                            <div class="col-sm-7">
                                                 <textarea class="form-control" name="address"id="companyAddressInputInput"  rows="3" id="companyDescriptionInput"></textarea>      
                                            </div>
                                            <div class = "companySetupError">                                                        
                                                    <div class="error_container" id="companyAdress_errorMessageContainer"><label class="error_message" id="companyAdress_errorMessage" name="companyAdress_errorMessage">Error Message</label>
                                                    </div>
                                            </div>

                                        </div>
                                </div>
                            </div>
                            <div class="row " id="companySetupProfileForm_Description">
                                <div class="form-group">
                                    <label for="companyDescriptionInput" class="col-sm-offset-1 col-sm-4 control-label">Company Description:</label>
                                    <div class="row">
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <textarea name="description" class="form-control" rows="5" id="companyDescriptionInput"></textarea>
                                        </div>
                                    </div>      
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-17"> 
                                        <button type="button" class="btn btn-default">Cancel</button>  <input type="submit" id="submitBtn" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div>
</div>



</body>

</html>



	
<!--	
	<body>

	<h3> Please input the required information:

	<form id = "edit-profile" method="POST" action="companySetupProfile.php">
			Description: <input type="text" name = "description" placeholder =""/><br>
			Address: <input type="text" name = "address" placeholder =""/><br>
			Contact Number: <input type="text" name = "contactno" placeholder =""/><br>

		<input type="submit" value="Submit">
	</form>
	
	</body>
</html>