<?php
session_start();
$_SESSION['email']=$_POST["email"];
$phnno=$_POST["phnno"];
$_SESSION['otp']=mt_rand(1000,9999);
$con=mysqli_connect("localhost","root","","signin");
$query="select * from signin where email='{$_SESSION['email']}' && phnno = '{$phnno}'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)
{
    $sub="ONE TIME PASSWORD";
    $msg="YOUR OTP ".$_SESSION['otp'];
	mail($_SESSION['email'],$sub,$msg);
}
else
{
echo '<script>alert("Invalid email or password")</script>';
}
header('location:forgot1.html');
?>