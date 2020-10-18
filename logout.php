<?php
	session_start();
	session_destroy();
	echo "<script>alert('LOGOUT SUCCESSFULL')<script>";
	header("refresh:1;url=login.html");
?>