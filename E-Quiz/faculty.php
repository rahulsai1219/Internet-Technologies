<?php

session_start();
if (!(isset($_SESSION['faculty_logged_in']) && $_SESSION['faculty_logged_in'] == true)) {
	header('Location: home.html');
	exit(0);
}

?>

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

input[type=text], input[type=password], input {
    width: 30%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border-radius:10px;
    border: none;
    background: white;
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
<header><pre> <img style="height:220x;width:190px;" src="logo.png"><span style="float:right"><h3>Faculty Portal                                                                             <a href="logout.php">Logout</a></h3></pre></span></header><br><br><br><br>



<a href="faculty.php?action=add_subject" style="text-decoration: none; padding:16px;border-radius:15px;color:black;background-color:white;" class="text"><b>Add Subject</b></a>&nbsp &nbsp &nbsp &nbsp

<a style="padding:3px;border-radius:15px;color:black;background-color:white; text-decoration: none; padding: 16px;" class="text" href="score_board.php"><b>View Result</b></a>

<?php
if (isset($_GET['action'])) {
	$action = $_GET['action'];
	if ($action == 'add_subject') {
		echo <<<MULTI_LINE_STRING
		<br><Br>
		<form action="add_subject.php" method="post">
			
			<input placeholder="Enter subject name" type="text" name="subject" /><br>
			&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp	&nbsp &nbsp&nbsp &nbsp<input  style="border:solid black;width:100px;height:45px;background-color:white;border-radius:15px" type="submit" value="Add Subject"></input>
		</form>
MULTI_LINE_STRING;
	}
	elseif ($action == 'add_test') {
		$subjectId = $_GET['subject_id'];
		echo <<<MULTI_LINE_STRING
		<br><br><br><Br>
		<form action="faculty.php" method="get">
			<input style="display: none" name="action" value="add_questions" />
			<input style="display: none" name="subject_id" value="$subjectId" />

			<input placeholder="Test name" type="text" name="name" />
			<br />
			
			<input placeholder="Number of questions" type="text" name="questions" />
			<br />
			
			<input placeholder="Duration(mins)" type="text" name="duration" />
			<br />
			<br />
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<input style="width:10%;border-radius:25%;border:solid black" type="submit" value="Add Test" />
		</form>
MULTI_LINE_STRING;
	}
	elseif ($action == 'add_questions') {
		$subjectId = $_GET['subject_id'];
		$name = $_GET['name'];
		$numberOfQuestions = (int)$_GET['questions'];
		$duration = $_GET['duration'];
		
		echo <<<MULTI_LINE_STRING
		<br><Br>
		<form action="add_test.php" method="post">
			&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp<label><b>Test details</b></label><br>
			<input type="text"  name="name" value="$name" /><br>
			<input type="text"  name="numberOfQuestions" value="$numberOfQuestions" /><br>
			<input type="text"  name="duration" value="$duration" /><br>
			<input type="text" name="subject_id" value="$subjectId" style="display: none" />
MULTI_LINE_STRING;
		
		$i = 1;
		while ($i <= $numberOfQuestions) {
			echo <<<MULTI_LINE_STRING
			<center><label><br>Question $i<b></label></center>
			<br />
			<input type="text" style="width:100%" placeholder="Question" name="question_$i" /><br>
			<input type="text" placeholder="Option 1" name="question_$i-option_1" /><br>
			<input type="text" placeholder="Option 2" name="question_$i-option_2" /><br>
			<input type="text" placeholder="Option 3" name="question_$i-option_3" /><br>
			<input type="text" placeholder="Option 4" name="question_$i-option_4" /><br>
			<br />
			<input type="text" placeholder="Correct option number(Answer)" name="question_$i-answer" /><br>
			<br />
			<hr />
MULTI_LINE_STRING;
			$i++;
		}
		echo <<<MULTI_LINE_STRING
		<input type="submit" value="Submit" />
	</form>
MULTI_LINE_STRING;
	}
}

if (isset($_GET['error'])) {
	$error = $_GET['error'];
	if ($error == 'subject_already_exists') {
		echo '<h1>Error: The specified subject already exists.</h1>';
	}
}

$id = $_SESSION['id'];
$connection = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");
$query = "SELECT * FROM subjects where faculty='$id'";
$result = mysqli_query($connection, $query);
echo'<center>';
echo'<br>';
echo '<table>
<tr>
	<th>Subject</th>
	<th>Action</th>
	</tr>';
$numberOfQuestions = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result)) {
	
	$subject_id = $row['subjectId'];
	$name = $row['name'];
	echo <<<MULTI_LINE_STRING
	<tr>
	<td>$name</td>
	<td><a href="faculty.php?action=add_test&subject_id=$subject_id"&numberOfQuestions="$numberOfQuestions">Add Test</a></td>
	</tr>
MULTI_LINE_STRING;
}
echo '</table>';
echo '</center>';
?>

    </body>
    </html>
