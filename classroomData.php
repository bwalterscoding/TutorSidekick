<!DOCTYPE html>
<html>
<head>
	<title>Process Input</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Cache-control" content="no-cache">
</head>
<body>
	<header>
		<h1 id="title">Tutor Sidekick</h1>
	</header>

	<h2>SUCCESS!</h2>

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

$classLength = $_POST['classLength'];
$hourlyRate = $_POST['hourlyRate'];
$payment_earned = $classLength * $hourlyRate;
$classCode = $_POST['classCode'];
$dateOfClass = $_POST['dateOfClass'];
$time = $_POST['time'];
$classComments = $_POST['commentBox'];

$userQuery = ("INSERT INTO classdata (payment_earned, class_length, class_code, date_of_class, class_start_time, class_comments) 
				VALUES ('$payment_earned', '$classLength', '$classCode', '$dateOfClass', '$time', '$classComments') ");

$result = mysqli_query($connect, $userQuery);
mysqli_close($connect);   // close the connection

?>

<button onclick="window.location.href='classroomDataEntry.html'">Enter another class</button><br>
<button onclick="window.location.href='firstPage.html'">Go Home</button>

</body>
</html>