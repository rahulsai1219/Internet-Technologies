<?php
$name=$_POST['name'];
$id=$_POST['id'];
$password=$_POST['psw'];

$con = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");
$query = mysqli_query($con, "SELECT * FROM faculty where id='$id'");
$numrows = mysqli_num_rows($query);

if($numrows == 0)
{
    $sql = "INSERT INTO faculty values('$name','$id','$password')";
    $result = mysqli_query($con,$sql);
    if($result)
    {
    header("location: admin.php");
    }
}
else{
    header('location: admin.php?error=user_already_exists');

}


 ?>
