<html>

	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title> Job IT | Register company </title>
	</head>

	<body>

		<div id="main">
			<h1>Job IT | Company register </h1>
			<h2> <?php echo $reply; ?> </h2>

			<div id="login">
				<h2>Enter details below</h2><br>
				<form name="register" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<p> * required field </p><br><br>
					<label> Company name: <p> * <?php echo $cnErr; ?> </p> </label>
						<input type="text" name ="company_name" placeholder ="Company Name"/><br><br>
					<label> Email: <p> * </p> <?php echo $emailErr; ?> </label>
						 <input type="email" name ="email" placeholder ="Email address"/><br><br>
					<label> Username: <p> * <?php echo $unErr; ?> </p> </label>
						 <input type="text" name ="username" placeholder ="Username"/><br><br>
					<label> Password: <p> * <?php echo $pwErr; ?>  </p> </label>
						 <input type="password" name ="password" placeholder = "**********"/><br><br>
					<label> Company type: <p> * <?php echo $ctErr; ?>  </p> </label>
					<select name = "company_type">
						<option value =""> ... </option>
						<option value ="Partner"> Partner </option>
						<option value ="Non-Partner"> Non-Partner </option>
					</select>
					<br>	 	
				 	<input type="submit" value="Submit">
				</form>
		</div>
	</div>

	</body>

</html