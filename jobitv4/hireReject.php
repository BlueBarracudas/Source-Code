<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	$ap = getLoggedInAccount($_SESSION["account_id"]);
	$company = getCompanyById($_SESSION["account_id"]);

	if(isset($_GET['aid']) && isset($_GET['jid']) && isset($_GET['hr']) && isset($_GET['aonid']));
	{	
		$fid = getLastFeedBackId()+1;
		$jid = $_GET['jid'];
		$aid = $_GET['aid'];
		$cid = $company->get_companyid();
		$n = "None";
		$d = $_GET['hr'];
		$application_id = $_GET['aonid'];

		createFeedback($fid, $jid, $cid, $aid, $n, $d);
		updateApplication($application_id, 2);

	}

	loadAll();

?>