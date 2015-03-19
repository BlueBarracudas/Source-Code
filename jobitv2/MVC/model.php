<?php

class account
		{
			public $account_id;
			public $email;
			public $password;
			public $account_type;

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
			public $nationality;
			public $certificate_id;

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

			function set_nationality($input)
			{
				$this->nationality = $input;
			}

			function set_certificateid($input)
			{
				$this->certificate_id = $input;
			}

			/* GETTERS */

			function get_appid()
			{
				return $this->applicant_id;
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

			function get_nationality()
			{
				return $this->nationality;
			}

			function get_certificateid()
			{
				return $this->certificate_id;
			}



		}

class company
{
	public $company_id;
	public $account_id;
	public $name;
	public $description;
	public $type;

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