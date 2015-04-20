<?php
	
	session_start();

	include '/MVC/controller.php';

	loadAll();

	$ap = getLoggedInAccount($_SESSION["account_id"]);

	if(isset($_GET['q']) && isset($_GET['aid']))
	{
		$id = $_GET['q'];
		$aid = $_GET['aid'];

		$popup = detailsPopupById($id, $aid);
	}

	loadAll();

	echo $popup;

?>