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

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
$psw = $_POST['psw'];
$pswConfirm = $_POST['pswConfirm'];
if ($psw === $pswConfirm) {
	$userQuery = ("INSERT INTO users (first_name, last_name, email, password) 
				VALUES ('$firstName', '$lastName', '$emailAddress', '$psw') ");
}
else {
	echo "<h1>PASSWORDS DONT MATCH</h1>";
}

$result = mysqli_query($connect, $userQuery);
mysqli_close($connect);   // close the connection

?>
<br>
<button onclick="window.location.href='signUp.html'">Go Back</button>
</body>
</html>