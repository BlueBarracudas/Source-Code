<!DOCTYPE html>
<html lang="en">
<style>
	html *{
		font-family: "Century Gothic" !important;
	}
	#alerts{
		text-align: center;
		font-size: 16px;
	}
	#box{
		height: 335px;
		width: 560px;
		background-color: #ff5200;
		text-align: center;
		border-radius: 35px;
		margin-right: auto;
		margin-left: auto;
	}
	#login{
		padding-top: 20px;
	}
	.form-control{
		height: 32px;
		margin-right: auto;
		margin-left: auto;
	}

	p[id="inputs"]{
		font-size: 28px;
		padding-top: 60px;
	}

	#inputfield{
		border-radius: 80px;
		width: 70%;
	}
	.btn-group{
		padding-top: 10px;
		float: right;
		margin-right: 40px;
	}
	#askregister{
		padding-top: 8px;
		font-size: 14px;
		text-align: center;
	}
    
    #register{
    
        font-size: 16px;
        display: none;
  margin-right: auto;
		margin-left: auto;
    
    }

    #error{
 	color: rgb(155, 155, 155);
 	font-size: 16px;
 	display: inline;
    }
    
    #registerBody{
    
    color: black;
    }

    option{
    	color: black;
    }

    select{
    	color: blue;
    }
    
</style>
<script>
	if ( window.addEventListener ) {  
	  	var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];  
	  	window.addEventListener("keydown", function(e) {  
	    if ( e.keyCode == konami[state] ) state++;  
	    else state = 0;  
	    if ( state == 10 ) {
	    	adminLogin();
	    } 
	    }, true);  
	} 
	function register(){
		var x = document.getElementById("box");
		x.style.transitionDuration = ".5s";
		x.style.height = '900px';
		x.style.width = '800px';
		var y = document.getElementById("login");
		y.style.display = 'none';
		var z = document.getElementById("askregister");
		z.style.display = 'none';
		var div = document.getElementById('alerts');
		var button = document.createElement("button")
		button.setAttribute('onclick', 'revertToLogin()');
		button.setAttribute('id', 'cancelButton');
		var text = document.createTextNode("Cancel");
		button.appendChild(text);
		div.appendChild(button);
        
        var a = document.getElementById("register");
		a.style.display = 'inline';
        
        
	} 
	function adminLogin(){
		var div = document.getElementById('alerts');
		var adminText = document.createTextNode("YOU ARE LOGGING IN AS ADMIN     ");
		var div = document.getElementById('alerts');
		var button = document.createElement("button")
		button.setAttribute('onclick', 'revertToLogin()');
		button.setAttribute('id', 'cancelButton');
		var text = document.createTextNode("Cancel");
		button.appendChild(text);
		div.appendChild(adminText);
		div.appendChild(button);
	    var z = document.getElementById("askregister");
		z.style.display = 'none';
	}
	function revertToLogin(){
		var x = document.getElementById("box");
		x.style.transitionDuration = ".5s";
		x.style.height = '335px';
		x.style.width = '560px';
		var y = document.getElementById("login");
		y.style.display = 'block';
		var z = document.getElementById("askregister");
		z.style.display = 'block';
		var w = document.getElementById("alerts");
		w.innerHTML = "";
        var a = document.getElementById("register");
		a.style.display = 'none';
	}
</script>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

	<?php include 'logic_loginregister.php';
	?>

	<h1 align="center">JobIT<h1>
	<h2 align="center"> <?php echo $reply ?> </h2>
	<div id="alerts">
	</div>
	<div id="box">
		<div id="login">
			<form>
				<div class="form-group">
					<p id="inputs"><input type="text" class="form-control input-lg" placeholder="Email" id="inputfield"></input</p>
				</div> 
				<div class="form-group">
				  	<p id="inputs"><input type="password" class="form-control input-lg" placeholder="Password" id="inputfield"></input</p>
				</div> 
				<p><div class="btn-group">
					<input type="submit" class="btn btn-warning btn-lg" value="Login"></input>
				</div></p>
				<br>
			</form>
		</div>
        
		<div id="register">
   <div id="registerBody">
     <form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">       
                <h3>Applicant Sign-up </h3> <br>
  <div class="row"><div class="col-sm-5"> </div>
 <div class="col-sm-4">Input Student ID (For Experts Academy Students):</div>
  <div class="col-sm-2"><input class="form-control input-sm" type="text" name="studentID"></div>
