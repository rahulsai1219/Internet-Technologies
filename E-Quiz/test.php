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

#timer {
	font-size: 32px;
	font-family: 
}

    </style>
</head>

    <body id="grad">
<header><pre> <img style="height:220x;width:190px;" src="logo.png"><span style="float:right"><h3>Student Portal                                                                             </h3></pre></span></header><br><br><br><br>

<?php
session_start();
$connection = mysqli_connect("localhost", "root", "","equizz") or die ("could not connect to database");
$testId = $_GET['test_id'];

$query = "SELECT * FROM tests WHERE test_id='$testId'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$duration = $row['duration'];
echo <<<MULTI_LINE_STRING
<script>
var duration = $duration;
var xyz = setInterval(timer, 1000);
var redirectionDuration = 0;
function timer() {
	if (duration <= 0) {
		var date = new Date(null);
		date.setSeconds(redirectionDuration);
		document.getElementById("timer").innerHTML = '<b><span style="color: red">Times up! You will be redirected in ' + date.toISOString().substr(11, 8) + ' </span></b>';
		if (redirectionDuration == 0) {
			document.getElementById("verify").click();
		}
		redirectionDuration--;
	}
	else {
		var date = new Date(null);
		date.setSeconds(duration);
		document.getElementById("timer").innerHTML = date.toISOString().substr(11, 8);
		duration--;
		
		if (duration == 0) {
			document.getElementById("timer").innerHTML = '<b><span style="color: red">Times up!</span></b>';
			redirectionDuration = 5;
		}
	}
}
</script>
Timer: <span id="timer"></span>
MULTI_LINE_STRING;

$query = "SELECT * FROM Questions WHERE test_id = '$testId'";
$result = mysqli_query($connection, $query);
$questionCount = mysqli_num_rows($result);
$i = 0;
echo	'<form action="result.php" method="POST">';
echo "<input type=\"text\" name=\"questionCount\" value=\"$questionCount\" style=\"display: none\"></input>";
echo "<input type=\"text\" name=\"testId\" value=\"$testId\" style=\"display: none\"></input>";
while ($row = mysqli_fetch_assoc($result)) {
	$question_id = $row['questionId'];
	$testId = $row['test_id'];
	$question = $row['question'];
	$option1 = $row['option1'];
	$option2 = $row['option2'];
	$option3 = $row['option3'];
	$option4 = $row['option4'];
	$answer = $row['answer'];
	echo <<<MULTI_LINE_STRING
	<p>$question</p>
		<input type="text" name="question_$i" value="$question_id" style="display: none"></input>
		<input type="radio" name="answer_$question_id" value="1">$option1</input><br />
		<input type="radio" name="answer_$question_id" value="2">$option2</input><br />
		<input type="radio" name="answer_$question_id" value="3">$option3</input><br />
		<input type="radio" name="answer_$question_id" value="4">$option4</input><br />
		<hr />
MULTI_LINE_STRING;
	$i = $i + 1;
}
echo '<input type="submit" id="verify" value="Verify"></input>';
echo '</form>';

?>
    </body>
    </html>
