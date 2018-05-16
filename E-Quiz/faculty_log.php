<?php

session_start();

$con = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");
$name=$_POST["id"];
$password=$_POST["psw"];
$qry="SELECT * from faculty where id='$name' AND password='$password' ";
$result=mysqli_query($con,$qry) or die("Error querying database");
$row= mysqli_fetch_array($result);

if($row['id']==$name && $row['password']==$password)
{
	$_SESSION['faculty_logged_in'] = true;
	$_SESSION['id'] = $row['id'];
    header('location: faculty.php');

}
else
{
    echo"Invalid username or password";
}
?>
