<?php

include "database.php";

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>E-library</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>E_Library Management System</h1>
			</div>
			<div id="wrapper">
				<h3>User Registration</h3>
				<div id="center">
					<form>
						<label> Select Role</label>
						<select name="role" onchange="location = this.value;">
							<option value="">Select</option>
							<option value="newt.php">Teacher</option>
							<option value="new.php">Student</option>
						</select>
					</form>
				</div>
			</div>
			<div id="navi">
				<?php
					include "sideBar.php";
				?>
			</div>
			<div id="footer">
				<p>Copyright &copy; Dynamic Developers 2021</p>
			</div>
		</div>
	</body>
</html>