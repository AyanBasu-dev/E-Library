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
				<h3>Teacher Login Here.</h3>
				<div id="center">
				<?php
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * FROM teachers where TNAME='{$_POST["aname"]}' and TPASS='{$_POST["apass"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$row=$res->fetch_assoc();
							$_SESSION["TID"]=$row["TID"];
							$_SESSION["TNAME"]=$row["TNAME"];
							header("location:ahome.php");
							
						}
						else
						{
							echo "<p class='error'>Invalid User Details</p>";
						}
					}
				?>
				<form action="alogin.php" method="post">
					<label> Enter UserName</label>
					<input type="text" name="aname" required>
					<label>Enter Password</label>
					<input type="password" name="apass" required>
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