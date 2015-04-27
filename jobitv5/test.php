<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	$ap = getLoggedInApplicant($_SESSION["account_id"]);
    $id = $ap->get_appid();

	updateApplicationViaApplicant(10001, 1);

	loadAll();

?>