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


$year = $_POST['customYear'];
$month = $_POST['customMonth'];
$day = $_POST['customDay'];
$dateFormatted = $year . '-' . $month . '-' . $day;

$userQuery = "SELECT SUM(payment_earned) AS Money_Earned, SUM(class_length) AS Hours_Worked, AVG(payment_earned) AS Avg_Each_Class FROM classdata WHERE date_of_class = '$dateFormatted'";
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
	print("<h1>Your Custom Report</h1>");
	print("<table border = \"1\">");
	print("<tr> <th>Money_Earned</th><th>Hours_Worked</th> <th>Average $ Earned Per Class</th> </tr>");
	while ($row = mysqli_fetch_assoc($result))
	{
		print("<tr><td> $".$row['Money_Earned']."</td> <td>".$row['Hours_Worked']."</td> <td> $".$row['Avg_Each_Class']."</td> </tr>");
	}
	print("</table>");
	
}



mysqli_close($connect);   // close the connection

?>


</body>
</html>