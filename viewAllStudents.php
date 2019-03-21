<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Cache-control" content="no-cache">
</head>
<body>

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

$userQuery = "SELECT name, location FROM students ORDER BY location";
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
	print("<h1>Your students</h1>");
	print("<table border = \"1\">");
	print("<tr><th>First Name</th><th>Location</th></tr>");
	while ($row = mysqli_fetch_assoc($result))
	{
		print("<tr><td>".$row['name']."</td><td>".$row['location']."</td></tr>");
	}
	print("</table>");
}



mysqli_close($connect);   // close the connection
?>
<br>
<button onclick="window.location.href='viewTotals.html'">View Another Total</button>

</body>
</html>