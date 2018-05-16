<html>
<head>
    <style>
    #grad{
        background: linear-gradient(#FF293D,#FF4263,#FF293D)
    }
    header, footer {
    width:100%;
    height:130px;
    border-radius:15px;
    color:#ff0000 ;
    background-color: white;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  align:center;
}
.container {
border-radius: 15px;

}
.image {
  opacity: 1;
  display: block;

  transition: .5s ease;
  backface-visibility: hidden;
}
.container:hover .image {
  opacity: 0.3;
}
button:hover{
    cursor:pointer;
    opacity:5;
}
.text {
  background-color:#FF293D;
  color: white;
  border: black;
  width:100px;
  height:40px;
  border-radius:20px;
}

.container:hover .middle {
  opacity: 1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}
.modal {
    display: none; /* Hidden by default */
    position:absolute; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%;
    background-color:transparent;
    /* Full height */
     /* Enable scroll if needed */

    padding-top: 50px;
}
.contain{
    padding:15px;
        border-radius: 15px;
}
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}
#background:hover {
  opacity: .6;
  filter: blur(.5px);
}
table{
	 border: 1px solid black;
	align-self:center;
	border-collapse:#f5f5f5;
	}
	td,th{
		 border: 1px solid black;
		padding:5px;
		text-align:center;
	}
    </style>
</head>

    <body id="grad">
<header><pre> <img style="height:220x;width:190px;" src="logo.png"><span style="float:right"><h3>Student Portal                                                                             </h3></pre></span></header><br><br><br><br>

<?php

//subjects -> tests -> questions -> answers -> students

/* Use the faculty ID stored in the session as a key into the subjects they own.
 * Store the subjects in a associative array with the subject name as the key.
 * The value in the map is subject ids.
 *
 * Iterate over the subjects to find all the tests associated with them.
 * Store the tests in an associative array with the test name as the key.
 * The value in the map is an array with test id and subject name.
 *
 * Iterate over the tests and find all the questions associated with these
 * test ids. The questions are stored in an assocative array with the test
 * name as the key. The value is a list of questions. It is used for calculating
 * marks. The question is stored as a map.
 */

session_start();
$connection = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");

$facultyId = $_SESSION['id'];
$query = "SELECT * FROM Subjects WHERE faculty='$facultyId'";
$result = mysqli_query($connection, $query);

$subjects = [];
while ($row = mysqli_fetch_assoc($result)) {
	$subjects[$row['name']] = $row['subjectId'];
}

$tests = [];
foreach ($subjects as $name => $subjectId) {
	$query = "SELECT * FROM tests WHERE subject_id='$subjectId'";
	$result = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		$testId = $row['test_id'];
		$name = $row['name'];
		$tests[$name] = ['testId' => $testId, 'subject' => $name];
	}
}

$questions = [];
foreach ($tests as $name => $test) {
	$testId = $test['testId'];
	$query = "SELECT * FROM Questions WHERE test_id='$testId'";
	$result = mysqli_query($connection, $query);
	$questions[$name] = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$questions[$name][] = ['questionId' => $row['questionId'], 'answer' => $row['answer'] ];
	}
}

$answerSheets = [];
foreach ($questions as $testName => $questionSet) {
	foreach ($questionSet as $question) {
		$questionId = $question['questionId'];
		$answer = $question['answer'];
		$query = "SELECT * FROM answers WHERE questionId='$questionId' LIMIT 1";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);
		$studentId = $row['studentId'];
		if ($row['answer'] == $answer) {
			if (isset($answerSheets[$testName][$studentId])) {
				$answerSheets[$testName][$studentId] += 1;
			}
			else {
				$answerSheets[$testName][$studentId] = 1;
			}
		}
		else {
			$answerSheets[$testName][$studentId] = 0;
		}
	}
}

foreach ($answerSheets as $testName => $students) {
	echo "<h3>TEST: $testName</h3>";
	echo '<table>';
	echo "<tr><th>Student</th><th>Marks</th></tr>";
	foreach ($students as $studentId => $marks) {
		echo "<tr><td>$studentId</td><td>$marks</td></tr>";
	}
	echo '</table>';
}

?>

</body>
</html>