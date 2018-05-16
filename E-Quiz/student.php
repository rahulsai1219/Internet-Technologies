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
<header><pre> <img style="height:220x;width:190px;" src="logo.png"><span style="float:right"><h3>Student Portal                                                                              <a href="logout.php">Logout</a></h3></pre></span></header><br><br><br><br>

<?php
session_start();
$connection = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");

$query = "SELECT subjects.name as subjectName, faculty.name as facultyName, subjects.subjectId as subjectId FROM subjects INNER JOIN faculty ON subjects.faculty = faculty.id";
$result = mysqli_query($connection, $query);
$subjects = [];
while ($row = mysqli_fetch_array($result)) {
	$subjects[] = ['id' => $row[2], 'name' => $row[0], 'faculty' => $row[1]];
}
//print_r($subjects);

$x = count($subjects);

// foreach ($subjects as $subject)
$i = 0;
while ($i < $x) {
	$subject = $subjects[$i];
	$i++;
	$subjectId = $subject['id'];
	$name = $subject['name'];
	$fac = $subject['faculty'];
	echo <<<MULTI_LINE_STRING
	<p><b>$name</b> offered by $fac</p>
	<table>
	<tr>
		<th>Name</th>
		<th>Questions</th>
		<th>Duration</th>
		<th>Action</th>
	</tr>
MULTI_LINE_STRING;

	$query = "SELECT test_id, number_of_questions, duration, name FROM tests where subject_id = '$subjectId'";
	$result = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_array($result)) {
		$testId = $row[0];
		$numberOfQuestions = $row[1];
		$time = $row[2];
		$name = $row[3];
		$duration=$time/60;
		echo "<tr><td>$name</td><td>$numberOfQuestions</td><td>$duration</td><td><a href='test.php?test_id=$testId'>Test</a></td></tr>";
	}

echo <<<MULTI_LINE_STRING
	</table>
	<hr />
MULTI_LINE_STRING;
}

$studentId = $_SESSION['id'];
	$query = "SELECT questionId FROM Answers WHERE studentId='$studentId'";
	$result = mysqli_query($connection, $query);
	$questionIds = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$questionId = $row['questionId'];
		$questionIds[] = $questionId;
	}
	$testIds = [];

	$i = 0;
	foreach ($questionIds as $questionId) {
		$query = "SELECT Tests.test_id as x, name FROM Questions INNER JOIN Tests ON Questions.test_id=Tests.test_id WHERE questionId='$questionId'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);
		$testIds[$row['x']] = $row['name'];
	}

	echo '<table><tr><th>Name</th><th>Action</th></tr>';
	foreach ($testIds as $testId => $name) {
		echo "<tr><td>$name</td><td><a href=\"show_result.php?test_id=$testId\">Review</a></td></tr>";
	}
	echo '</table>';

?>
    </body>
    </html>
