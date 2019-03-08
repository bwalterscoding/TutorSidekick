<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
		<h1>Tutor Sidekick</h1>
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="login.html">Login</a></li>
			</ul>
		</nav>
	</header>

	<form action="signUp.php" method="post">
		<div id="signUpForm">
			<h2>Create an Account</h2>

			<label for="email">Email</label>
			<input type="email" name="email" required><br>

			<label for="psw">Password</label>
			<input type="password" name="psw" required><br>
			
			<label for="pswConfirm">Confirm Password</label>
			<input type="password" name="pswConfirm" required><br>

			<button type="submit" form="">Sign Up!</button>
		</div>
	</form>
	
</body>
</html>