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
				<h3>Welcome <?php echo $_SESSION["TNAME"];?></h3>
				<div id="center">
					<ul class="record">
						<li>Total Students :<?php echo countRecord("select * from student",$db);?></li>
						<li>Total Books    :<?php echo countRecord("select * from book",$db);?></li>
						<li>Total Requests :<?php echo countRecord("select * from request",$db);?></li>
						<li>Total Comments :<?php echo countRecord("select * from comment",$db);?></li>
					</ul>
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