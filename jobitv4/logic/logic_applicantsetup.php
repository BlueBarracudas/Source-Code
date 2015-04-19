<?php
	


	$reply = "";


			$skErr = $scErr= $colErr = $couErr= $ceErr = $weErr = $jtErr = "";
			$isErr = false;

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
				include '../MVC/controller.php';
			loadAll();	
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
				$isErr = true;
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
       					$isErr = true;
     				}

     				$cnt++;
     			}

     			if($cnt == 0)
     			{
     				$skErr = "Skills is required";
					$isErr = true;
     			}
			}

			if(empty($_POST["jobtitle"][0])){
				$jtErr = "Need at least one job title";
				$isErr = true;
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
       					$isErr = true;
     				}

     				$cnt++;
     			}

     			if($cnt == 0)
     			{
     				$jtErr = "Job title is required";
					$isErr = true;
     			}
			}

			if(empty($_POST["hschool"])){
				$scErr = "School is required";
				$isErr = true;
			} else {
				$school = test_input($_POST["hschool"]);
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $school)) {
       				$scErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;
     			}
			}

			if(empty($_POST["college"])){
				$colErr = "College is required";
				$isErr = true;
			} else {
				$college= test_input($_POST["college"]);
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $college)) {
       				$colErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;
     			}
			}

			if(empty($_POST["course"])){
				$couErr = "Course is required";
				$isErr = true;
			} else {
				$course = test_input($_POST["course"]);
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $course)) {
       				$couErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;
     			}
			}

			if(empty($_POST["certification"][0])){
				$ceErr = "Need at least one certification";
				$isErr = true;
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
       					$isErr = true;
     				}

     				$cnt++;
     			}

     			if($cnt == 0)
     			{
     				$ceErr = "Certifications is required";
					$isErr = true;
     			}
			}

			if(empty($_POST["workExp"][0])){
				$weErr = "Work exp is required";
				$isErr = true;
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
       					$isErr = true;
     				}

     				$cnt++;
     			}

     			if($cnt == 0)
     			{
     				$weErr = "Work exp is required";
					$isErr = true;
     			}
			}
			
			/* INSERT DATA INTO DATABASE */
			if($isErr == false)
			{echo "bah".$isErr;
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
                
                    $applicant_id = $ap->get_appid();
					createApplicantProfile(getLastApplicantProfileId()+1, $applicant_id, $skills, $school, $college, $course, $certExams, $jobtitle, $workExp, $applicant_id."_resume.pdf");
					$reply = "Sucessfull in setting up profile!";

					header('Refresh: 3; URL=applicant-home.php');	

				//}


			} else echo "Profile setup not successful.";
		}
			
?>