<!DOCTYPE html>
<html>
<head>
	<title>Account Created!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<header>
		<h1 id="title">TutorSidekick</h1>
		<nav>
			<ul>
				
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



$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$emailAddress = $_POST['emailAddress'];
$username = $_POST['username'];
$psw = $_POST['psw'];
$pswConfirm = $_POST['pswConfirm'];
if ($psw === $pswConfirm) {
	$userQuery = ("INSERT INTO users (first_name, last_name, username, email, password) 
				VALUES ('$firstName', '$lastName', '$username', '$emailAddress', '$psw') ");
}
else {
	echo "<h1>PASSWORDS DONT MATCH</h1>";
}

$result = mysqli_query($connect, $userQuery);
mysqli_close($connect);   // close the connection

?>
<br>
<h1 style="background-color: #a4a4eb">Account Successfully Created!</h1>
<button onclick="window.location.href='login.html'">Login</button>
</body>
</html>