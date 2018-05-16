<?php
$con=mysqli_connect("localhost","root","","equizz") or die ("Error connecting to DB");
$studentID = $_GET['id'];
$query="UPDATE dummy set blocked=1 WHERE id='$studentID'";
$res=mysqli_query($con,$query) or die ("Error querying DB");
?>