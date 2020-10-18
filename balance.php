<?php
session_start();
if(!isset($_SESSION['accno']))
{
header('location:login.html');
}
$con=mysqli_connect("localhost","root","","signin");
$sql1="select * from signin where accno='{$_SESSION['accno']}'";
$result1=mysqli_query($con,$sql1);
if(mysqli_num_rows($result1)>0)
{
while($row1=$result1->fetch_assoc())
{
$a=$row1['bal'];
$b=$row1['firstname'];
}
}
?>
<html>
<head>
<title>Balance</title>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/86e1dcc20b.js" crossorigin="anonymous"></script>

<style>
 body{
   
background: url(dash.jpg) no-repeat ;
background-size:cover;
background-position: center;
    }
.login{
width: 400px;
position: absolute;
top: 50%;
left: 50%;
transform:translate(-50%,-50%);
color:white;
background-color:rgba(0,0,0,0.5);
padding: 0px 30px 50px 20px;
height:450px;
}
.login h1{
float: left;
font-size: 60px;
border-bottom: 5px solid white;
margin-bottom:50px;
padding:20px 0;

}
.text{
width:100%;
overflow:hidden;
font-size:20px;
padding:1px 0 5px;
margin:10px 0 12px;
border:3px solid white;
border-bottom:1px solid white;
}
.text i{
width:26px;
float:left;
text-align:corner;
padding:8px 0 8px 10px;
}
.text input{
border: none;
outline: none;
background: none;
color: #ffff;
font-size: 26px;
width:80%;
float:left;
margin:0 10px;
}
.btn-submit{
width:100%;
background: none;
border:2px solid white;
color: #ffff;
padding:5px;
font-size:18px;
cursor:pointer;
margin:12px 0 12px;
}

.sign{
padding:10px;
font-size: 18px;
}

</style>
</head>
<body>
<div class="login">
<h1>balance</h1>
<div class="text">
<input type="text"  name="accno" value="<?php echo $b; ?>" readonly>
</div>
<label><h3>Your Balance</h3></label>
<div class="text">
<i class="fas fa-rupee-sign"></i><input type="text" name="balance" value="<?php echo $a; ?>" readonly >
</div>
<button type="submit" class="btn-submit" ><a href="dashboard.html" style="color:white">OK</button>
</div>
</body>
</html>
