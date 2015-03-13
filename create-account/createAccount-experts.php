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

			$app_id = test_input($_POST["applicant_id"]);

			if(strlen($app_id) > 0)
			{
				echo $app_id;

				$sql = "SELECT * from applicant where applicant_id = '$app_id'";
					$result = $conn->query($sql);

					if($result->num_rows > 0)
					{
						$row = $result->fetch_assoc();
						$username = $row['first_name'] . "." . $row['last_name'];
						$email = $row['first_name'] . "_" . $row['last_name'] . "@experts.com";
						$password = $row['last_name'] . "!";

						$sql = "INSERT INTO account(account_id, username, email, password, account_type) 
						VALUES ('$last_accId', '$username', '$email', '$password', '0')";
						$conn->query($sql);

						$sql = "UPDATE applicant SET account_id = '$last_accId' where applicant_id = '$app_id'";
						$conn->query($sql);
							
					}
					else
					{
						echo "No results";
					}
					

			}	



			$conn->close();	


		}

		?>


</body>
</html>