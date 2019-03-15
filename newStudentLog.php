<!DOCTYPE html>
<html>
<head>
	<title>Student Data Entry</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
		<h1 id="title">Tutor Sidekick</h1>
		<p>A tool that tracks student's progress, hours, and payments</p>
		
		
		<nav>
			<ul>
				<li><a href="firstPage.html">Home</a></li>
				<li><a href="login.html">Login</a></li>
				<li><a href="signUp.html">Sign Up</a></li>
				<li><a href="classroomDataEntry.html">Classroom Data Entry</a></li>
			</ul>
		</nav>
	</header>

	<form action="newStudentLog.php" method="post">
		<div class="classDataDiv">
			<table>
				<tr><td><label for="studentName">Student Name</label></td>
					<td><input type="text" name="studentName"></td></tr>

				<tr><td><label for="studentClassCode"></label>Class Code</td><td><input type="text" name="studentClassCode"></td></tr>

				<tr><td><label for="studentAge">Age</label></td><td><input type="number" name="studentAge"></td></tr>

				<tr><td><label for="studentLevel"></label>Level</td><td><input type="number" name="studentLevel"></td></tr>

				<tr><td><input type="submit" name="submitButton" value="Submit" form="newStudentLog.php"> </td></tr>
			</table>
		</div>
	</form>

</body>
</html>