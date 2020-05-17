<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>

<body>
	<div class="w3-card w3-margin w3-padding">
		<h2>Register</h2>
		<form method="POST" action="register.php" class="w3-container">
			<label class="w3-label w3-textblue">First Name</label>
			<input class="w3-input w3-border" type="text" name="first_name">

			<label class="w3-label w3-textblue">Last Name</label>
			<input class="w3-input w3-border" type="text" name="last_name">

			<label class="w3-label w3-textblue">Email</label>
			<input class="w3-input w3-border" type="text" name="email">

			<label class="w3-label w3-textblue">Password</label>
			<input class="w3-input w3-border" type="password" name="password1">

			<label class="w3-label w3-textblue">Confirm Password</label>
			<input class="w3-input w3-border" type="password" name="password2">

			<label class="w3-label w3-textblue">Class</label>
			<select class="w3-input w3-border" type="text" name="class">
				<option value="Class1">Class1</option>
				<option value="Class2">Class2</option>
				<option value="Class3">Class3</option>
			</select>

			<label class="w3-label w3-textblue">Category</label>
			<select class="w3-input w3-border" type="text" name="category">
				<option value="Student">Student</option>
				<option value="Instructor">Instructor</option>
			</select>
			<br>
			<input class="w3-button w3-blue" type="submit" value="SUBMIT">
		</form>
	</div>

	<div class="w3-card w3-margin w3-padding">
		<form action="login.php" class="w3-container">
		    <label class="w3-label w3-textblue">Already a registered user ??</label>
            <input class="w3-button w3-blue" type="submit" value="LOG IN">
        </form>
    </div>
</body>
</html>

