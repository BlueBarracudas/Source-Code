<?php

	include 'model.php';

		$accounts = array();
		$applicants = array();
		$companies = array();

		function test_input($data) {
   			$data = trim($data);
   			$data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}

		function emailExist($inputEmail)
		{
			global $accounts;

			for($i = 0; $i<count($accounts); $i++)
			{
				if(strcmp($inputEmail, $accounts[$i]->email) == 0)
				{
					return true;
				}
			}

			return false;
		}

		function loadAll()
		{
			loadAccounts();
			loadCompanies();
			loadApplicants();
		}

		function verify($email, $password)
		{
			global $accounts;

			$acc;

			for($i = 0; $i<count($accounts); $i++)
			{
				$temp_email = $accounts[$i]->email;
				$temp_pass = $accounts[$i]->password;

				if(strcmp($temp_email, $email) == 0 && strcmp($temp_pass, $password) == 0)
				{
					return $accounts[$i];
				}

			}

				return null;
		}

		function loadLoginData()
		{
			if(isset($_SESSION["username"]))
			{
				global $username;
				$username = $_SESSION["username"];
			}
		}

		function loadAccounts()
		{
			global $accounts;
			$accounts = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM account";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{	
				while($row = $result->fetch_assoc())
				{
					$temp_acc = new account();
					$temp_acc->set_accid($row['account_id']);
					$temp_acc->set_email($row['email']);
					$temp_acc->set_password($row['password']);
					$temp_acc->set_acctype($row['account_type']);

					$accounts[count($accounts)] = $temp_acc;
				}	


			}else echo "0 results";

				$connect->close();
		}

		function getLoggedInAccount($account_id)
		{
			global $accounts;

			$acc = null;

			for($i = 0; $i<count($accounts); $i++)
			{
				$temp_accid = $accounts[$i]->getaccid();

				if(strcmp($temp_accid, $account_id) == 0)
				{
					$acc = $accounts[$i];
				}

			}

			return $acc;
		}

		function getLoggedInApplicant($account_id)
		{
			global $applicants;

			$app = null;

			for($i = 0; $i<count($applicants); $i++)
			{
				$temp_accid = $applicants[$i]->get_accid();

				if(strcmp($temp_accid, $account_id) == 0)
				{
					$app = $applicants[$i];
				}

			}

			return $app;
		}

		function loadApplicants()
		{
			global $applicants;
			$applicants = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM applicant";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{	
				while($row = $result->fetch_assoc())
				{
					$temp_app = new applicant();
					$temp_app->set_appid($row['applicant_id']);
					$temp_app->set_accid($row['account_id']);
					$temp_app->set_firstname($row['first_name']);
					$temp_app->set_middlename($row['middle_name']);
					$temp_app->set_lastname($row['last_name']);
					$temp_app->set_sex($row['sex']);
					$temp_app->set_address($row['address']);
					$temp_app->set_birthday($row['birthday']);
					$temp_app->set_maritalstatus($row['marital_status']);
					$temp_app->set_contactno($row['contact_number']);
					$temp_app->set_nationality($row['nationality']);
					$temp_app->set_certificateid($row['certificate_id']);

					$applicants[count($applicants)] = $temp_app;
				}
			} else echo "0 results";

			$connect->close();
		}

		function loadCompanies()
		{
			global $companies;
			$companies = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM company";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp_comp = new company();
					$temp_comp->set_companyid($row['company_id']);
					$temp_comp->set_accountid($row['account_id']);
					$temp_comp->set_name($row['name']);
					$temp_comp->set_description($row['description']);
					$temp_comp->set_type($row['type']);

					$companies[count($companies)] = $temp_comp;
				}

			} else echo "0 results";

			$connect->close();


		}

		function getLastAccId()
		{
			$id = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT MAX(account_id) as result FROM account";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$id = $row['result'];
			}

			return $id;

			$connect->close();
		}

		function getLastAppId()
		{
			$id = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT MAX(applicant_id) as result FROM applicant";
			$result = $connect->query($sql);
			
			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$id = $row['result'];
			}

			return $id;

			$connect->close();
		}

		function getLastCompanyId()
		{
			$id = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT MAX(company_id) as result FROM company";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				$row = $result->fetch_assoc();
				$id = $row['result'];
			}

			return $id;

			$connect->close();
		}

		function createAccount($id, $em, $pw, $type)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO account(account_id, email, password, account_type) 
			VALUES ('$id', '$em', '$pw', '$type')";
			
			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    		} else loadAccounts();

    		$connect->close();

		}

		function createApplicant($apid, $acid, $fn, $mn, $ln, $bd, $cn, $ms, $se, $nat, $add, $cid)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO applicant(applicant_id, account_id, first_name, middle_name, last_name, birthday, contact_number, marital_status, sex, nationality, address, certificate_id) 
			VALUES ('$apid', '$acid', '$fn', '$mn', '$ln', '$bd', '$cn', '$ms', '$se', '$nat', '$add', '12345')";
			
			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    		} else loadApplicants();

    		$connect->close();
		}

		function createCompany($cid, $aid, $n, $d, $t)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO company(company_id, account_id, name, description, type) 
			VALUES ('$cid', '$aid', '$n', '$d', '$t')";

			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadCompanies();

    		$connect->close();

		}


?>