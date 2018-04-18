<?php
session_start();
$con = mysqli_connect("localhost", "root", "tiger","vote") or die ("could not connect to database".mysqli_connect_error($con));
$name=$_POST["id"];
$password=$_POST["password"];
$qry="SELECT * from user where userid=\"$name\"";
$result=mysqli_query($con,$qry) or die("Error querying DB");
$row=mysqli_fetch_array($result);
if($row['password'] == $password) 
{
$_SESSION['sec'] = $row['section'];
	header('location:main.html');
}
else
{
echo'<center><div style="margin: 0 auto 10px;box-shadow: 1px 1px 3px;width:350px">
<span style="color:red"><p>Incorrect username or password!!</p></span>
</div></center>';


}

?>
