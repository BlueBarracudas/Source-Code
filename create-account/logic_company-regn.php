
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

			function getInfo()
			{
				echo "Hi ". $this->username . "!<br>";
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

			$ctErr = $emailErr = $pwErr = "";
			$company_type = $email = $username = "";
			$last_companyId = "";
			$last_accId = "";
			$isErr = false;
			$reply ="";

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$servername = "localhost";
			$dbuser = "root";
			$password = "1234";
			$dbName = "jobit";

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
			$sql = "SELECT MAX(company_id) as result FROM company";
			$result = $conn->query($sql);

			if($result->num_rows >0)
			{
				$row = $result->fetch_assoc();
					$last_companyId = $row['result'];
			}

			/* Increment last Account ID */
			$last_accId = (int) $last_accId + 1;
			$last_accId = (string) $last_accId;

			/* Increment last Applicant ID */
			$last_companyId = (int) $last_companyId + 1;
			$last_companyId = (string) $last_companyId;

			if (empty($_POST["email"])) {
     			$emailErr = "Email is required";
     			$isErr = true;
   			} else {
     			$email = test_input($_POST["email"]);
     			// check if e-mail address is well-formed
     			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       				$emailErr = "Invalid email format";
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

			if (empty($_POST["company_type"])) {
     			$ctErr = "Company type is required";
     			$isErr = true;
   			} else{
   				$company_type = test_input($_POST["company_type"]);
   			}


			if($isErr == false){

			/* INSERT DATA INTO DATABASE */

			/* INTO ACCOUNTS */
			$sql = "INSERT INTO account(account_id, email, password, account_type) 
			VALUES ('$last_accId', '$email', '$password', '2')";
			$conn->query($sql);


			/* INTO COMPANY */
			$sql = "INSERT INTO company(company_id, account_id, name, type) 
			VALUES ('$last_companyId', '$last_accId', '', '$company_type')";
			$conn->query($sql);

			$reply = "Hello, Welcome to Experts' Job IT.";
			header('Refresh: 3; URL=http://expertsacad.com/');	

			}

			$conn->close();	

			if($isErr == true)

			$reply = "Oops!";

		}

		?>