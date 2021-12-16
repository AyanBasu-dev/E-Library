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
				<h3>Teacher Registration</h3>
				<div id="center">
				<?php
				if(isset($_POST["submit"]))
				{
					$sql="insert into teachers(TNAME,TPASS) values ('{$_POST["tname"]}','{$_POST["tpass"]}')";
					$db->query($sql);
					echo "<p class='success'>Teacher Registration Successful</p>";
				}
				?>
					<form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" enctype="multipart/form-data">
						<label>Name</label>
						<input type="text" name="tname" required>
						<label>Password</label>
						<input type="password" name="tpass" required>
						<!--
						<label>Email ID</label>
						<input type="email" name="mail" required>
						<select name="dep">
							<option value="">Select</option>
							<option value="B.Tech">B.Tech</option>
							<option value="M.Tech">M.Tech</option>
							<option value="BCA">BCA</option>
							<option value="MCA">MCA</option>
							<option value="BBA">BBA</option>
							<option value="MBA">MBA</option>
						</select>--> 
						<button type="submit" name="submit">Register Now</button>
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