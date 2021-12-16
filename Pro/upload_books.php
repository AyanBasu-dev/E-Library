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
				<h3>Upload Books</h3>
				<div id="center">
				<?php
				if(isset($_POST["submit"]))
				{
					$target_dir="upload/";
					$target_file=$target_dir.basename($_FILES["efile"]["name"]);
					if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
					{
						$sql="insert into book(BTITLE,KEYWORDS,FILE) values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
						$db->query($sql);
						echo "Successfully Uploaded";
					}
					else
					{
						echo "<p class='error'>Error in Upload</p>";
					}
				}
				?>
					<form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" enctype="multipart/form-data">
						<label>Book Title</label>
						<input type="text" name="bname" required>
						<label>Keywords</label>
						<textarea name="keys" required></textarea>
						<label>Upload File</label>
						<input type="file" name="efile" required>
						<button type="submit" name="submit">Upload Book</button>
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