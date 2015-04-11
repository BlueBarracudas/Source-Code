<?php
    
    

    include 'logic/logic_applicantregistration.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration</title>
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/errormessage.css">
    <link rel="stylesheet" href="css/button.css">
  <link rel="stylesheet" href="css/admin_companyRegistration.css">

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/applicantRegistration.js"></script>
  

<style>
    .container {
        width: 60%;
        border: 1px solid gray;
        border-radius: 5px;
        
    }
    
    #header {
        background-color: #ff5200;
        color: white;
    }
    
    .reply {
        color: black;
        font: bold;
       
    }
    
    
    .textBox{
padding-bottom: 10%;

}
    
    
    
</style>
<script>
$(document).ready(function(){
		var options = '';
		for(var i=1; i<=31; i++){
				if(i !=1){
		options +='<option value='+i+'>'+i+'</option>';
		}else{
		options +='<option value='+i+' selected>'+i+'</option>';
		}
		}
    $('#DOBday').html(options);
	
		options = '';
		for(var i=1940; i<=1996; i++){
			if(i !=1940){
		options +='<option value='+i+'>'+i+'</option>';
		}else{
		options +='<option value='+i+' selected>'+i+'</option>';
		}
		
		}
    $('#DOByear').html(options);
	
//	console.log(  $('#DOByear').val());
	
$('#DOBmonth').change(function() {
	days=31;
    var options = "";
    if($(this).val()%2 == '1') {
      days=31;
    }
    else if ($(this).val() == '2'){
       days=28
    }else{
		days=30
	}
	for(var i=1; i<=days; i++){
		options +='<option value='+i+'>'+i+'</option>';
	}
    $('#DOBday').html(options);
});


});
</script>

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="header">
            <h3>Registration <p class="reply"> <?php echo $reply ?> <p> </h3>
        </div>
    </div>
    <br>

    <form class="form-horizontal" id="registrationForm" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label class="control-label col-md-5" for="studentid">Student ID (For Experts Academy Students):</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="studentid" name="fname" disabled>
                <div class="error_container" id="studentId_errorMessageContainer"><label class="error_message" id="studentId_errorMessage" name="studentId_errorMessage"></label></div>
            </div>
        </div>
        <div class="col-md-12">
            <h4>Fill-up form below (For non Experts Academy Students):</h4>
        </div>

          
          


          
        
        
        

        
    
  <div class="form-group">   
        
 <label class="col-sm-1" for="fname">First Name:<span style="color:red">*</span></label>
      
      <div class="col-md-3">         
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $first_name;?>">
     <div class="error_container" id="firstName_errorMessageContainer"><label class="error_message" id="firstName_errorMessage" name="firstName_errorMessage"><?php echo $fnErr; ?></label></div>
            </div>
      
            <label class="col-sm-1" for="mname">Middle Name(not initial):</label>      
                   <div class="col-md-3">
                <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $middle_name;?>">
                       
                       <div class="error_container" id="middleName_errorMessageContainer"><label class="error_message" id="middleName_errorMessage" name="middleName_errorMessage"><?php echo $mnErr; ?></label></div>
            </div>
      
      
       
            <label class="col-sm-1" for="lname">Last Name:<span style="color:red">*</span></label>
        <div class="col-md-3">
        
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $last_name;?>">
            
            
            <div class="error_container" id="lastName_errorMessageContainer"><label class="error_message" id="lastName_errorMessage" name="lastName_errorMessage"><?php echo $lnErr; ?> </label></div>
            </div>
        
        
        </div>
        
        
        
        

        <div class="form-group">
            <label class="control-label col-md-2" for="bdayForm">Birthdate:</label>
        </div>

     
        <div class="form-group">
        <div id="bdayForm">
                 <label class="control-label col-md-offset-1 col-md-1" for="DOBmonth">Month:<span style="color:red">*</span></label>
                <div class="col-md-3">
                    <select id="DOBmonth" name="DOBMonth" class="form-control" >
                            <option value="1" selected>January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                   </select>
                </div>
            </div>
        



            <label class="control-label col-md-2" for="cellnum">Cell Number:</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="cellnum" name="cpnum" value="<?php echo $contact_no;?>">
                
                <div class="error_container" id="cellNumber_errorMessageContainer"><label class="error_message" id="cellNumber_errorMessage" name="cellNumber_errorMessage"><?php echo $cnErr; ?> </label></div>
                
            </div>
    
        
        
        
        </div>
       <br>    
  

        <div class="form-group">
                  <label class="control-label col-md-offset-1 col-md-1" for="DOBday">Day:<span style="color:red">*</span></label>
                <div class="col-md-3">
                    <select id="DOBday" name="DOBDay" class="form-control">
                                 
                   </select>
                </div>


            <label class="control-label col-md-2" for="address">Address:<span style="color:red">*</span></label>
            <div class="col-md-3">
               <textarea class="form-control" rows="2" id="address" name="address"> <?php echo $address;?></textarea>
                
                <div class="error_container" id="address_errorMessageContainer"><label class="error_message" id="address_errorMessage" name="address_errorMessage"><?php echo $addErr; ?></label></div>
            </div>

  
      
        
        
        </div>
        
        
        

        <div class="form-group">
                  <label class="control-label col-md-offset-1 col-md-1" for="DOByear">Year:<span style="color:red">*</span></label>
                <div class="col-md-3">
                    <select id="DOByear" name="DOBYear" class="form-control">
                 
                   </select>
                </div>

       
        
        
              <label class="control-label col-md-2" for="mstatus">Marital Status:<span style="color:red">*</span></label>
            <div class="col-md-3">
                <select class="form-control" id="mstatus" name="Marital-Status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                </select>
          
            <div class="error_container" id="maritalStatus_errorMessageContainer"><label class="error_message" id="maritalStatus_errorMessage" name="maritalStatus_errorMessage"><?php echo $msErr; ?> </label></div>
            
            </div>
      
        
        
        </div>

      

        <div class="form-group">
            <label class="control-label col-md-2" for="email">Email:<span style="color:red">*</span></label>
            <div class="col-md-3">
                <input type="email" class="form-control" id="email" name="emailAdd" value="<?php echo $email;?>"> <div class="error_container" id="emailAdress_errorMessageContainer"><label class="error_message" id="emailAdress_errorMessage" name="emailAdress_errorMessage"><?php echo $emErr; ?> </label></div>
            </div>
      
        
        
             
    
            <label class="control-label col-md-2" for="gender">Gender:<span style="color:red">*</span></label>
            <div class="col-md-4">
                <div class="radio">
                    <label><input type="radio" name="sex" value="M">Male</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="sex" value="F">Female</label>
                </div>
           
            <div class="error_container" id="gender_errorMessageContainer"><label class="error_message" id="gender_errorMessage" name="gender_errorMessage"><?php echo $seErr; ?> </label></div>
            
            </div>
       
        
        
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pwd">Password:<span style="color:red">*</span></label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="pwd" name="password" placeholder="6-15 characters">
                
                <div class="error_container" id="password_errorMessageContainer"><label class="error_message" id="password_errorMessage" name="password_errorMessage"><?php echo $pwErr; ?></label></div>
                
            </div>
        </div>
        
        <br>
        
        <div class="form-group">
            <label class="control-label col-md-2" for="confirm">Confirm Password:<span style="color:red">*</span></label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="confirm" name="confirmPassword">
          
            <div class="error_container" id="confirmPassword_errorMessageContainer"><label class="error_message" id="confirmPassword_errorMessage" name="confirmPassword_errorMessage"><?php echo $cpErr; ?></label></div>
            </div>
        </div>
<br>
      
        <div class="form-group">
            <div class="col-md-offset-5 ">
   
                <a href="main-login.php"><button type="button" class="btn btn-default">Cancel</button></a>     
      
                
                <input type="submit" id="submitBtn" class="btn btn-success" value="Create account"></input>
        </div>
    </form>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</html>