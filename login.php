<?php
session_start();
$_SESSION['accno']=$_POST["accno"];
$password=$_POST["password"];
$con=mysqli_connect("localhost","root","","signin");
$query="select * from signin where accno='{$_SESSION['accno']}' && password='{$password}'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)
{
include 'dashboard.html';
}
else
{
echo '<script>alert("Invalid accno or password")</script>';
}
?>