<?php
session_start();
$con=mysqli_connect("localhost","root","","signin");
$otp=$_POST["otp"];
$npassword=$_POST["npassword"];
$ncpassword=$_POST["ncpassword"];
$sql="select * from signin where email='{$_SESSION['email']}'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
if($_SESSION['otp']== $otp)
{
if($npassword == $ncpassword)
{
$query="update signin set password='{$ncpassword}' where email='{$_SESSION['email']}'";
$result1=mysqli_query($con,$query);
echo '<script>alert("Password resetted successfully")</script>';
include 'login.html';
}
else
{
echo '<script>alert("Incorrect Password!")</script>';
}
}
else {
	echo '<script>alert("check your otp")</script>';
	include 'forgot1.html';
}
}
else
{
echo '<script>alert("failed to reset password...please enter the details correctly!")</script>';
include "forgot1.html";
}
?>