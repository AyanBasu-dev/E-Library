<?php
session_start();
include "database.php";
if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
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
				<h3>Search Books </h3>
				<div id="center">
				
					<form action=<?php echo $_SERVER["PHP_SELF"];?> method="post">
						<label>Enter Book Name or Keywords</label>
						<input type="text" name="name" required>
						<button type="submit" name="submit">Search Now</button>
					</form>
				</div>
				<?php
					if(isset($_POST["submit"]))
					{
					$sql="select*from book where BTITLE like '%{$_POST["name"]}%' or KEYWORDS like '%{$_POST["name"]}%'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						echo "<table>
								<tr>
									<th>SNo.</th>
									<th>Book Name</th>
									<th>Keywords</th>
									<th>Read</th>
									<th>Feedback</th>
								</tr>";
						$i=0;
						while($row=$res->fetch_assoc())
						{
							$i++;
							echo "<tr>";
							echo "<td>{$i}</td>";
							echo "<td>{$row["BTITLE"]}</td>";
							echo "<td>{$row["KEYWORDS"]}</td>";
							echo "<td><a href='{$row["FILE"]}' target='_blank'>Read me</a></td>";
							echo "<td><a href='comment.php?id={$row["BID"]}'>Comment</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else
					{
						echo "<p class='error'>No Books Ulpoaded</p>";
					}
					}
					?>
			</div>
			<div id="navi">
				<?php
					include "userSidebar.php";
				?>
			</div>
			<div id="footer">
				<p>Copyright &copy; Dynamic Developers 2021</p>
			</div>
		</div>
	</body>
</html>