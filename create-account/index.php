<html>
	<head>
		<title> Job IT | Create applicant account</title>
		<link rel="stylesheet" type="text/css" href="style.css">

		<style>	
			.error {color: #FF0000;}
		</style>

	</head>

	<body>

	<?php

		$accounts = array();

		class account
		{
			public $account_id;
			public $username;
			public $email;
			private $password;
			public $account_type;

			function __construct($aId, $un, $em, $pass, $ac)
			{
				$this->account_id = $aId;
				$this->username = $un;
				$this->email = $em;
				$this->password = $pass;
				$this->account_type = $ac;
			}

			function getInfo()
			{
				echo "Hi ". $this->username . "!<br>";
			}
		}

		class applicant
		{
			public $first_name;
			public $middle_name;
			public $last_name;
			public $email;
			public $username;
			public $password;
			public $sex;
			public $birthday;
			public $marital_status;
			public $contact_no;

			function __construct($fN, $mN, $lN, $em, $uN, $pw, $se, $bday, $ms, $cN)
			{
				$this->first_name = $fN;
				$this->middle_name = $mN;
				$this->last_name = $lN;
				$this->email = $em;
				$this->username = $uN;
				$this->password = $pw;
				$this->sex = $se;
				$this->birthday = $bday;
				$this->marital_status = $ms;
				$this->contact_no = $cN;
			}
		}

		function test_input($data) {
   			$data = trim($data);
   			$data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}

		function emailExist($accounts, $inputEmail)
		{
			$toReturn = false;
			for($i = 0; $i<count($accounts); $i++)
			{
				if($inputEmail == $accounts[$i]->email)
				{
					$toReturn = true;
				}
			}

			return $toReturn;
		}

		function usernameExist($accounts, $inputUsername)
		{
			$toReturn = false;
			for($i = 0; $i<count($accounts); $i++)
			{
				if($inputUsername == $accounts[$i]->username)
				{
					$toReturn = true;
				}
			}

			return $toReturn;
		}


		/* DB related variables */
		$servername = "localhost";
		$dbuser = "root";
		$password = "1234";
		$dbName = "jobit";

		/* data related variables */
		$fnErr = $mnErr = $lnErr = $emErr = $unErr = $pwErr = $seErr = $dErr = $msErr = $cnErr = "";
		$first_name = $middle_name = $last_name = $email = $username = $birthday = $contact_no = $marital_status = $sex = "";
		$isErr = false;
		$last_appId = "";
		$last_accId = "";
		$app_id = "";
		$reply = "";


		if($_SERVER["REQUEST_METHOD"] == "POST")
		{	
	
			$conn = new mysqli($servername, $dbuser, $password, $dbName);

			/* Connect */
			if($conn->connect_error){
				die("Connection failed: " . $conn->connect_error);
	
			}
			

			$sql = "SELECT * FROM account";
			$result = $conn->query($sql);

			if($result->num_rows > 0)
			{	
				while($row = $result->fetch_assoc())
				{
					$temp_acc = new account($row['account_id'], $row['username'], $row['email'], $row['password'], $row['account_type']);
					$accounts[count($accounts)] = $temp_acc;
				}
			} else {
				echo "0 Results";
			}


			/* Get last account id */
			$sql = "SELECT MAX(account_id) as result FROM account";
			$result = $conn->query($sql);

			if($result->num_rows >0)
			{
				$row = $result->fetch_assoc();
					$last_accId = $row['result'];
			}

			/* Get last applicant id */
			$sql = "SELECT MAX(applicant_id) as result FROM applicant";
			$result = $conn->query($sql);

			if($result->num_rows >0)
			{
				$row = $result->fetch_assoc();
					$last_appId = $row['result'];
			}

			/* Increment last Account ID */
			$last_accId = (int) $last_accId + 1;
			$last_accId = (string) $last_accId;

			/* Increment last Applicant ID */
			$last_appId = (int) $last_appId + 1;
			$last_appId = (string) $last_appId;

			/* Get all form data */
			if (empty($_POST["first_name"])) {
     			$fnErr = "First name is required";
     			$isErr = true;
   			} else {
     			$first_name = test_input($_POST["first_name"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
       				$fnErr = "Only letters and white space allowed"; 
       				$isErr = true;
     			}
   			}	

   			if (empty($_POST["middle_name"])) {
     			$middle_name = test_input($_POST["middle_name"]);
     		}	// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z ]*$/", $middle_name)) {
       				$mnErr = "Only letters and white space allowed"; 
       				$isErr = true;
     			}
   				
			if (empty($_POST["last_name"])) {
     			 $lnErr = "Last name is required";
     			$isErr = true;
   			} else {
     			$last_name = test_input($_POST["last_name"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
       				$lnErr = "Only letters and white space allowed"; 
       				$isErr = true;
     			}
   			}

			if (empty($_POST["email"])) {
     			$emErr = "Email is required";
     			$isErr = true;
   			} else {
     			$email = test_input($_POST["email"]);
     			// check if e-mail address is well-formed
     			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       				$emErr = "Invalid email format";
       				$isErr = true; 
     			}
     			if(emailExist($accounts, $email) == true){
     				$emErr = "Email already exists";
     				$isErr = true;
     			}
   			}


			if (empty($_POST["username"])) {
     			$unErr = "Username is required";
     			$isErr = true;
   			} else {
     			$username = test_input($_POST["username"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-z\d_.]{2,20}$/i", $username)) {
       				$unErr = "Only letters, period and underscore is allowed"; 
       				$isErr = true;
     			}
     			if(userNameExist($accounts, $username) == true){
     				$unErr = "Username already exists";
     				$isErr = true;
     			}
   			}

			if (empty($_POST["password"])) {
     			$pwErr = "Password is required";
     			$isErr = true;
   			} else {
     			$password = test_input($_POST["password"]);
     				// check if name only contains letters and whitespace
     			if (preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)) {
       				$pwErr = "Password does not meet the requirements"; 
       				$isErr = true;
     			}
   			}

			if (empty($_POST["sex"])) {
     			$seErr = "Sex field is empty";
     			$isErr = true;
   			} else{
   				$sex = test_input($_POST["sex"]);
   			}


   			if (empty($_POST["DOBYear"]) || empty($_POST["DOBMonth"]) || empty($_POST["DOBDay"]) ) {
     			$dErr = "One of the date fields are missing";
     			$isErr = true;
   			} else{
   				$birthday = test_input($_POST["DOBYear"]) . "-" . test_input($_POST["DOBMonth"]) . "-" . test_input($_POST["DOBDay"]);
   			}

   			if (empty($_POST["Marital-Status"])) {
     			$msErr = "Marital Status is required";
     			$isErr = true;
   			} else{
   				$marital_status = test_input($_POST["Marital-Status"]);
   			}

   			if (empty($_POST["contact_no"])) {
     			$cnErr = "Contact number is required";
     			$isErr = true;
   			} else{
   				$contact_no = test_input($_POST["contact_no"]);

   				if (preg_match("/^[1-9][0-9]{0,15}$/", $contact_no)) {
       				$cnErr = "Only numbers are allowed"; 
       				$isErr = true;
   			}
				

   			if($isErr == false){

   			/* INSERT DATA INTO DATABASE */

			/* INTO ACCOUNTS */
			$sql = "INSERT INTO account(account_id, username, email, password, account_type) 
			VALUES ('$last_accId', '$username', '$email', '$password', '0')";
			$conn->query($sql);

			/* INTO APPLICANTS */
			$sql = "INSERT INTO applicant(applicant_id, account_id, first_name, middle_name, last_name, birthday, contact_number, marital_status, sex, certificate_id) 
			VALUES ('$last_appId', '$last_accId', '$first_name', '$middle_name', '$last_name', '$birthday', '$contact_no', '$marital_status', '$sex', '12345')";
			$conn->query($sql);

			/* Say hi */
			$reply = "<br>Hi " . $first_name . " " . $last_name . "! Thank you for registering in Experts' JobIT";	

   			}

   			if($isErr == true)
   				$reply = "Account not created, some requirements not met.";

			$conn->close();	
		}
	}

		?>

		<div id="main">
			<h1>Job IT | Create applicant account</h1>
			<h2> <?php echo $reply; ?> </h2>
		<div id="login">
			<h2>Enter details below</h2>
			<hr/>
			<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<p> * required field </p><br><br>
					<label> First name: <p> * <?php echo $fnErr; ?> </p> </label>
						<input type="text" name = "first_name" placeholder ="First name"/>  <br> 
					<label> Middle name: <p> <?php echo $mnErr; ?> </p> </label>
						<input type="text" name = "middle_name" placeholder ="Middle name"/><br>
					<label> Last name: <p> * <?php echo $lnErr; ?> </p> </label>
						<input type="text" name = "last_name" placeholder ="Last name"/><br>
					<label> Email: <p> * <?php echo $emErr; ?>  </p> </label>
						<input type="email" name ="email" placeholder ="Email address"/><br>
					<label> Username:  <p> * <?php echo $unErr; ?>  </p> </label>
						<input type="text" name ="username" placeholder ="Username"/><br>
					<label> Password: <p> * <?php echo $pwErr;?>  </p> </label>
						<input type="password" name ="password" placeholder = "**********"/><br><br>
			<label> Sex: </label>
			<input type="radio" name="sex" value="M">Male 
			<input type="radio" name="sex" value="F">Female<br><br>


	Birthday: <p> * <?php echo $dErr; ?> </p> <br>
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

<br>Marital Status: <p> * <?php echo $msErr; ?> </p>
<select name="Marital-Status">
	<option> ------ </option>
	<option value="Single">Single</option>
	<option value="Married">Married</option>
	<option value="Widowed">Widowed</option>
	<option value="Divorced">Divorced</option>
</select>

<br>
Contact number: <p> * <?php echo $cnErr; ?> </p><input type="text" name ="contact_no" placeholder ="Contact number"/><br><br>

 <input type="submit" value="Submit">
</form>

				</form>
		</div>

		</div>

	</body>

</html>