<?php
	
	session_start();

	include '/MVC/controller.php';

	loadAll();

	$ap = getLoggedInAccount($_SESSION["account_id"]);

	if(isset($_GET['q']) && isset($_GET['aid']))
	{
		$indicator = $_GET['q'];
		$aid = $_GET['aid'];

		if($indicator == 0)
		{
			activateAccount($aid);
		} else deactivateAccount($aid);
	}

	loadAll();

?>