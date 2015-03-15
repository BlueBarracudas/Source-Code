<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration</title>
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
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
    
    .error-msg {
        color: red;
        display: inline;
    }
    
    #error{
        color:red;
        display: inline;
    }

    #message{
        color: black;
    }

</style>

<script>
$(document).ready(function(){
        var options = '';
        for(var i=1; i<=31; i++){
        options +='<option value='+i+'>'+i+'</option>';
        }
    $('#DOBday').html(options);
    
        options = '';
        for(var i=1940; i<=2010; i++){
        options +='<option value='+i+'>'+i+'</option>';
        }
    $('#DOByear').html(options);
    
$('#DOBmonth').change(function() {
    days=31;
    var options = '';
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

<?php include 'logic_loginregister.php' ?>



<div class="container">
    <?php include 'header.php' ?>
    <div class="row">
        <div class="col-md-12" id="header">
            <h3>Registration <p id="message"> <?php echo $reply ?> <p> </h3>
        </div>
    </div>
    <br>
    <form class="form-horizontal" role="form"  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label class="control-label col-md-5" for="studentid">Student ID (For Experts Academy Students):</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="studentid" name="studentid">
            </div>
        </div>
        <div class="col-md-16">
            <h4>Fill-up form below (For non Experts Academy Students):</h4>
             <h4 id = "error"> * required fields </h4>
        </div>

        <div class="form-group">
            <br><label class="control-label col-md-2" for="fname">First Name: <p id="error"> *</p> </label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="fname" name="fname">
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $fnErr; ?> </div>
        </div>

         <div class="form-group">
            <label class="control-label col-md-2" for="mname">Middle Name: </label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="mname" name="mname">
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $mnErr; ?> </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="lname">Last Name: <p id="error"> * </p> </label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="lname" name="lname">
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $lnErr; ?> </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="cellnum">Cell Number: <p id="error"> * </p> </label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="cellnum" name="cpnum">
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $cnErr; ?> </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="address">Address: <p id="error"> * </p> </label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $addErr; ?> </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="email">Email: <p id="error"> *  </p> </label>
            <div class="col-md-3">
                <input type="email" class="form-control" id="email" name="emailAdd">
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $emErr; ?> </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pwd">Password: <p id="error"> * </p> </label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="pwd" name="password">
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $pwErr; ?> </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="confirm">Confirm Password: <p id="error"> * </p> </label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="confirm" name="confirmPassword">
            </div>
            <div class="col-md-2 error-msg" id="confirm-error"> <?php echo $cpErr; ?> </div>
        </div>


        <div class="form-group">
            <label class="control-label col-md-2" for="bdayForm">Birthdate: <p id="error"> * </p> </label>
        </div>

        <div class="form-group" id="bdayForm">
                 <label class="control-label col-md-offset-1 col-md-1" for="DOBmonth">Month:</label>
                <div class="col-md-3">
                    <select id="DOBmonth" name="DOBmonth" class="form-control" >
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                   </select>
                </div>
        </div>

        <div class="form-group">
                  <label class="control-label col-md-offset-1 col-md-1" for="DOBday">Day:</label>
                <div class="col-md-3">
                    <select id="DOBday" name="DOBday" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                   </select>
                </div>

        </div>

        <div class="form-group">
                  <label class="control-label col-md-offset-1 col-md-1" for="DOByear">Year:</label>
                <div class="col-md-3">
                    <select id="DOByear" name="DOByear" class="form-control">
            <option value="1996">1996</option>
    <option value="1995">1995</option>
    <option value="1994">1994</option>
    <option value="1993">1993</option>
    <option value="1992">1992</option>
    <option value="1991">1991</option>
    <option value="1990">1990</option>
    <option value="1989">1989</option>
    <option value="1988">1988</option>
    <option value="1987">1987</option>
    <option value="1986">1986</option>
    <option value="1985">1985</option>
    <option value="1984">1984</option>
    <option value="1983">1983</option>
    <option value="1982">1982</option>
    <option value="1981">1981</option>
    <option value="1980">1980</option>
    <option value="1979">1979</option>
    <option value="1978">1978</option>
    <option value="1977">1977</option>
    <option value="1976">1976</option>
    <option value="1975">1975</option>
    <option value="1974">1974</option>
    <option value="1973">1973</option>
    <option value="1972">1972</option>
    <option value="1971">1971</option>
    <option value="1970">1970</option>
    <option value="1969">1969</option>
    <option value="1968">1968</option>
    <option value="1967">1967</option>
    <option value="1966">1966</option>
    <option value="1965">1965</option>
    <option value="1964">1964</option>
    <option value="1963">1963</option>
    <option value="1962">1962</option>
    <option value="1961">1961</option>
    <option value="1960">1960</option>
    <option value="1959">1959</option>
    <option value="1958">1958</option>
    <option value="1957">1957</option>
    <option value="1956">1956</option>
    <option value="1955">1955</option>
    <option value="1954">1954</option>
    <option value="1953">1953</option>
    <option value="1952">1952</option>
    <option value="1951">1951</option>
    <option value="1950">1950</option>
    <option value="1949">1949</option>
    <option value="1948">1948</option>
    <option value="1947">1947</option>
                                   
                   </select>
                </div>

                <div class="col-md-2 error-msg" id="confirm-error"> <?php echo $dErr; ?> </div>

        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="nationality">Nationality: <p id="error"> * </p> </label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="nationality" name="nationality">
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $natErr; ?> </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="mstatus">Marital Status: <p id="error"> *  </p> </label>
            <div class="col-md-3">
                <select class="form-control" id="mstatus" name="Marital-Status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $msErr; ?> </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2" for="gender">Sex: <p id="error"> *  </p> </label>
            <div class="col-md-4">
                <div class="radio">
                    <label><input type="radio" name="sex" value="M">Male</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="sex" value="F">Female</label>
                </div>
            </div>
            <div class="col-md-2 error-msg" id="email-error"> <?php echo $seErr; ?> </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-5 col-md-6 btn-group">
                <input type="submit" class="btn btn-success" value ="Create account"></input>
            </div>
        </div>
    </form>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</html>