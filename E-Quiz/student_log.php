<?php
session_start();
$con = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");
$name=$_POST["id"];
$password=$_POST["psw"];
$qry="SELECT * from student where id='$name' AND password='$password' ";
$result=mysqli_query($con,$qry) or die("Error querying database");
$row= mysqli_fetch_array($result);

if($row['id']==$name && $row['password']==$password)
{
	$_SESSION['student_logged_in'] = true;
	$_SESSION['id'] = $row['id'];
	$_SESSION['studentId'] = $row[''];
    header('location:student.php');

}
else
{
    echo"Invalid username or password";
}
?>
