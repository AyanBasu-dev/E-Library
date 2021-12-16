<?php
session_start();
unset($_SESSION["TID"]);
unset($_SESSION["ID"]);
session_destroy();
header("location:index.php");
?>