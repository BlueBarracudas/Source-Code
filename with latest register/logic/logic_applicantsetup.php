<?php
	
session_start();
  include '../MVC/controller.php';
			loadAll();
	$reply = "";


			$skErr = $scErr= $colErr = $couErr= $ceErr = $weErr = $jtErr = "";
    /* data related variables */
            $fnErr = $mnErr = $lnErr = $emErr = $pwErr = $seErr = $dErr = $msErr = $cnErr = $addErr = $natErr = $cpErr = "";
            $first_name = $middle_name = $last_name = $email = $address = $nationality = $conPass = $birthday = $contact_no =                   $marital_status = $sex = "";
            $isErr = FALSE;
            $last_appId = "";
            $last_accId = "";
            $app_id = "";
            $reply = "";
            $city = "";


		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			/* Get all form data */
			if (!empty($_POST["studentid"])) {
     			$last_appId = test_input($_POST["studentid"]);
   			}
 
			if (empty($_POST["fname"])) {
     			$fnErr = "First name is required";
     			$isErr = true;echo "fname";
   			} else {
     			$first_name = test_input($_POST["fname"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
       				$fnErr = "Only letters and white space allowed"; 
       				$isErr = true;echo "fname";
     			}
   			}	
      
          if(!empty($_POST['mname']))
          {   
     		$middle_name = test_input($_POST["mname"]);
     			if (!preg_match("/^[a-zA-Z ]*$/", $middle_name)) {
       				$mnErr = "Only letters and white space allowed"; 
       				$isErr = true;echo "mname";
     			}
          }
   	 			
			if (empty($_POST["lname"])) {
     			 $lnErr = "Last name is required";
     			$isErr = true;echo "lame";
   			} else {
     			$last_name = test_input($_POST["lname"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
       				$lnErr = "Only letters and white space allowed"; 
       				$isErr = true;echo "lname";
     			}
   			}
 
			if (empty($_POST["emailAdd"])) {
     			$emErr = "Email is required";
     			$isErr = true;echo "emailAdd";
   			} else {
     			$email = test_input($_POST["emailAdd"]);
     			// check if e-mail address is well-formed
     			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       				$emErr = "Invalid email format";
       				$isErr = true; echo "emailAdd";
     			}
     			if(emailExist($email) == true){
     				$emErr = "Email already exists";
     				$isErr = true;echo "emailAdd";
     			}
   			}
 
			if (empty($_POST["password"])) {
     			$pwErr = "Password is required";
     			$isErr = true;echo "password";
   			} else {
     			$password = test_input($_POST["password"]);
     				// check if name only contains letters and whitespace
     			if (preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $password)) {
       				$pwErr = "Password does not meet the requirements"; 
       				$isErr = true;echo "password";
     			}
   			}
 
   			if (empty($_POST["confirmPassword"])) {
     			$cpErr = "Confirm password is required";
     			$isErr = true;echo "confirmPassword";
   			} else {
     			$conPass = test_input($_POST["confirmPassword"]);
     				// check if name only contains letters and whitespace
     			if (preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/", $conPass)) {
       				$cpErr = "Password does not meet the requirements"; 
       				$isErr = true;echo "confirmPassword";
     			}
     			if(strcmp($conPass, $password) != 0)
     			{
     				$cpErr = "Password does not match";
     				$isErr = true;echo "confirmPassword";
     			}
   			}
 
			if (empty($_POST["sex"])) {
     			$seErr = "Sex field is empty";
     			$isErr = true;echo "sex";
   			} else{
   				$sex = test_input($_POST["sex"]);
   			}
 
   			if (empty($_POST["DOBYear"]) || empty($_POST["DOBMonth"]) || empty($_POST["DOBDay"]) ) {
     			$dErr = "One of the date fields are missing";
     			$isErr = true;echo "DOBYear";
   			} else{
   				$birthday = test_input($_POST["DOBYear"]) . "-" . test_input($_POST["DOBMonth"]) . "-" . test_input($_POST["DOBDay"]);
   			}
 
   			if (empty($_POST["Marital-Status"])) {
     			$msErr = "Marital Status is required";
     			$isErr = true;echo "Marital";
   			} else{
   				$marital_status = test_input($_POST["Marital-Status"]);
   			}
 
   			if (empty($_POST["cpnum"])) {
     			$cnErr = "Contact number is required";
     			$isErr = true;echo "cpnum";
   			} else{
   				$contact_no = test_input($_POST["cpnum"]);

   				if (!ctype_digit($contact_no)) {
       				$cnErr = "Only numbers are allowed"; 
       				$isErr = true;echo "cpnum";
   				}
			}
 
   			if (empty($_POST["address"])) {
     			$addErr = "Address is required";
     			$isErr = true;echo "address";
   			} else {
     			$address = test_input($_POST["address"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $address)) {
       				$addErr = "Only letters, numbers, white spaces, and commas are allowed"; 
       				$isErr = true;echo "address";
     			}
   			}
            if (empty($_POST["cityInput"])) {
     			$cityErr = "City is required";
     			$isErr = true;echo "cityInput";
   			} else {
     			$city = test_input($_POST["cityInput"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $city)) {
       				$cityErr = "Only letters, numbers, white spaces, and commas are allowed"; 
       				$isErr = true;echo "cityInput";
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
                
            }else{
                echo "bad";
            }
          	
			/* Initialize variables */
			$skills = $school = $college = $course = $certExams = "";
			$workExp = "";

			/*$target_dir = "files/resume/";

			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$file_type = pathinfo($target_file, PATHINFO_EXTENSION);
			$file_name = "resume_" . $ap->get_appid() .".".$file_type;
			$file_size = $_FILES["fileToUpload"]["size"];
			$img_file = $_FILES["fileToUpload"]["tmp_name"];*/

			$submitted = isset($_POST["submit"]);

			/*if($file_size < 0)
			{
				$isErr = true;
			}*/

			if(empty($_POST["skills"][0])){
				$skErr = "Need at least one skill";
				$isErr = true;echo "skills";
			} else {
				$cnt = 0;

				foreach($_POST["skills"] as $key => $temp_sk)
				{	
					if($cnt == 0) 
						$skills = test_input($temp_sk);
					else 
						$skills .= ", ". test_input($temp_sk) ;

					if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $skills)) {
       					$skErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       					$isErr = true;echo "skills";
     				}

     				$cnt++;
     			}

     			if($cnt == 0)
     			{
     				$skErr = "Skills is required";
					$isErr = true;echo "skills";
     			}
			}

			if(empty($_POST["jobtitle"][0])){
				$jtErr = "Need at least one job title";
				$isErr = true;echo "jobtitle";
			} else {
				$cnt = 0;

				foreach($_POST["jobtitle"] as $key => $temp_jt)
				{
					if($cnt == 0) 
						$jobtitle = test_input($temp_jt);
					else
						$jobtitle .= ", ". test_input($temp_jt);

					if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $jobtitle)) {
       					$jtErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       					$isErr = true;echo "jobtitle";
     				}

     				$cnt++;
     			}

     			if($cnt == 0)
     			{
     				$jtErr = "Job title is required";
					$isErr = true;echo "jobtitle";
     			}
			}

			if(empty($_POST["hschool"])){
				$scErr = "School is required";
				$isErr = true;echo "hschool1";
			} else {
				$school = test_input($_POST["hschool"]);
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $school)) {
       				$scErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;echo "hschool2";
     			}
			}

			if(empty($_POST["collegeInput"])){
				$colErr = "College is required";
				$isErr = true;echo "collegeInput";
			} else {
                if(strcmp($_POST['collegeInput'],"Other"))
                {
                    $college= test_input($_POST["collegeInput"]);
                    $college= test_input($_POST["collegeInput"]);
                }
                else
                {
                    $college= test_input($_POST["othercollege"]);
                    $college= test_input($_POST["othercollege"]);
                }
				
				if (!preg_match("/^[a-zA-Z0-9-(),. ]*$/", $college)) {
       				$colErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;echo "collegeInput1";
     			}
			}

			if(empty($_POST["collegeCourseInput"])){
				$couErr = "Course is required";
				$isErr = true;echo "collegeCourseInput";
			} else {
                 if(strcmp($_POST['collegeCourseInput'],"Other"))
                {
                    $course= test_input($_POST["collegeCourseInput"]);
                    $course = test_input($_POST["collegeCourseInput"]);
                }
                else
                {
                    $course= test_input($_POST["othercourse"]);
                    $course = test_input($_POST["othercourse"]);
                }
                
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $course)) {
       				$couErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;echo "collegeCourseInput";
     			}
			}
			if(!isset($_POST['certification'])){
				$ceErr = "Need at least one certification";
				$isErr = true;echo "certification1";
			} else {
				$cnt = 0;

				foreach($_POST["certification"] as $key => $temp_cert)
				{
					if($cnt == 0)
						$certExams = test_input($temp_cert);
					else
						$certExams .= ", ". test_input($temp_cert);

					if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $certExams)) {
       					$ceErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       					$isErr = true;echo "certification";
     				}

     				$cnt++;
     			}

     			if($cnt == 0)
     			{
     				$ceErr = "Certifications is required";
					$isErr = true;echo "certification";
     			}
			}

			if(empty($_POST["workExp"][0])){
				$weErr = "Work exp is required";
				$isErr = true;echo "workExp";
			} else {
				$cnt = 0;

				foreach($_POST["workExp"] as $key => $temp_we)
				{
					if($cnt == 0)
						$workExp = test_input($temp_we);
					else
						$workExp .= ", ". test_input($temp_we);

					if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $workExp)) {
       					$weErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       					$isErr = true;echo "workExp";
     				}

     				$cnt++;
     			}

     			if($cnt == 0)
     			{
     				$weErr = "Work exp is required";
					$isErr = true;echo "workExp";
     			}
			}
	
			/* INSERT DATA INTO DATABASE */
			if($isErr == false)
			{
                
                	/* Increment last Account ID */
                    $last_accId = (int) getLastAccId() + 1;
                    $last_accId = (string) $last_accId;

                    /* Increment last Applicant ID */
                    $last_appId = (int) getLastAppId() + 1;
                    $last_appId = (string) $last_appId;
                    
          
                
                        $email = $_SESSION['info']['0'];
                        $password  = $_SESSION['info']['1'];
                        $first_name  = $_SESSION['info']['2'];
                        $middle_name = $_SESSION['info']['3'];
                        $last_name = $_SESSION['info']['4'];
                        $birthday = $_SESSION['info']['5'];
                        $contact_no = $_SESSION['info']['6'];
                        $marital_status = $_SESSION['info']['7'];
                        $sex = $_SESSION['info']['8'];
                        $address = $_SESSION['info']['9'];
                        $city = $_SESSION['info']['10'];
                
                
				//$isOk = uploadResume($target_dir.$file_name, $file_type, $file_name, $file_size, $_FILES["fileToUpload"]["tmp_name"]);
				//if($isOk == true){
                    
                    createAccount($last_accId, $email, $password, '0');
    		        createApplicant($last_appId, $last_accId, $first_name, $middle_name, $last_name, $birthday, $contact_no, $marital_status, $sex, $address);
                
                    $applicant_id = $last_appId;
                
					createApplicantProfile(getLastApplicantProfileId()+1, $applicant_id, $school, $skills, $college, $course, $certExams, $workExp, $applicant_id."_resume.pdf");
					$reply = "Sucessfull in setting up profile!";

					//header('Refresh: 3; URL=applicant-home.php');	

				//}


			} else echo "Profile setup not successful.";
		}
			
?>