<?php
session_start();
$connection = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");

$subjectId = $_POST['subject_id'];
$name = $_POST['name'];
$numberOfQuestions = $_POST['numberOfQuestions'];
$time = $_POST['duration'];

$duration=$time*60;
$query = "INSERT INTO tests VALUES (NULL, '$name', '$subjectId', '$numberOfQuestions', '$duration')";;
$result = mysqli_query($connection, $query);

$testId = $connection->insert_id;

$i = 1;
echo $numberOfQuestions;
while ($i <= $numberOfQuestions) {
	$question = $_POST['question_' . $i];
	$option1 = $_POST['question_' . $i . '-option_1'];
	$option2 = $_POST['question_' . $i . '-option_2'];
	$option3 = $_POST['question_' . $i . '-option_3'];
	$option4 = $_POST['question_' . $i . '-option_4'];
	$answer = $_POST['question_' . $i . '-answer'];
	$query = "INSERT INTO Questions VALUES (NULL, '$testId', '$question', '$option1', '$option2', '$option3', '$option4', '$answer')";
	mysqli_query($connection, $query);
	$i++;
}

header('Location: faculty.php');
?>