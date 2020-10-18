<?php
	$con=mysqli_connect("localhost","root","","signin");
	$firstname=$_POST["firstname"];
	$lastname=$_POST["lastname"];
	$phnno=$_POST["phnno"];
	$dob=$_POST["dob"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$cpassword=$_POST["cpassword"];
	$gender=$_POST["gender"];
	if($password==$cpassword) {
	function random() {
		return mt_rand(100000000000,999999999999);
	}
	$accno=random();
	$sql1="select * from signin where accno='{$accno}'";
	$result=mysqli_query($con,$sql1);
	if(mysqli_num_rows($result)>0) 
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			$email_exist=$rows['email'];
		}
		echo '<script>alert("ACCOUNT ALREADY EXITS")</script>';
	}
	else {
	$ifsc=mt_rand(100000,999999);
	$sql="INSERT INTO signin(accno,firstname,lastname,phnno,email,password,gender,ifc,cpassword,dob,bal) VALUES ('{$accno}','{$firstname}','{$lastname}','{$phnno}',
	'{$email}','{$password}','{$gender}','{$ifsc}','{$cpassword}','{$dob}','0')";
	$res=mysqli_query($con,$sql) or die ("Bad create : $sql");
	$sub="ACCOUNT DETAILS";
	$msg="HI..YOUR ACCOUNT NO ".$accno." AND IFC CODE ".$ifsc;
	if(mail($email,$sub,$msg)) {
		echo '<script>alert("THANKS FOR JOINING IN CRYSTAL")</script>';
	}
	else {
		echo '<script>alert("something wrong")</script>';
	}
	}
	include 'login.html';
	}
	else {
		echo '<script>alert("put the correct confirm password")</script>';
	}
?>