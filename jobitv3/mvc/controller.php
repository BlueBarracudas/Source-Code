<?php

	include 'model.php';

		$accounts = array();
		$applicants = array();
		$companies = array();
		$applicant_profiles = array();

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
			loadApplicantProfile();
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
				$temp_accid = $accounts[$i]->get_accid();

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

					$applicants[count($applicants)] = $temp_app;
				}
			}

			$connect->close();
		}

		function loadApplicantProfile()
		{
			global $applicant_profiles;
			$applicant_profiles = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM applicantprofile";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{	
				while($row = $result->fetch_assoc())
				{
					$temp_prof = new applicantProfile();
					$temp_prof->set_profileid($row['applicant_profile_id']);
					$temp_prof->set_applicantid($row['applicant_id']);
					$temp_prof->set_skills($row['skills']);
					$temp_prof->set_school($row['HS_name']);
					$temp_prof->set_college($row['college_name']);
					$temp_prof->set_course($row['course']);
					$temp_prof->set_certexams($row['certificates']);
					$temp_prof->set_title($row['jobtitle']);
					$temp_prof->set_workexp($row['work_experience']);
					$temp_prof->set_resume($row['resume_pdf']);

					$applicant_profiles[count($applicant_profiles)] = $temp_prof;
				}
			}

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
					$temp_comp->set_address($row['address']);
					$temp_comp->set_contactno($row['contact_no']);
					$temp_comp->set_companyimg($row['company_img']);

					$companies[count($companies)] = $temp_comp;
				}

			}

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

		function getLastApplicantProfileId()
		{
			$id = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT MAX(applicant_profile_id) as result FROM applicantprofile";
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
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadAccounts();

    		$connect->close();

		}

		function createApplicant($apid, $acid, $fn, $mn, $ln, $bd, $cn, $ms, $se, $add)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO applicant(applicant_id, account_id, first_name, middle_name, last_name, birthday, contact_number, marital_status, sex, address) 
			VALUES ('$apid', '$acid', '$fn', '$mn', '$ln', '$bd', '$cn', '$ms', '$se', '$add')";
			
			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadApplicants();

    		$connect->close();
		}

		function createCompany($cid, $aid)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO company(company_id, account_id) 
			VALUES ('$cid', '$aid')";

			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadCompanies();

    		$connect->close();

		}

		function createApplicantProfile($prid, $apid, $sk, $sc, $col, $cou, $cer, $jt, $we, $file)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO applicantprofile(applicant_profile_id, applicant_id, skills, HS_name, college_name, course, certificates, jobtitle, work_experience, resume_pdf) 
			VALUES ('$prid', '$apid', '$sk', '$sc', '$col', '$cou', '$cer', '$jt', '$we', '$file');";

				if ($connect->query($sql) !== TRUE) {
    				echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    			} else loadApplicants();


    		$connect->close();

		}

		function applicantProfileExists($apid)
		{
			global $applicant_profiles;

			for($i = 0; $i<count($applicant_profiles); $i++)
			{
				$temp_ap = $applicant_profiles[$i];

				if($apid == $temp_ap->get_applicantid())
				{
					return true;
				}
			}

			return false;

		}

		function updateCompanyProfile($acc_id, $name, $desc, $add, $cn, $img)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "UPDATE company SET name='". $name ."', description='" . $desc . "', address='" . $add . "', contact_no='" . $cn . "', company_img='" . $img . "' WHERE account_id='" . $acc_id . "'"; 
			
			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadCompanies();
		}

function uploadResume($directory, $file_type, $file_name, $file_size, $file)
{
	$uploadOk = 1;

	if($file_size > 500000000)
	{	
		echo "File too large.";
		$uploadOk = 0;
	}

	if($file_type != "pdf") {
    		echo "Sorry, only PDF files are allowed.";
   		 $uploadOk = 0;
	}

	if($uploadOk == 0)
	{
		echo "File not uploaded.";
		return false;
	} else {
		if(move_uploaded_file($file, $directory))
		{
			echo "File successfully uploaded";
			return true;
		} 
		else 
		{
			echo "Error occured";
			return false;
		}
	}


}	

function changePassword($account_id, $new_password)
{
	$connect= new DBConnection();
	$connect = $connect->getInstance();

	$sql = "UPDATE account SET password='" . $new_password . "' WHERE account_id='" . $account_id . "'"; 

	if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    } else echo "Successfully changed password!";
}	

function deactivateAccount($account_id)
{
	$connect= new DBConnection();
	$connect = $connect->getInstance();

	$sql = "UPDATE account SET isactive='0' WHERE account_id='" . $account_id . "'"; 

		if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    } else echo "Successfully deactivated account!";
}


?>