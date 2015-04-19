<?php

	include '/MVC/controller.php';
    session_start();
  loadAll();

		/* data related variables */
		$fnErr = $mnErr = $lnErr = $emErr = $pwErr = $seErr = $dErr = $msErr = $cnErr = $addErr = $natErr = $cpErr = "";
		$first_name = $middle_name = $last_name = $email = $address = $nationality = $conPass = $birthday = $contact_no = $marital_status = $sex = "";
		$isErr = false;
		$last_appId = "";
		$last_accId = "";
		$app_id = "";
		$reply = "";
        $city = "";


		if($_SERVER["REQUEST_METHOD"] == "POST")
		{	

			/* Increment last Account ID */
			$last_accId = (int) getLastAccId() + 1;
			$last_accId = (string) $last_accId;

			/* Increment last Applicant ID */
			$last_appId = (int) getLastAppId() + 1;
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
      
      if(!empty($_POST['mname']))
      {   
     		$middle_name = test_input($_POST["mname"]);
     			if (!preg_match("/^[a-zA-Z ]*$/", $middle_name)) {
       				$mnErr = "Only letters and white space allowed"; 
       				$isErr = true;
     			}
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
     			if(emailExist($email) == true){
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
            if(strlen($password) < 8 || strlen($password) > 16)
              $pwErr = "Password too long or too short";
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

   				if (!ctype_digit($contact_no)) {
       				$cnErr = "Only numbers are allowed"; 
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
            if (empty($_POST["cityInput"])) {
     			$cityErr = "City is required";
     			$isErr = true;
   			} else {
     			$city = test_input($_POST["cityInput"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $city)) {
       				$cityErr = "Only letters, numbers, white spaces, and commas are allowed"; 
       				$isErr = true;
     			}
   			}

   			if($isErr == false){
                $info = array();
                
                $info[0] = $email;
                $info[1] = $password;
                $info[2] = $first_name;
                $info[3] = $middle_name;
                $info[4] = $last_name;
                $info[5] = $birthday;
                $info[6] = $contact_no;
                $info[7] = $marital_status;
                $info[8] = $sex;
                $info[9] = $address;
                $info[10] = $city;
                
                $_SESSION['info'] = $info;
       
                header('Refresh: 1; URL=applicant-setup.php');
            }
            /*
    		createAccount($last_accId, $email, $password, '0');
    		createApplicant($last_appId, $last_accId, $first_name, $middle_name, $last_name, $birthday, $contact_no, $marital_status, $sex, $address);

			   $reply = "<br>Hi " . $first_name . " " . $last_name . "! Thank you for registering in Experts' JobIT";
			   //header('Refresh: 3; URL=main-login.php');	

   			}

   			if($isErr == true)
   				$reply = "Account not created, some requirements not met.";
                */
		  }
	

		?>