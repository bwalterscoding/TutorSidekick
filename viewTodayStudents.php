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

$userQuery = "SELECT c.class_start_time, c.class_code, s.name, c.date_of_class
			FROM classdata c, students s
			WHERE c.class_code = s.class_code 
			AND date_of_class = CURRENT_DATE() 
			ORDER BY c.class_start_time
			";
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
	print("<h1>Here are the classes you taught today</h1>");
	print("<table border = \"1\">");
	print("<tr> <th>Time</th> <th>Class Code</th> <th>Name</th> <th>Date</th> </tr>");
	while ($row = mysqli_fetch_assoc($result))
	{
		print("<tr><td>".$row['class_start_time']."</td><td>".$row['class_code']."</td><td>".$row['name']."</td> <td>".$row['date_of_class']."</td> </tr>");
	}
	print("</table>");
}



mysqli_close($connect);   // close the connection

?>

</body>
</html>