<?php
	session_start();
	$con=mysqli_connect("localhost","root","","signin");
	$sql="select * from transaction where accno='{$_SESSION['accno']}'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0) 
	{	echo "<center><table border=1 cellpadding=0 cellspacing=0>";
		echo "<tr><th>SENDER_ACCNO</th><th>RECEIVER_ACCNO</th><th>AMOUNT</th>";
		while($rows=mysqli_fetch_assoc($result))
		{
			$accno=$rows['accno'];
			$receiver_accno=$rows['receiver_accno'];
			$amount=$rows['amt'];
			echo "<tr><td>{$accno}</td><td>{$receiver_accno}</td><td>{$amount}</td></tr>";
		}
		echo "</table></center>";
	}
	else
	{
		echo "NO TRANSACTION SO FAR";
	}
?>