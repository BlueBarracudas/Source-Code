

<?php

/*
	if(isset($_GET['job_id']))
	{
		$job_id = $_GET['job_id'];
	}
	else
	{
		echo "No matching job listing (job_id) found..." 
		//header
	}
*/
	$job_id = 1; // checking purposes, revert soon to the one above
	
	// if there is a set job id, then start getting details
	
	$host="localhost"; // Host name 
	$dbusername="root"; // Mysql username 
	$dbpassword=""; // Mysql password 
	$db_name="jobit"; // Database name 

	// Connect to server and select database.
	$conn = new mysqli($host, $dbusername, $dbpassword, $db_name);

	/* Connect */
	if($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	//Variables that are going to be needed (the ones that are plural are supposedly arrays i think)
	$course = $skills = $job_titles = $certs = $total_slots = $slots_available = $location = $work_hours = $work_days = $work_experience = "";
	$company_id = $job_requirement = $company_name = "";
	
	// Get job listing that matches the job_id that is set
	$query = "SELECT * FROM joblisting WHERE job_id = '$job_id'";
	$result = mysqli_query($conn,$query) or die ("no query line 40");
	
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $course = $row["course_tag"];
		$skills = $row["skill_tag"];
		$job_titles = $row["title"];
		$certs = $row["certificate"];
		$total_slots = $row["total_slots"];
		$slots_available = $row["slots_available"];
		$location = $row["location"];
		$work_hours = $row["work_hours"];
		$work_days = $row["work_days"];
		$work_experience = $row["work_experience"];
		$company_id = $row["company_id"];
		$job_requirement = $row["job_requirement"];
		$company_id = $row["company_id"]; // to be used to get the company name
    }
	
	// put job id to session to be used in apply function
	$_SESSION["job_id"] = $job_id;
	
	// Get company name for display
	$query = "SELECT name FROM company WHERE company_id = '$company_id'";
	$result = mysqli_query($conn,$query) or die ("no query 62");
	if ($result->num_rows > 0) {
	 while($row = $result->fetch_assoc()) {
		$company_name = $row["name"];
	}
	}
	
	/* 
	
	//set them as a session variables | okay maybe di pla need | check if everything is sessioned if use again
	$_SESSION["course"] = $course;
	$_SESSION["skills"] = $skills;
	$_SESSION["job_titles"] = $job_titles;
	$_SESSION["certs"] = $certs;
	$_SESSION["total_slots"] = $total_slots;
	$_SESSION["slots_available"] = $slots_available;
	$_SESSION["location"] = $location;
	
	*/
	} else {
		echo "No row found matching the job id"; // debugging purposes or not / use alert?
	}
	
	
	//header("location: applicant-apply.php");
	
$conn->close();
?>
	

	



