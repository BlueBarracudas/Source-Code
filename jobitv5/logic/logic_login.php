<?php
	
	session_start();

	if(isset($_GET['q']))
	{
		$_SESSION['logintype_purpose'] = 1;
		echo "Sign in as Admin";

	}

	//header("Refresh: 1, URL=main-login.php");
?>