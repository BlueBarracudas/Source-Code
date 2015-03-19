<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	if(isset($_SESSION["account_id"]))
	{
		$ap = getLoggedInApplicant($_SESSION["account_id"]);
		include 'userhome.php';

	}

	else
	{
		echo "You are not logged in.";
		header('Refresh: 3; URL=main_login.php');	
	}

?>