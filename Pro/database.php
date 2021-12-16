<?php
	$db= new mysqli("localhost","root","","pro");
	if(!$db)
	{
		echo "error";
	}
	else
	{
		echo "Database Connected";
	}
?>