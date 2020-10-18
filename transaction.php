<?php
	session_start();
	$con=mysqli_connect("localhost","root","","signin");
	$ifsc=$_POST["ifsc"];
	$amount=$_POST["amount"];
	$receiver_accno=$_POST["receiveraccno"];
	// checking for ifsc in DB
	$sql="select * from signin where ifc ='{$ifsc}' && accno='{$receiver_accno}'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0) 
	{	
		while($rows=mysqli_fetch_assoc($result))
		{
			$receiver_accno1=$rows['accno'];
			$ifc=$rows['ifc'];
		}
	// checking if the correct ifsc is given and inserting the values to the table transaction 
	// updating the balance in DB
	$sql2="select * from signin where accno ='{$_SESSION['accno']}'";
	$result2=mysqli_query($con,$sql2);
	if(mysqli_num_rows($result2)>0) 
	{
		while($rows=mysqli_fetch_assoc($result2))
		{
			$bal=$rows['bal'];
		}
		if($bal == 0 || NULL) {
				echo '<script>alert("Insufficent Funds")</script>';
				header('refresh:2;url=dashboard.html');
		}
		else {
			$sql1="INSERT INTO transaction(accno,receiver_accno,amt,date) VALUES ('{$_SESSION['accno']}','{$receiver_accno}','{$amount}',NOW())";
			$result1=mysqli_query($con,$sql1);
			$current_bal=$bal-$amount;
			$balance="UPDATE signin SET bal = '{$current_bal}' WHERE accno = '{$_SESSION['accno']}'";
	$res=mysqli_query($con,$balance);
	// checking for the accno and sending email to the account holder
	$query="select * from signin where accno ='{$_SESSION['accno']}'";
	$result3=mysqli_query($con,$query);
	if(mysqli_num_rows($result3)>0) {
		while($rows=mysqli_fetch_assoc($result3))
		{
			$email=$rows['email'];
		}
	}
	$sub="TRANSACTION DETAILS";
	$msg="HI..YOUR ACCOUNT NO ".$_SESSION['accno']." AND current balance is ".$current_bal;
	if(mail($email,$sub,$msg)) {
		echo '<script>alert("TRANSACTION SUCCESSFULL")</script>';
	}
	else {
		echo '<script>alert("something wrong")</script>';
	}
	// receiver_accno updation
	$sql3="select * from signin where accno ='{$receiver_accno}'";
	$result4=mysqli_query($con,$sql3);
	if(mysqli_num_rows($result4)>0) 
	{	
		while($rows=mysqli_fetch_assoc($result4))
		{
			$bal=$rows['bal'];
			$current=$bal+$amount;
		}
	}
	$balance1="UPDATE signin SET bal = '{$current}' WHERE accno = '{$receiver_accno}'";
	$res=mysqli_query($con,$balance1);
	// checking for the accno and sending email to the account holder
	$query1="select * from signin where accno ='{$receiver_accno}'";
	$result5=mysqli_query($con,$query1);
	if(mysqli_num_rows($result5)>0) {
		while($rows=mysqli_fetch_assoc($result5))
		{
			$email1=$rows['email'];
		}
	}
	$sub1="TRANSACTION DETAILS";
	$msg1="HI..YOUR ACCOUNT NO ".$receiver_accno." AND current balance is ".$current;
	if(mail($email1,$sub1,$msg1)) {
		echo '<script>alert("TRANSACTION SUCCESSFULL")</script>';
	}
	else {
		echo '<script>alert("something wrong")</script>';
	}
		}
	}
	}
	else {
		echo '<script>alert("wrong ifsc code")</script>';
	}
	mysqli_close($con);
	include 'dashboard.html';
	
?>