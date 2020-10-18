<?php
session_start();
$con=mysqli_connect("localhost","root","","signin");
$sql1="select * from signin where accno='{$_SESSION['accno']}'";
$result1=mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0)
{
while($row1=$result1->fetch_assoc())
{
$a=$row1['email'];
$b=$row1['firstname'];
$c=$row1['lastname'];
$d=$row1['phnno'];
}
}

?><!DOCTYPE html>
<html lang="en">
<head>
<title>profile</title>
<style>
*{
margin:0;
padding:0;
}
body
{
background-image:url(https://ak.picdn.net/shutterstock/videos/1019291686/thumb/1.jpg);
background-repeat:no-repeat;
background-size:100% 950px;
}
.reg
{
max-width:600px;
border-radius:5px;
margin:auto;
background:rgba(0,0,0,.6);
box-sizing:border-box;
padding:40px;
color:white;
margin-top:100px;
}

label
{
color:white:
font-size:16px;
font-family:sans-serif;
font-style:italic;
}
h1
{
text-align:center;
color:white;

}
::placeholder
{
color:white;

}
#name
{
width:250px;
padding:5px;
border:none;
border-bottom:2px solid white;
background:none;
outline:0;
color:white;
}
#code{
padding:3px;
border:none;
background:none;
color:white;
border-bottom:2px solid white;
}
#sub{
width:100%;
box-sizing:border-box;
padding:10px 0;
margin-top:30px;
outline:none;
border:none;
background:white;
color:black;
}
</style>
</head>
<body>
<div  class="reg">
<h1>My profile</h1>
<form id="reg" action="change.php" method="post">
<label>Email</label><br>
<input type="text" name="email" id="name" value="<?php echo $a; ?>" required="required" ><br><br>
<label>First name</label><br>
<input type="text" name="firstname" id="name" value="<?php echo $b; ?>" required="required" ><br><br>
<label>Last name</label><br>
<input type="text" name="lastname" id="name" value="<?php echo $c; ?>" required="required" ><br><br>
<label>Phoneno</label><br>
<input type="text" name="phoneno" id="name" value="<?php echo $d; ?>" required="required" ><br><br>
<input type="submit" id="sub" value="Update profile">
</form>
</div>
</body>
</html>