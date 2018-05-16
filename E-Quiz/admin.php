<?php

session_start();

if (!(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true)) {
    header('Location: home.html');
    exit(0);
}
 ?>


<html>
<head>
<script>
function valid()
{
    if(document.val.name.value.length<3)
    {
        alert("Name should be more than 3 letters");
        document.val.name.focus();
        return false;
    }
    if(!isNaN(document.val.name.value))
    {
        alert("Please don't enter numbers!!");
        document.val.name.focus();
        return false;
    }
}
</script>


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
    </style>
</head>

    <body id="grad">
<header><pre> <img style="height:220x;width:190px;" src="logo.png"><span style="float:right"><h3>Admin Portal                                                                             </h3></pre></span></header><br><br><br><br>

<button onclick="document.getElementById('id01').style.display='block'" style="padding:3px;border-radius:15px;color:black;background-color:white"class="text">Add Student</button><br><br>
<center>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form name="val" onsubmit="valid()" style="width:450px"class="modal-content" method="post" action="add_stud.php">
    <div style="width:430px;height:450px" class="container">
      <h1 style="color:#FF293D">ADD Student</h1>

      <hr>
      <label ><b>Student Name</b></label>
      <input type="text" placeholder="Student name" name="name" required>
      <br><br>
      <label ><b>Student ID</b></label>
      <input type="text" placeholder="Student ID" name="id" required>
<br><br>
      <label ><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
<br>



      <div class="clearfix">
        <button type="button"style="background-color:red;color:white;padding:5px;height:30px" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" style="background-color:green;color:white;padding:5px;height:30px" class="signupbtn">ADD Student</button>
      </div>
    </div>
  </form>
</div>
</center>


<button onclick="document.getElementById('id02').style.display='block'" style="padding:3px;border-radius:15px;color:black;background-color:white"class="text">Add Faculty</button><br><br>
<center>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form style="width:450px"class="modal-content" method="post" action="add_faculty.php">
    <div style="width:430px;height:450px;" class="container">
      <h1 style="color:#FF293D">ADD Faculty</h1>

      <hr>
      <label ><b>Faculty name</b></label>
      <input type="text" placeholder="Faculty name" name="name" required>
      <br><br>
      <label ><b>Faculty ID</b></label>
      <input type="text" placeholder="Faculty ID" name="id" required>
<br><br>
      <label ><b>Password</b></label>
      <input type="password" placeholder="Faculty Password" name="psw" required>
<br><br>

      <div class="clearfix">
        <button type="button"style="background-color:red;color:white;padding:5px;height:30px" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" style="background-color:green;color:white;padding:5px;height:30px" class="signupbtn">ADD Facuty</button>
      </div>
    </div>
  </form>
</div>

    <?php
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error == 'user_already_exists') {
            echo '<h1 style="color: #ffffff">Error: User already exists. Please try again with a different user ID.</h1>';
        }
    }
    ?>

</center>








    </body>
    </html>
