<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>

<body>
	<div class="w3-card w3-margin w3-padding">
		<h2>Login</h2>
		<form method="POST" action="page.php" class="w3-container">
			<label class="w3-label w3-textblue">Email</label>
			<input class="w3-input w3-border" type="text" name="email">

			<label class="w3-label w3-textblue">Password</label>
			<input class="w3-input w3-border" type="password" name="password1">

			<label class="w3-label w3-textblue">Category</label>
			<select class="w3-input w3-border" type="text" name="category">
				<option value="Student">Student</option>
				<option value="Instructor">Instructor</option>
			</select>
			<br>
			<input class="w3-button w3-blue" type="submit" value="SUBMIT">
		</form>
	</div>
</body>
</html>