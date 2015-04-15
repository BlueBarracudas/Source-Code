<?php

class account
		{
			public $account_id;
			public $email;
			public $password;
			public $account_type;
			public $is_active;

			/* SETTERS */
			function set_accid($input)
			{
				$this->account_id = $input;
			}

			function set_email($input)
			{
				$this->email = $input;
			}

			function set_password($input)
			{
				$this->password = $input;
			}

			function set_acctype($input)
			{
				$this->account_type = $input;
			}

			/* GETTERS */
			function get_accid()
			{
				return $this->account_id;
			}

			function get_email()
			{
				return $this->email;
			}

			function get_password()
			{
				return $this->password;
			}

			function get_acctype()
			{
				return $this->account_type;
			}

		}

class applicant
		{
			public $account_id;
			public $applicant_id;
			public $first_name;
			public $middle_name;
			public $last_name;
			public $sex;
			public $birthday;
			public $marital_status;
			public $contact_no;
			public $address;
			public $city;
			public $profile;
			public $notif_type;

			/* SETTERS */

			function set_appid($input)
			{
				$this->applicant_id = $input;
			}

			function set_accid($input)
			{
				$this->account_id = $input;
			}

			function set_firstname($input)
			{
				$this->first_name = $input;
			}

			function set_middlename($input)
			{
				$this->middle_name = $input;
			}

			function set_lastname($input)
			{
				$this->last_name = $input;
			}

			function set_sex($input)
			{
				$this->sex = $input;
			}

			function set_birthday($input)
			{
				$this->birthday = $input;
			}

			function set_maritalstatus($input)
			{
				$this->password = $input;
			}

			function set_contactno($input)
			{
				$this->contact_no = $input;
			}

			function set_address($input)
			{
				$this->address = $input;
			}

			function set_city($input)
			{
				$this->city = $input;
			}

			function set_certificateid($input)
			{
				$this->certificate_id = $input;
			}

			function set_profile($input)
			{
				$this->profile = $input;
			}

			function set_notiftype($input)
			{
				$this->notif_type = $input;
			}


			/* GETTERS */

			function get_appid()
			{
				return $this->applicant_id;
			}

			function get_resume()
			{
				return $this->resume;
			}

			function get_accid()
			{
				return $this->account_id;
			}

			function get_firstname()
			{
				return $this->first_name;
			}

			function get_middlename()
			{
				return $this->middle_name;
			}

			function get_lastname()
			{
				return $this->last_name;
			}

			function get_sex()
			{
				return $this->sex;
			}

			function get_birthday()
			{
				return $this->birthday;
			}

			function get_maritalstatus()
			{
				return $this->password;
			}

			function get_contactno()
			{
				return $this->contact_no;
			}

			function get_address()
			{
				return $this->address;
			}

			function get_city()
			{
				return $this->nationality;
			}

			function get_certificateid()
			{
				return $this->certificate_id;
			}
			function get_profile()
			{
				return $this->profile();
			}
			function get_notiftype()
			{
				return $this->notif_type;
			}


		}

class company
{
	public $company_id;
	public $account_id;
	public $name;
	public $description;
	public $type;
	public $address;
	public $contact_no;
	public $company_img;

	function set_companyid($input)
	{
		$this->company_id = $input;
	}

	function set_accountid($input)
	{
		$this->account_id = $input;
	}

	function set_name($input)
	{
		$this->name= $input;
	}

	function set_description($input)
	{
		$this->description = $input;
	}

	function set_type($input)
	{
		$this->type = $input;
	}

	function set_address($input)
	{
		$this->address = $input;
	}

	function set_contactno($input)
	{
		$this->contact_no = $input;
	}

	function set_companyimg($input)
	{
		$this->company_img = $input;
	}

	function get_companyid()
	{
		return $this->company_id;
	}

	function get_accid()
	{
		return $this->account_id;
	}

	function get_name()
	{
		return $this->name;
	}

	function get_description()
	{
		return $this->description;
	}

	function get_type()
	{
		return $this->type;
	}

	function get_address()
	{
		return $this->address;
	}

	function get_contactno()
	{
		return $this->ccontact_no;
	}

	function get_companyimg()
	{
		return $this->company_img;
	}

}		

class applicantProfile
		{
			public $profile_id;
			public $applicant_id;
			public $skills;
			public $school;
			public $college;
			public $course;
			public $certExams;
			public $title;
			public $workExp;
			public $resume;

			function set_resume($input)
			{
				$this->resume = $input;
			}

			function set_profileid($input)
			{
				$this->profile_id = $input;
			}

			function set_applicantid($input)
			{
				$this->applicant_id = $input;
			}

			function set_skills($input)
			{
				$this->skills = $input;
			}

			function set_school($input)
			{
				$this->school = $input;
			}

			function set_college($input)
			{
				$this->college = $input;
			}

			function set_course($input)
			{
				$this->course = $input;
			}

			function set_certexams($input)
			{
				$this->certExams = $input;
			}

			function set_workexp($input)
			{
				$this->workExp = $input; 
			}

			function set_title($input)
			{
				$this->title = $input; 
			}

			function get_profileid()
			{
				return $this->profile_id;
			}

			function get_applicantid()
			{
				return $this->applicant_id;
			}

			function get_skills()
			{
				return $this->skills;
			}

			function get_school()
			{
				return $this->school;
			}

			function get_college()
			{
				return $this->college;
			}

			function get_course()
			{
				return $this->course;
			}

			function get_certexams()
			{
				return $this->certExams;
			}

			function get_workexp()
			{
				return $this->workExp;
			}

			function get_title()
			{
				return $this->title;
			}

			function get_resume()
			{
				return $this->resume;
			}
		
		}

