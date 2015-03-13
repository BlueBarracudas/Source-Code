<!DOCTYPE html>
<html>
<body>

<?php

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

		function test_input($data) {
   			$data = trim($data);
   			$data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$servername = "localhost";
			$dbuser = "root";
			$password = "1234";
			$dbName = "jobit";


			$first_name = $middle_name = $last_name = $email = $username = $birthday = $contact_no = $marital_status = $sex = "";
			$last_appId = "";
			$last_accId = "";
			$app_id = "";

			$conn = new mysqli($servername, $dbuser, $password, $dbName);

			/* Connect */
			if($conn->connect_error){
				die("Connection failed: " . $conn->connect_error);
	
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
			$first_name = test_input($_POST["first_name"]);
			$middle_name = test_input($_POST["middle_name"]);
			$last_name = test_input($_POST["last_name"]);
			$email = test_input($_POST["email"]);
			$username = test_input($_POST["username"]);
			$password = test_input($_POST["password"]);
			$sex = test_input($_POST["sex"]);
			$birthday = test_input($_POST["DOBYear"]) . "-" . test_input($_POST["DOBMonth"]) . "-" . test_input($_POST["DOBDay"]);
			$marital_status = test_input($_POST["Marital-Status"]);
			$contact_no = test_input($_POST["contact_no"]);

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
			echo "<br>Hi " . $first_name . " " . $last_name . "! Thank you for registering in Experts' JobIT";	


			}


			$conn->close();	

		?>


</body>
</html>