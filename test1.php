<?php
	$con=mysqli_connect("localhost","root","","signin");
	$accno=$_POST["accno"];
	$ifsc=$_POST["ifsc"];
	$amount=$_POST["amount"];
	$receiver_accno=$_POST["receiveraccno"];
	$sql="select * from signin where accno ='{$accno}'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0) {
		while($rows=mysqli_fetch_assoc($result))
		{
			$bal=$rows['bal'];
			$current_bal=$bal-$amount;
			echo $current_bal;
		}
	}
	$balance="UPDATE signin SET bal = {$current_bal} WHERE accno = {$accno}";
	$res=mysqli_query($con,$balance);
	if ($res)
	{
		echo "done";
	}
	else
	{
		echo "not";
	}
?>