class certificate
{
	private $certificate_id;
	private $certificate_name;
	private $applicant_id;
	private $competency;
	private $is_valid;

	function get_certificateid()
	{
		return $this->certificate_id;
	}

	function get_certificatename()
	{
		return $this->certificate_name;
	}

	function get_applicantid()
	{
		return $this->applicant_id;
	}

	function get_competency()
	{
		return $this->competency;
	}

	function get_isvalid()
	{
		return $this->is_valid;
	}

	/* setters */

	function set_certicateid($input)
	{
		$this->certificate_id = $input;
	}

	function set_certicatename($input)
	{
		$this->certificate_name = $input;
	}

	function set_applicantid($input)
	{
		$this->applicant_id = $input;
	}

	function set_competency($input)
	{
		$this->competency = $input;
	}

	function set_isvalid($input)
	{
		$this->is_valid = $input;
	}


}

class workexperience{

	private $workexperience_id;
	private $applicant_id;
	private $work_title;
	private $years;
	private $company_name;

	function get_workexperienceid()
	{
		return $this->workexperience_id;
	}

	function get_applicantid()
	{
		return $this->applicant_id;
	}

	function get_worktitle()
	{
		return $this->applicant_id;
	}

	function get_years()
	{
		return $this->years;
	}

	function get_companyname()
	{
		return $this->company_name;
	}

	/*Setters*/

	function set_workexperienceid($input)
	{
		$this->workexperience_id = $input;
	}

	function set_applicantid($input)
	{
		$this->applicant_id = $input;
	}

	function set_worktitle($input)
	{
		$this->work_title = $input;
	}

	function set_years($input)
	{
		$this->years = $input;
	}

	function set_companyname($input)
	{
		$this->company_name = $input;
	}


}

class skill{

	private $skill_id;
	private $applicant_id;
	private $name;

	function get_skillid()
	{
		return $this->skill_id;
	}

	function get_applicantid()
	{
		return $this->applicant_id;
	}

	function get_name()
	{
		return $this->name;
	}

	/* set */

	function set_skillid($input)
	{
		$this->skill_id = $input;
	}

	function set_applicantid($input)
	{
		$this->applicant_id = $input;
	}

	function set_name($input)
	{
		$this->name = $input;
	}


}

class joblisting{

	private $job_id;
	private $company_id;
	private $title;
	private $description;
	private $location;
	private $work_experience;
	private $salary;
	private $work_hours;
	private $slots_available;
	private $skill_tag;
	private $course_tag;
	private $joblist_pdf;

	function get_jobid()
	{
		return $this->job_id;
	}

	function get_companyid()
	{
		return $this->company_id;
	}

	function get_title()
	{
		return $this->title;
	}

	function get_description()
	{
		return $this->description;
	}

	function get_location()
	{
		return $this->location;
	}

	function get_workexperience()
	{
		return $this->work_experience;
	}

	function get_salary()
	{
		return $this->salary;
	}

	function get_workhours()
	{
		return $this->work_hours;
	}

	function get_slotsavailable()
	{
		return $this->slots_available;
	}

	function get_skilltag()
	{
		return $this->skill_tag;
	}

	function get_coursetag()
	{
		return $this->course_tag;
	}

	function get_pdf()
	{
		return $this->joblist_pdf;
	}

	/*Setters*/

	function set_jobid($input)
	{
		$this->job_id = $input;
	}

	function set_companyid($input)
	{
		$this->company_id = $input;
	}

	function set_title($input)
	{
		$this->title = $input;
	}

	function set_description($input)
	{
		$this->description = $input;
	}

	function set_location($input)
	{
		$this->location = $input;
	}

	function set_workexperience($input)
	{
		$this->work_experience = $input;
	}

	function set_salary($input)
	{
		$this->salary = $input;
	}

	function set_workhours($input)
	{
		$this->work_hours = $input;
	}

	function set_slotsavailable($input)
	{
		$this->slots_available = $input;
	}

	function set_skilltag($input)
	{
		$this->skill_tag = $input;
	}

	function set_coursetag($input)
	{
		$this->course_tag = $input;
	}

	function set_pdf($input)
	{
		$this->joblist_pdf = $input;
	}


}

class feedback{

	private $feedback_id;
	private $company_id;
	private $applicant_id;
	private $notes;
	private $decision;

	function get_feedbackid()
	{
		return $this->feedback_id;
	}

	function get_companyid()
	{
		return $this->company_id;
	}

	function get_applicantid()
	{
		return $this->applicant_id;
	}

	function get_notes()
	{
		return $this->notes;
	}

	function get_decision()
	{
		return $this->decision;
	}

	/* set */

	function set_feedbackid($input)
	{
		$this->feedback_id = $input;
	}

	function set_companyid($input)
	{
		$this->company_id = $input;
	}

	function set_applicantid($input)
	{
		$this->applicant_id = $input;
	}

	function set_notes($input)
	{
		$this->notes = $input;
	}

	function set_decision($input)
	{
		$this->decision = $input;
	}


}

class DBConnection
{
	private $servername;
	private	$dbuser;
	private	$password;
	private	$dbName;
	private $conn;

	function __construct()
	{
			$this->servername = "localhost";
			$this->dbuser = "root";
			$this->password = "1234";
			$this->dbName = "jobit";
			$this->conn = new mysqli($this->servername, $this->dbuser, $this->password, $this->dbName);
	}

	function getInstance()
	{
					/* Connect */
		if($this->conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
	
		}

		else return $this->conn;
	}

}

?>