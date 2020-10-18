<?php
	$con=mysqli_connect("localhost","root","","signin");
	$sql="ALTER TABLE signin ADD ifc int";
	$res=mysqli_query($con,$sql) or die ("Bad create : $sql");
?>