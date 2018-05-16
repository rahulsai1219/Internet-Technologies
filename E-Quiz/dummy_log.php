<?php
$id=$_POST['id'];
$password=$_POST['password'];

$con=mysqli_connect("localhost","root","","equizz") or die ("error connecting to db");
$query="SELECT * from dummy where id='$id' and password='$password'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);

if($row['id']==$id && $row['password']==$password)
{
	if($row['blocked']==0)
	{
		echo"Successfully Logged in";
		
	}
	else
	{
		echo"Sorry!! You are blocked by the admin!!";
	}
	
}
else
{
	echo"Invalid ID or password";
}
?>