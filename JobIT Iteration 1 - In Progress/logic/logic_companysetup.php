<?php
	$reply = "";
      $name = $address = $contactno = $description = "";
    $nErr = $adErr = $cnErr = $descErr = "";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{

		$isErr = false;

		if (empty($_POST["name"])) {
     			$nErr = "Company name is required";
     			$isErr = true;
   			} else {
     			$name = test_input($_POST["name"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $name)) {
       				$nErr = "Only letters, numbers, white spaces, and commas are allowed"; 
       				$isErr = true;
     			}
   			}

   		if (empty($_POST["address"])) {
     			$adErr = "Address is required";
     			$isErr = true;
   			} else {
     			$address = test_input($_POST["address"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $address)) {
       				$adErr = "Only letters, numbers, white spaces, and commas are allowed"; 
       				$isErr = true;
     			}
   			}

   		if (empty($_POST["contactno"])) {
     			$cnErr = "Contact number is required";
     			$isErr = true;
   			} else{
   				$contactno = test_input($_POST["contactno"]);

   				if (!ctype_digit($contactno)) {
       				$cnErr = "Only numbers are allowed"; 
       				$isErr = true;
   				}
			}

			if (empty($_POST["description"])) {
     			$descErr = "Description is required";
   			} else {
     			$description = test_input($_POST["description"]);
     				// check if name only contains letters and whitespace
     			if (!preg_match("/^[a-zA-Z0-9,.!? ]*$/", $description)) {
       				$descErr = "Only letters, numbers, white spaces, and commas are allowed"; 
       				$isErr = true;
     			}
   			}

   			if($isErr == false)
   			{
   				updateCompanyProfile($_SESSION["account_id"], $name, $description, $address, $contactno, "default.jpg");
   				$reply = "Successful in setting up profile!";
                header('Refresh: 3; URL=company-home.php');
   			} else {
   				$reply = "Something went wrong";
   			}
	}

?>