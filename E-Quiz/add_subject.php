<?php
session_start();
$id = $_SESSION['id'];
$name = $_POST['subject'];
$connection = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");
$query = "SELECT * FROM subjects WHERE name = '$name' and faculty = '$id'";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) == 0) {
	$query = "INSERT INTO subjects VALUES (NULL, '$name', '$id')";
	mysqli_query($connection, $query);
	header('Location: faculty.php');
}
else {
	header('Location: faculty.php?error=subject_already_exists');
}

?>