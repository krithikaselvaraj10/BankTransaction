<?php
session_start();
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$phnno=$_POST["phoneno"];
$email=$_POST["email"];
$con=mysqli_connect("localhost","root","","signin");
$sql="select * from signin where accno='{$_SESSION['accno']}'";
$result=$con->query($sql);
if($result->num_rows>0)
{

$query2="update signin set firstname='{$firstname}' where accno='{$_SESSION['accno']}'";
$query3="update signin set lastname='{$lastname}' where accno='{$_SESSION['accno']}'";
$query4="update signin set phnno='{$phnno}' where accno='{$_SESSION['accno']}'";
$query5="update signin set email='{$email}' where accno='{$_SESSION['accno']}'";

   
mysqli_query($con,$query2);
mysqli_query($con,$query3);
mysqli_query($con,$query4);
mysqli_query($con,$query5);

echo '<script>alert("Profile updated")</script>';
include 'dashboard.html';
}
?>