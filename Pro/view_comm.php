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
				<h3>Comments</h3>
				<?php
					$sql="SELECT book.BTITLE,student.NAME,comment.COMM,comment.LOGS from comment inner join book on book.BID=comment.BID inner join student on student.ID=comment.SID";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						echo "<table>
								<tr>
									<th>SNo.</th>
									<th>Book</th>
									<th>Student Name</th>
									<th>Comment</th>
									<th>Date &amp; Time</th>
								</tr>";
						$i=0;
						while($row=$res->fetch_assoc())
						{
							$i++;
							echo "<tr>";
							echo "<td>{$i}</td>";
							echo "<td>{$row["BTITLE"]}</td>";
							echo "<td>{$row["NAME"]}</td>";
							echo "<td>{$row["COMM"]}</td>";
							echo "<td>{$row["LOGS"]}</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<p class='error'>No Comments Found</p>";
					}
				?>
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