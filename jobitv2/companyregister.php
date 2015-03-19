<?php 

  include 'logic_companyregister.php' 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job IT | Company Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/admin_companyRegistration.css">

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <style>
  p{
    color: red;
  }

  </style>
<!-- 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="http://">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->


</head>

<body>

<div id="mainContainer" class="container-fluid">

    <div class="container" id="">

        <div class="row" id="row1">
        
        <h1 align="center">JobIT | Company registration</h1>
        <h3 align="center">  <?php echo $reply; ?> </h3>

                <form class=" col-sm-12 form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <div class="col-sm-offset-3  col-sm-6 formBoxBorder">

                      <div class="form-group">
                                          <p> * required fields </p><br>
                        <label for="companyUsernameInput" class="col-sm-3 control-label">Email <p> * </p> <?php echo $emailErr; ?> </label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="companyUsernameInput" placeholder="Email" name="email">
                        </div>
                      </div>
					  
					    <div class="form-group">
                        <label for="companyPasswordInput" class="col-sm-3 control-label">Password <p> * <?php echo $pwErr; ?>  </p> </label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="companyPasswordInput" placeholder="Password (10 - 18 characters long)" name="password">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="companyTypeInput" class="col-sm-3 control-label">Company Type <p> * <?php echo $ctErr; ?>  </p> </label>
                        <div class="col-sm-9">
                          <select id="companyTypeInput" class="form-control" name="company_type">
                            <option>........</option>
                            <option>Software Solutions</option>
                            <option>IT Services</option>
                            <option>Training Centre</option>
                            <option>Telecommunications</option>
                          </select>
                        </div>
                      </div>
                      </div>
                  </div>
                     
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6" id="buttonGroup">
                          <input type="submit" value = "Create" class="btn btn-default"></input>
                          <button type="button" class="btn btn-default">Cancel</button>
                        </div>
                      </div>

                </form>   
 
        </div>     

        </div>

          
            
    </div>




</body>

</html>

