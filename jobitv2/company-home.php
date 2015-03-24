<?php
session_start();

include 'MVC/controller.php';
include 'header.php';

loadAll();

if(isset($_SESSION["account_id"]))
  {
    
    $ac = getLoggedInAccount($_SESSION["account_id"]);
    include 'logic_companysetup.php';
    echo  "<h3 align =\"center\"> Hi " . $ac->get_email() . "!</h3>";

  }

  else
  {
    echo "You are not logged in.";
    header('Refresh: 3; URL=main_login.php'); 
  }

?>

<!DOCTYPE html>
<html>
	<head>
		<script src="js/jquery-2.1.1.js"></script>
		<title> Company Profile | Setup </title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link rel="stylesheet" href="css/bootstrap.theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.theme.min.css">
		<link rel="stylesheet" href="css/company_setupProfile.css">

		<script src="js/jquery-2.1.3.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- 
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
		
		
		
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

		<style>


		</style>

	</head>
	
	<body>

  <div class="container-fluid">
  	<h3 align ="center" style="color:red;"> <?php echo $reply ?> </h3>
    <div class="container" id="mainContainer">
      <div class="wrapper">

        <div class="row" id="temp">
            <div class="col-sm-offset-2 col-sm-2 temp2" id="profilePicCol">

                <div class="row">
                  <img id="companyProfilePicImg" class="img-responsive img-rounded" src="images/logohere.png">
                </div>

                <!-- <div class="row" id="uploadCompanyLogoButtonDiv">

                    <span class="btn btn-default btn-file col-sm-12" id="uploadCompanyLogoButton">

                        <input type="file" id="companyLogoFile">
                                         Upload Company Logo
                    </span>

                     <label for="companyLogoFile" class="col-sm-12 control-label" id="uploadCompanyLogoButtonLabel">Upload Company Logo</label>

                </div> -->

                <div class="row" id="uploadCompanyLogoButtonDiv">
                <span class="btn btn-default  btn-file col-sm-12" id="uploadCompanyLogoButton">
                      Upload Company Logo <input type="file" name="photo">
                </span>
                </div>
            </div>

                  <div class="col-sm-6" id="companySetupProfileForm">
           
                     <!-- <form class=" col-sm-offset-1 col-sm-12   form-horizontal"> -->
					 <form id = "edit-profile" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"">

                                 <div class="form-group">

                                    <label for="companyNameInput" class="col-sm-5 control-label">Company Name</label>
                                     <div class="col-sm-8">
                                              <input type="text" class="form-control" id="companyNameInput" name="name" placeholder="">
                                    </div>
                              </div>


                              <div class="form-group">

                                    <label for="companyAddressInputInput" class=" col-sm-5 control-label">Address</label>
                                     <div class="col-sm-8">
                                              <input type="text" class="form-control" id="companyAddressInputInput" name="address" placeholder="">
                                    </div>

                              </div>

                               <div class="form-group">

                                    <label for="companyContactNumberInput" class="col-sm-5 control-label">Contact Number</label>
                                     <div class="col-sm-8">
                                              <input type="text" class="form-control" id="companyContactNumberInput" name="contactno" placeholder="" height="30">
                                    </div>

                              </div>



                            
                          
                    <!-- </form> -->

                  </div>
         

    </div>


    <div class="row " id="companySetupProfileForm_Description">

        <div class="form-group col-sm-12">

          <label for="companyDescriptionInput" class="col-sm-offset-2 col-sm-3 control-label">Company Description</label>
             <div class="col-sm-offset-2 col-sm-7">
                  <input class="form-control" rows="5" id="companyDescriptionInput" name="description"></textarea>
              </div>

                     
             </div>


            <div class="form-group">
                <div class="col-sm-9" id="buttonGroup">
                                <input type="submit" class="btn btn-default" value ="Submit"> <!-- was a button -->
                                <button type="button" class="btn btn-default">Cancel</button>
                </div>

           </div>

        </div>
		</form>
    </div>
  </div>
   <a href ="logout.php"><button type="button" class ="btn btn-danger">Logout</button></a>
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