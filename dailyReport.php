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

$userQuery = "SELECT SUM(payment_earned) AS Money_Earned, SUM(class_length) AS Hours_Worked, AVG(payment_earned) AS Avg_Each_Class FROM classdata WHERE date_of_class = CURRENT_DATE()";
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
	print("<h1>Your Daily Earnings Report</h1>");
	print("<table border = \"1\">");
	print("<tr> <th>Money_Earned</th><th>Hours_Worked</th> <th>Average $ Earned Per Class</th> </tr>");
	while ($row = mysqli_fetch_assoc($result))
	{
		print("<tr><td> $".$row['Money_Earned']."</td> <td>".$row['Hours_Worked']."</td> <td> $".$row['Avg_Each_Class']."</td> </tr>");
	}
	print("</table>");
}



$userQuery2 = "SELECT s.name, s.class_code, c.class_start_time, c.class_comments
				FROM students s, classdata c
				WHERE c.date_of_class = CURRENT_DATE()
				AND s.class_code = c.class_code
				ORDER BY c.class_start_time";
$result2 = mysqli_query($connect, $userQuery2);

if (!$result2)
{
	die("Could not successfully run query ($userQuery2) from $db: ". mysqli_error($connect) );
}

if (mysqli_num_rows($result2) == 0)
{
	print("No records found with query $userQuery");
}

else 
{
	print("<h2>Daily Class Details</h2>");
	print("<table border = \"1\">");
	print("<tr> <th>Students</th><th>Class Code</th> <th>Time</th> <th>Comments</th> </tr>");
	while ($row2 = mysqli_fetch_assoc($result2))
		{
			print("<tr><td> ".$row2['name']."</td> <td>".$row2['class_code']."</td> <td>".$row2['class_start_time']."</td> <td> ".$row2['class_comments']."</td> </tr>");
		}
	print("</table>");
	}

mysqli_close($connect);   // close the connection

?>


</body>
</html>