<!DOCTYPE html>
<html>
<head>
	<title></title>
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

$studentName = $_POST['studentName'];
$studentClassCode = $_POST['studentClassCode'];
$studentAge = $_POST['studentAge'];
$studentLocation = $_POST['studentLocation'];
$studentLevel = $_POST['studentLevel'];
$studentBirthday = $_POST['studentBirthday'];

$userQuery = ("INSERT INTO students (name, class_code, age, location, level, birthday)
				VALUES ('$studentName','$studentClassCode','$studentAge','$studentLocation','$studentLevel','$studentBirthday')");

$result = mysqli_query($connect, $userQuery);
mysqli_close($connect);   // close the connection

?>

<p>Yay</p>

</body>
</html>