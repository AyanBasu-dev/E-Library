<?php
	session_start();
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
				<h3>Student Login Here.</h3>
				<div id="center">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * FROM student where NAME='{$_POST["sname"]}' and PASS='{$_POST["spass"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$row=$res->fetch_assoc();
							$_SESSION["ID"]=$row["ID"];
							$_SESSION["NAME"]=$row["NAME"];
							header("location:uhome.php");
							
						}
						else
						{
							echo "<p class='error'>Invalid User Details</p>";
						}
					}
				?>
				<form action="ulogin.php" method="post">
					<label> Enter UserName</label>
					<input type="text" name="sname" required>
					<label>Enter Password</label>
					<input type="password" name="spass" required>
					<button type="submit" name="submit">Login Now</button>
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