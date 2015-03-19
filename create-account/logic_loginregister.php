
		<?php

		$accounts = array();

		class account
		{
			public $account_id;
			public $email;
			private $password;
			public $account_type;

			function __construct($aId, $em, $pass, $ac)
			{
				$this->account_id = $aId;
				$this->email = $em;
				$this->password = $pass;
				$this->account_type = $ac;
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

		/* DB related variables */
		$servername = "localhost";
		$dbuser = "root";
		$password = "1234";
		$dbName = "jobit";

		/* data related variables */
		$fnErr = $mnErr = $lnErr = $emErr = $pwErr = $seErr = $dErr = $msErr = $cnErr = $addErr = $natErr = $cpErr = "";
		$first_name = $middle_name = $last_name = $email = $address = $nationality = $conPass = $birthday = $contact_no = $marital_status = $sex = "";
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
					$temp_acc = new account($row['account_id'], $row['email'], $row['password'], $row['account_type']);
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
			if (!empty($_POST["studentid"])) {
     			$last_appId = test_input($_POST["studentid"]);
   			}

			if (empty($_POST["fname"])) {
     			$fnErr = "First name is required";
     			$isErr = true;
   			} else {
     			$first_name = test_input($_POST["fname"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
       				$fnErr = "Only letters and white space allowed"; 
       				$isErr = true;
     			}
   			}	

     		$middle_name = test_input($_POST["mname"]);
     			if (!preg_match("/^[a-zA-Z ]*$/", $middle_name)) {
       				$mnErr = "Only letters and white space allowed"; 
       				$isErr = true;
     			}
   				
			if (empty($_POST["lname"])) {
     			 $lnErr = "Last name is required";
     			$isErr = true;
   			} else {
     			$last_name = test_input($_POST["lname"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
       				$lnErr = "Only letters and white space allowed"; 
       				$isErr = true;
     			}
   			}

			if (empty($_POST["emailAdd"])) {
     			$emErr = "Email is required";
     			$isErr = true;
   			} else {
     			$email = test_input($_POST["emailAdd"]);
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

   			if (empty($_POST["confirmPassword"])) {
     			$cpErr = "Confirm password is required";
     			$isErr = true;
   			} else {
     			$conPass = test_input($_POST["confirmPassword"]);
     				// check if name only contains letters and whitespace
     			if (preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $conPass)) {
       				$cpErr = "Password does not meet the requirements"; 
       				$isErr = true;
     			}

     			if(strcmp($conPass, $password) != 0)
     			{
     				$cpErr = "Password does not match";
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

   			if (empty($_POST["cpnum"])) {
     			$cnErr = "Contact number is required";
     			$isErr = true;
   			} else{
   				$contact_no = test_input($_POST["cpnum"]);

   				if (preg_match("/^[1-9][0-9]{0,15}$/", $contact_no)) {
       				$cnErr = "Only numbers are allowed"; 
       				$isErr = true;
   			}

   			if (empty($_POST["nationality"])) {
     			$natErr = "Nationality is required";
     			$isErr = true;
   			} else {
     			$nationality = test_input($_POST["nationality"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z ]*$/", $nationality)) {
       				$natErr = "Only letters and white space allowed"; 
       				$isErr = true;
     			}
   			}

   			if (empty($_POST["address"])) {
     			$addErr = "Address is required";
     			$isErr = true;
   			} else {
     			$address = test_input($_POST["address"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $address)) {
       				$addErr = "Only letters, numbers, white spaces, and commas are allowed"; 
       				$isErr = true;
     			}
   			}

   			if($isErr == false){

   			/* INSERT DATA INTO DATABASE */

			/* INTO ACCOUNTS */
			$sql = "INSERT INTO account(account_id, email, password, account_type) 
			VALUES ('$last_accId', '$email', '$password', '0')";
			if ($conn->query($sql) !== TRUE) {
    			echo "ERROR";
    		}

			/* INTO APPLICANTS */
			$sql = "INSERT INTO applicant(applicant_id, account_id, first_name, middle_name, last_name, birthday, contact_number, marital_status, sex, nationality, address, certificate_id) 
			VALUES ('$last_appId', '$last_accId', '$first_name', '$middle_name', '$last_name', '$birthday', '$contact_no', '$marital_status', '$sex', '$nationality', '$address', '12345')";
			if ($conn->query($sql) !== TRUE) {
    			echo "ERROR";
    		}

			/* Say hi */
			$reply = "<br>Hi " . $first_name . " " . $last_name . "! Thank you for registering in Experts' JobIT";
			header('Refresh: 3; URL=http://expertsacad.com/');	

   			}

   			if($isErr == true)
   				$reply = "Account not created, some requirements not met.";

			$conn->close();	
		}
	}

		?>