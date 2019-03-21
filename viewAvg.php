<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Cache-control" content="no-cache">
</head>
<body>

	<header>
		<h1 id="title">TutorSidekick</h1>
		<nav>
			<ul>
				
				<li><a href="firstPage.html">Home</a></li>
				<li><a href="classroomDataEntry.html">Classroom Data Entry</a></li>
				<li><a href="newStudentEntry.html">Student Data Entry</a></li>
			</ul>
		</nav>
	</header>

<?php

$server = "localhost";
$user = "root";
$pw = "";
$db = "tutor_sidekick";
$connect = mysqli_connect($server, $user, $pw, $db);
if( !$connect) 
{
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$userQuery = "SELECT AVG(hourly_rate) AS avg FROM classdata";
$result = mysqli_query($connect, $userQuery);

if (!$result)
{
	die("Could not successfully run query ($userQuery) from $db: ". mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0)
{
	print("No records found with query $userQuery");
}
else
{
	print("<h1>Average Salary</h1>");
	
	while ($row = mysqli_fetch_assoc($result))
	{
		echo 'Your average hourly rate is $',round($row['avg']), ' per hour<br>';
	}
	
}



mysqli_close($connect);   // close the connection
?>
<br>
<button onclick="window.location.href='viewTotals.html'">View Another Total</button>

</body>
</html>