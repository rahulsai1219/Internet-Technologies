<html>
<head>
<style>
table,td,th{
border: 1px solid black;
padding:5px;
}
</style>
</head>
</html>


<?php
$con=mysqli_connect("localhost","root","","equizz") or die ("Error connecting to DB");
$query="SELECT name, id from dummy";
$res=mysqli_query($con,$query) or die ("Error querying DB");

echo <<<MULTI_LINE_STRING
	<table>
	<tr>
	<th>S_ID</th>
	<th>Name</th>
	<th>Action</th>
	</tr> 
MULTI_LINE_STRING;
while($row=mysqli_fetch_array($res))
{
	$name=$row[0];
	$studentID=$row[1];
	echo <<<MULTI_LINE_STRING
	 
	<tr>
	<td>$studentID</td>
	<td>$name</td>
	<td><a href='block.php?id=$studentID'>Block</a></td>
	</tr>
MULTI_LINE_STRING;
}	
echo "</table>";