</div><br>	
  
  Fill-up Form Bellow (For non Experts Academy Students):  <p id="error"> * required fields </p><br><br><br>

  <div class="row"><div class="col-sm-2"> </div>
  <div class="col-sm-2"><input class="form-control input-sm" type="text" name="fname"><br> First Name <p id="error"> * <?php echo $fnErr; ?> </p> </div>
  <div class="col-sm-2"><input class="form-control input-sm" type="text" name="mname"><br> Middle Name <p id="error"> * <?php echo $mnErr; ?> </p>  </div>
  <div class="col-sm-2"><input class="form-control input-sm" type="text" name="lname"><br> Last Name <p id="error"> * <?php echo $mnErr; ?> </p>  </div>
</div>

 <br><br>
 
 <div class="row"><div class="col-sm-2"> </div>
 <div class="col-sm-2">Contact Number: <p id="error"> * <?php echo $cnErr; ?> </p></div>
 <div class="col-sm-3"><input class="form-control input-sm" type="text" name="cpnum"></div>
 </div>

<br> 
<div class="row"><div class="col-sm-2"> </div>
 <div class="col-sm-2">Address: <p id="error"> * <?php echo $addErr; ?> </p></div> 
 <div class="col-sm-3"><input class="form-control input-sm" type="text" name="address"></div>
</div>

<br> 
<div class="row"><div class="col-sm-2"> </div>
 <div class="col-sm-2"> Email Address: <p id="error"> * <?php echo $emErr; ?> </p></div> 
 <div class="col-sm-3"><input class="form-control input-sm" type="email" name="emailAdd"></div> 
</div>

<br>
<div class="row"><div class="col-sm-2"> </div>
  <div class="col-sm-2"> Password: <p id="error"> * <?php echo $pwErr; ?> </p></div>
  <div class="col-sm-3"><input class="form-control input-sm" type="password" name="password"></div>  
</div>

<br>

<div class="row"><div class="col-sm-2"> </div>
   <div class="col-sm-2">  Confirm Password: <p id="error"> * <?php echo $cpErr; ?> </div>
   <div class="col-sm-3"> <input class="form-control input-sm" type="password" name="confirmPassword"> </div> 
</div> 

<br>
<div class="row"><div class="col-sm-2"> </div>
	<div class="col-sm-2"> Birthday: <p id="error"> * <?php echo $dErr; ?> </p> </div>
 	<div class="col-sm-4">
	<select name="DOBMonth">
	<option> MM </option>
	<option value="01">January</option>
	<option value="02">Febuary</option>
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

<select name="DOBDay">
	<option> DD </option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>

<select name="DOBYear">
	<option> YY </option>
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
</div>

<br>
<div class="row"><div class="col-sm-2"> </div>
   <div class="col-sm-2">  Nationality: <p id="error"> * <?php echo $natErr; ?> </p></div>
   <div class="col-sm-3">  <input class="form-control input-sm" type="text" name="nationality"> </div>
</div>
<br>

<div class="row"><div class="col-sm-2"> </div>
 <div class="col-sm-2"><span style="color:black">Marital Status <p id="error"> * <?php echo $msErr; ?> </p> </span></div>
 
 <div class="col-sm-2">
 <select name="Marital-Status">
 <option selected disabled>Select...</option>
  <option value="Single">Single</option>
  <option value="Married">Married</option>
</select> </div>
</div>
<br>
</div>

<div class="row"><div class="col-sm-2"> </div>
 <div class="col-sm-2"><span style="color:black">Sex: <p id="error"> * <?php echo $seErr; ?> </p></span></div>
 
 <div class="col-sm-2">
 <select name="sex">
 <option selected disabled>Select...</option>
	<option value="M">Male</option>
	<option value="F">Female</option>
</select>
</div>


</div>
<br>


 <br>
 
  <input type="submit" value="Submit">
 </form>
            
            
		</div>	
	</div>
	<p id="askregister">Don't have an account yet? <a id="myLink" href="#" onclick="register();return false;">Register</a></p>

</body>
</html>