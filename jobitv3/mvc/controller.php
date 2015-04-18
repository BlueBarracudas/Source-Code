<?php

	include 'model.php';

		$accounts = array();
		$applicants = array();
		$companies = array();
		$applicant_profiles = array();
		$certificates = array();
		$workexperiences = array();
		$skills = array();
		$joblistings = array();
		$feedbacks = array();

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
			loadCertificates();
			loadJobListings();
			loadWorkExperience();
			loadApplicantProfile();
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
					$temp_app->set_notiftype($row['notification_type']);
					$temp_app->set_city($row['city']);
					$temp_app->set_profile(getApplicantProfileById($row['applicant_id']));

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
					$temp_prof->set_certexams(getCertificatesById($row['applicant_id'])	);
					$temp_prof->set_workexp(getWorkExperienceById($row['applicant_id']));
					$temp_prof->set_resume($row['resume_pdf']);

					$applicant_profiles[count($applicant_profiles)] = $temp_prof;
				}
			}

			$connect->close();

		}

		function getApplicantProfileById($id)
		{
			global $applicant_profiles;

			for($i = 0; $i<count($applicant_profiles); $i++)
			{
				$temp_ap = $applicant_profiles[$i];
				if($id == $temp_ap->get_applicantid())
				{
					return $temp_ap;
				}
			}

			return null;
		}

		function getWorkExperienceById($id)
		{
			global $workexperiences;
			$we = array();

			for($i = 0; $i<count($workexperiences); $i++)
			{
				$temp_we = $workexperiences[$i];
				if($id == $temp_we->get_applicantid())
				{
					$we[count($we)] = $temp_we;
				}
			}

			return $we;
		}

		function getCertificatesById($id)
		{
			global $certificates;
			$cert = array();

			for($i = 0; $i<count($certificates); $i++)
			{
				$temp_c = $certificates[$i];
				if($id == $temp_c->get_applicantid())
				{
					$cert[count($cert)] = $temp_c;
				}
			}

			return $cert;
		}

		function getJobListingById($id)
		{
			global $joblistings;

			for($i = 0; $i<count($joblistings); $i++)
			{
				$temp_jl = $joblistings[$i];
				if($id == $temp_jl->get_jobid())
				{
					return $temp_jl;
				}
			}

			return null;
		}



		function getCompanyById($id)
		{
			global $companies;

			for($i = 0; $i<count($companies); $i++)
			{
				$temp_c = $companies[$i];
				if($id == $temp_c->get_companyid())
				{
					return $temp_c;
				}
			}

			return null;
		}

		function getCompanyIdByName($name)
		{
			global $companies;

			for($i = 0; $i<count($companies); $i++)
			{
				$temp_c = $companies[$i];
				//echo strtolower($temp_c->get_name()) . " " . strtolower($name) . "<br>";
				if(strpos(strtolower($temp_c->get_name()), strtolower($name)) !== false)
				{	
					return $temp_c->get_companyid();
				}
			}

			return null;
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

		function loadJobListings()
		{
			global $joblistings;
			$joblistings = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM joblisting";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp_jl = new joblisting();
					$temp_jl->set_jobid($row['job_id']);
					$temp_jl->set_companyid($row['company_id']);
					$temp_jl->set_title($row['title']);
					$temp_jl->set_description($row['description']);
					$temp_jl->set_location($row['location']);
					$temp_jl->set_workexperience($row['work_experience']);
					$temp_jl->set_salary($row['salary']);
					$temp_jl->set_workhours($row['work_hours']);
					$temp_jl->set_totalslots($row['total_slots']);
					$temp_jl->set_slotsavailable($row['slots_available']);
					$temp_jl->set_skilltag($row['skill_tag']);
					$temp_jl->set_coursetag($row['course_tag']);
					$temp_jl->set_pdf($row['joblist_pdf']);

					$joblistings[count($joblistings)] = $temp_jl;
				}
			}

			$connect->close();
		}

		function populateJobListings($results, $key)
		{
			$joblistings = $results;
			//echo "<h2 class=\"emptyMessage\"> Results for ".$key.": </h2>";
			for($i = 0; $i<count($joblistings); $i++)
			{
				$temp = $joblistings[$i];
				$company = getCompanyById($temp->get_companyid());

				echo "<div class=\"panel panel-default\" id=\"result2\">
		        <div class=\"panel-heading\">
		            <h3 class=\"panel-title\">".$company->get_name()." - ". $temp->get_title() ."</h3>
		        </div>

		        <div class=\"panel-body\">
		            <div class=\"row\">
		            	<div class=\"col-md-6\">
                            <div class=\"row\"><label class=\"col-md-6\">Location: </label> <label class=\"col-md-4 output-label\">".$temp->get_location()."</label> </div>
                            <div class=\"row\"><label class=\"col-md-6\">Course Required: </label> <label class=\"col-md-4 output-label\">".$temp->get_coursetag()."</label></div>
                            <div class=\"row\"><label class=\"col-md-6\">Total Slots: </label> <label class=\"col-md-4 output-label\">".$temp->get_totalslots()."</label></div>
                             <div class=\"row\"><label class=\"col-md-6\">Slots Available: </label> <label class=\"col-md-4 output-label\">".$temp->get_slotsavailable()."</label></div>
		            	</div>
		            	<div class=\"col-md-6 resultButtonCol\">
		            		<div class=\"col-md-6\">
		            			<a href=\"applicantViewJobListing.php?id=".$temp->get_jobid()."\"><input type=\"button\" class=\"btn btn-default btn-fill\" id=\"viewJobListing2\" name=\"viewJobListing2\" value=\"View Job Listing\"/></a>
		            		</div>
		            		<div class=\"col-md-6\">
		            			<input type=\"button\" class=\"btn btn-success btn-fill\" id=\"apply2\" name=\"apply2\" value=\"Apply\"/>
		            		</div>
		            	</div>
		            </div>
		        </div>

				</div>";

			}
		}

		function searchJobListingByKeyWord($key)
		{
			$searchResults = array();
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$cid = getCompanyIdByName($key);

			$sql = "SELECT * from joblisting 
			WHERE slots_available > 0 AND (title LIKE '%".$key."%' 
			OR location LIKE '%".$key."%' 
			OR work_experience LIKE '%".$key."%' 
			OR skill_tag LIKE '%".$key."%' 
			OR course_tag LIKE '%".$key."%'";

			if($cid != null)
				$sql .= " OR company_id LIKE '%".$cid."%')";
			else $sql .= ")";	

			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp_jl = new joblisting();
					$temp_jl->set_jobid($row['job_id']);
					$temp_jl->set_companyid($row['company_id']);
					$temp_jl->set_title($row['title']);
					$temp_jl->set_description($row['description']);
					$temp_jl->set_location($row['location']);
					$temp_jl->set_workexperience($row['work_experience']);
					$temp_jl->set_salary($row['salary']);
					$temp_jl->set_workhours($row['work_hours']);
					$temp_jl->set_totalslots($row['total_slots']);
					$temp_jl->set_slotsavailable($row['slots_available']);
					$temp_jl->set_skilltag($row['skill_tag']);
					$temp_jl->set_coursetag($row['course_tag']);
					$temp_jl->set_pdf($row['joblist_pdf']);

					$searchResults[count($searchResults)] = $temp_jl;
				}
			}

			$connect->close();	

			echo count($searchResults);

			return $searchResults;
		}

		function filteredSearchJobListing(array $request)
		{
			$searchResults = array();
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$by_company = $request["companyInput"];
			$by_position = $request["jobPositionInput"];
			$by_college = $request["collegeCourseInput"];
			$by_skills = $request["skillsInput"];
			$by_location = $request["locationInput"];

			$sql = "SELECT * from joblisting WHERE slots_available > 0 AND (";
			$conditions = array();

			if($by_company != "")
			{
				$cid = getCompanyIdByName($by_company);
				if($cid != null)
					$conditions[] = "company_id LIKE '%".$cid."%'";
			}

			if($by_position != "")
			{
				$conditions[] = "title LIKE '%".$by_position."%'"; 
			}

			if($by_college != "")
			{
				$conditions[] = "course_tag LIKE '%".$by_college."%'"; 
			}

			if($by_skills != "")
			{
				$conditions[] = "skill_tag LIKE '%".$by_skills."%'"; 
			}

			if($by_location != "")
			{
				$conditions[] = "location LIKE '%".$by_location."%'"; 
			}

			if(count($conditions) > 0) {
				$sql .= " WHERE " . implode (' OR ', $conditions);

				$sql .= ")";

			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp_jl = new joblisting();
					$temp_jl->set_jobid($row['job_id']);
					$temp_jl->set_companyid($row['company_id']);
					$temp_jl->set_title($row['title']);
					$temp_jl->set_description($row['description']);
					$temp_jl->set_location($row['location']);
					$temp_jl->set_workexperience($row['work_experience']);
					$temp_jl->set_salary($row['salary']);
					$temp_jl->set_workhours($row['work_hours']);
					$temp_jl->set_totalslots($row['total_slots']);
					$temp_jl->set_slotsavailable($row['slots_available']);
					$temp_jl->set_skilltag($row['skill_tag']);
					$temp_jl->set_coursetag($row['course_tag']);
					$temp_jl->set_pdf($row['joblist_pdf']);

					$searchResults[count($searchResults)] = $temp_jl;
				}
			}

			$connect->close();	

			return $searchResults;
		}
			return "";
		}

		function loadSkills()
		{
			global $skills;
			$skills = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM skill";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp_sk = new skill();
					$temp_sk->set_skillid($row['skill_id']);
					$temp_sk->set_applicantid($row['applicant_id']);
					$temp_sk->set_name($row['name']);

					$skills[count($skills)] = $temp_sk;
				}
			}

			$connect->close();



		}

		function loadWorkExperience()
		{
			global $workexperiences;
			$workexperiences = null;
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM work_experience";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp_we = new workexperience();
					$temp_we->set_workexperienceid($row['work_experience_id']);
					$temp_we->set_applicantid($row['applicant_id']);
					$temp_we->set_worktitle($row['work_title']);
					$temp_we->set_years($row['years']);
					$temp_we->set_companyname($row['company_name']);

					$workexperiences[count($workexperiences)] = $temp_we;
					
				}
			}

			$connect->close();

		}

		function loadCertificates()
		{
			global $certificates;
			$certificates = null;

			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM certificate";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp_ce = new certificate();
					$temp_ce->set_certificateid($row['certificate_id']);
					$temp_ce->set_certificatename($row['certificate_name']);
					$temp_ce->set_applicantid($row['applicant_id']);
					$temp_ce->set_competency($row['competency']);
					$temp_ce->set_isvalid($row['is_valid']);

					$certificates[count($certificates)] = $temp_ce;
					
				}
			}

			$connect->close();
		}

		function loadFeedbacks()
		{
			global $feedbacks;
			$feedbacks = null;
				$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "SELECT * FROM feedback";
			$result = $connect->query($sql);

			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$temp_f = new feedback();
					$temp_f->set_feedbackid($row['feedback_id']);
					$temp_f->set_companyid($row['company_id']);
					$temp_f->set_applicantid($row['applicant_id']);
					$temp_f->set_notes($row['notes']);
					$temp_f->set_decision($row['decision']);
					
					$feedbacks[count($feedbacks)] = $temp_f;
					
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

			$sql = "INSERT INTO applicant(applicant_id, account_id, first_name, middle_name, last_name, birthday, contact_number, marital_status, sex, address, city, notification_type) 
			VALUES ('$apid', '$acid', '$fn', '$mn', '$ln', '$bd', '$cn', '$ms', '$se', '$add', 'Manila', '1')";
			
			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadApplicants();

    		$connect->close();
		}

		function createJobListing($jid, $cid, $t, $desc, $loc, $we, $sal, $wh, $sa, $st, $ct, $pdf)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO joblisting(job_id, company_id, title, description, location, work_experience, salary, work_hours, slots_available, skill_tag, course_tag, joblist_pdf) 
			VALUES ('$jid', '$cid', '$t', '$desc', '$loc', '$we', '$sal', '$wh', '$sa', '$st', '$ct', '$pdf')";

			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadJobListings();

    		$connect->close();

		}

		function createSkill($sid, $aid, $n)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO skill(skill_id, applicant_id, name) 
			VALUES ('$sid', '$aid', '$n')";

			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadSkills();

    		$connect->close();

		}

		function createWorkExperience($weid, $aid, $wt, $y, $cn)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO work_experience(work_experience_id, applicant_id, work_title, years, company_name) 
			VALUES ('$weid', '$aid', '$wt', '$y', '$cn')";

			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadWorkExperience();

    		$connect->close();
		}

		function createCertificate($cid, $cn, $aid, $c, $iv)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO certificate(certificate_id, certificate_name, applicant_id, competency, is_valid) 
			VALUES ('$cid', '$cn', '$aid', '$c', '$iv')";

			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadCertificates();

    		$connect->close();
		}

		function createFeedback($fid, $cid, $aid, $n, $d)
		{
			$connect= new DBConnection();
			$connect = $connect->getInstance();

			$sql = "INSERT INTO feedback(feedback_id, company_id, applicant_id, notes, decision) 
			VALUES ('$fid', '$cid', '$aid', '$n', '$d')";

			if ($connect->query($sql) !== TRUE) {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
    		} else loadFeedbacks();

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