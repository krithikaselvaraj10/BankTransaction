<?php
session_start();
if(!isset($_SESSION['accno']))
{
header('location:login.html');
}
$con=mysqli_connect("localhost","root","","signin");
?>
<html>
<head>
<title>See all your activity</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/7379abcdff.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<style>
.chat
{
 background-color: #FEF9E7 ;
  width: 325px;
  height: 150px;
  overflow: auto;
  margin:auto;
  border-radius:60px 50px 30px 15px;
  border: 5px solid #1a1100;
 
  width:500px;
  padding:20px;
  height:550px;
}
body{
padding-top:60px;
background-color:white;
}
form{
margin:auto;
width:500px;
}
</style>
<body >
<div>
<h2 style="text-align:center;color:black" >See all your activity</h2>
</div>
<div class="chat" >
<?php
$sql1="select * from transaction where accno='{$_SESSION['accno']}'";
$result1=mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0)
{
while($row1=$result1->fetch_assoc())
{
$a=$row1['amt'];
$r=$row1['receiver_accno'];
$str=$row1['date'];
$t=substr($str,11,strlen($str));
$d=substr($str,0,10);
$sql1="select * from signin where accno='{$r}'";
$result1=mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0)
{
while($row1=$result1->fetch_assoc())
{
$b=$row1['firstname'];
}
echo '<h4 style="color:orange">To:   '.$b.'</h4>';
echo '<h5 style="color:blue">Paid:  '.$a.'</h5>';
echo '<h5 style="color:blue">on:    '.$d.'</h5>';
echo '<h5 style="color:blue">at:    '.$t.'</h5>';
}
}
}
else
{
echo "<center>";
echo "NO ACTIVITIES SO FAR";
echo "</center>";

}
?>
</div>
<br>
<form method="post" action="<?php
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">



</div>
</form>
</body>
</html>
