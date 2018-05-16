<?php

$testId = $_POST['testId'];
$questionCount = $_POST['questionCount'];
$questionIds = [];
$i = 0;
while ($i < $questionCount) {
	$questionIds[] = $_POST["question_$i"];
	$i++;
}
$answers = [];
$i = 0;
while ($i < $questionCount) {
	$answers[$questionIds[$i]] = $_POST['answer_' . $questionIds[$i]];
	$i++;
}

session_start();
$connection = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");
foreach ($questionIds as $questionId) {
	$userId = $_SESSION['id'];
	$answer = $answers[$questionId];
	$query = "INSERT INTO Answers VALUES (NULL, '$userId', '$answer', '$questionId')";
	$result = mysqli_query($connection, $query);
}

header('Location: student.php');

?>