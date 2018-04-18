<?php
$con = mysqli_connect("localhost", "root", "tiger","lab") or die ("could not connect to database");
$name=$_POST["name"];
$password=$_POST["password"];
$qry="SELECT * from login where name='$name' AND password='$password' ";
$result=mysqli_query($con,$qry);
if($result) 
{
	if(mysqli_num_rows($result) > 0)
	{
		echo"Login Successfull !!!";
	}
	else
	{
		echo"invalid username or password";//echo statement
	}
}

?>
