<?php
session_start();

include '../mvc/controller.php';
?>


<?php

	/* Increment last Application ID */
	$last_applicationId = (int) getLastApplicationId() + 1;
	$last_applicationId = (string) $last_applicationId;
	
	// get applicant id base from account id
	
	$servername = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbName = "jobit";
	
	// Connect to server and select database.
	$conn = new mysqli($servername, $dbuser, $dbpassword, $dbName);

	
	
	/* Connect */
	if($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	// initialize variable
	$applicant_id = "";
	$account_id = $_SESSION["account_id"];
	$job_id = $_SESSION["job_id"];
	
	// Get applicant id based from account id
	$query = "SELECT applicant_id FROM applicant WHERE account_id = '$account_id'";
	$result = mysqli_query($conn,$query) or die ("no query results");
	
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
	{
        $applicant_id = $row["applicant_id"];
	}
	}
	else 
	{
		echo "no query results";
	}
	
	$conn->close();
	
	createApplication($last_applicationId, $applicant_id, $job_id);
	header("location: ../applicant-home.php"); // or wherever
	
?>

