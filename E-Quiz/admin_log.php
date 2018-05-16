<?php

session_start();

$con = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");
$name=$_POST["id"];
$password=$_POST["psw"];
$qry="SELECT * from admin where admin_id='$name' AND password='$password' ";
$result=mysqli_query($con,$qry) or die("Error querying database");
$row= mysqli_fetch_array($result);

if($row['admin_id']==$name && $row['password']==$password)
{
    $_SESSION['admin_logged_in'] = true;
    header('location:admin.php');

}
else
{
    echo"Invalid username or password";
}
?>
