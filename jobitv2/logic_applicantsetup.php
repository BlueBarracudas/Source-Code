<?php

	$reply = "";

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{

			/* Initialize variables */
			$skills = $school = $college = $course = $certExams = "";
			$workExp = "";

			$skErr = $scErr= $colErr = $couErr= $cerErr = $weErr = $jtErr = "";
			$isErr = false;

			if(empty($_POST["skills"])){
				$skErr = "Skills is required";
				$isErr = true;
			} else {
				$skills = test_input($_POST["skills"]);
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $skills)) {
       				$skErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;
     			}
			}

			if(empty($_POST["jobtitle"])){
				$jtErr = "Job title is required";
				$isErr = true;
			} else {
				$jobtitle = test_input($_POST["jobtitle"]);
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $jobtitle)) {
       				$skErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;
     			}
			}

			if(empty($_POST["school"])){
				$scErr = "School is required";
				$isErr = true;
			} else {
				$school = test_input($_POST["school"]);
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

			if(empty($_POST["certExams"])){
				$ceErr = "Cert exams is required";
				$isErr = true;
			} else {
				$certExams= test_input($_POST["certExams"]);
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $certExams)) {
       				$ceErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;
     			}
			}

			if(empty($_POST["workExp"])){
				$weErr = "Work exp is required";
				$isErr = true;
			} else {
				$workExp = test_input($_POST["workExp"]);
				if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $workExp)) {
       				$weErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;
     			}
			}
			
			/* INSERT DATA INTO DATABASE */
			if($isErr == false)
			{

				$applicant_id = $ap->get_appid();

				createApplicantProfile($applicant_id, $skills, $school, $college, $course, $certExams, $jobtitle, $workExp);

				$reply = "Sucessfull in setting up profile!";

				header('Refresh: 3; URL=home.php');	

			} else $reply = "Something went wrong.";
		}
			
?>