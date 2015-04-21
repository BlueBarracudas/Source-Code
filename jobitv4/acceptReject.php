<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	if(isset($_GET['hr']) && isset($_GET['aonid']));
	{	
		$d = $_GET['hr'];
		$application_id = $_GET['aonid'];

		updateApplicationViaApplicant($application_id, $d);

	}

	loadAll();

?>