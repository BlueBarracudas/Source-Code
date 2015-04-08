
	<?php

			$ctErr = $emailErr = $pwErr = "";
			$email = $username = "";
			$last_companyId = "";
			$last_accId = "";
			$isErr = false;
			$reply ="";

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			
			/* Increment last Account ID */
			$last_accId = (int) getLastAccId() + 1;
			$last_accId = (string) $last_accId;

			/* Increment last Applicant ID */
			$last_companyId = (int) getLastCompanyId() + 1;
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

			createAccount($last_accId, $email, $password, '2');
			createCompany($last_companyId, $last_accId, "", "", $company_type);
			
			$reply = $email . " has been registered.";

			}

			if($isErr == true) 
				$reply = "Oops!";

		}

		?>