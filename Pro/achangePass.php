<?php
session_start();
include "database.php";
function countRecord($sql,$db)
{
	$res=$db->query($sql);
	return $res->num_rows;
}
if(!isset($_SESSION["TID"]))
{
	header("location:alogin.php");
}
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
				<h3>Change Password</h3>
				<div id="center">
				<?php
				if(isset($_POST["submit"]))
				{
					$sql="select * from teachers where TPASS='{$_POST["opass"]}' and TID='{$_SESSION["TID"]}'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$s="update teachers set TPASS='{$_POST["npass"]}' where TID=".$_SESSION["TID"];
						$db->query($s);
						echo "<p class='success'>Password Changed Successfully</p>";
					}
					else
					{
						echo "<p class='error'>Invalid Password</p>";
					}
				}
				?>
					<form action=<?php echo $_SERVER["PHP_SELF"];?> method="post">
						<label>Enter Old Password</label>
						<input type="password" name="opass" required>
						<label>Enter New Password</label>
						<input type="password" name="npass" required>
						<button type="submit" name="submit">Update Password</button>
					</form>
				</div>
			</div>
			<div id="navi">
				<?php
					include "adminSidebar.php";
				?>
			</div>
			<div id="footer">
				<p>Copyright &copy; Dynamic Developers 2021</p>
			</div>
		</div>
	</body>
</html>