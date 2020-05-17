<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['category'] == 'Student') {
    	header('Location: logout.php');
    	die();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Instructor's Room</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<style>
		body {
			margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }

        .topnav-right {
            float: right;
        }
    </style>
</head>

<body>
	<div class="w3-card w3-margin w3-padding">
		<h2><?php echo 'Welcome, '.$_SESSION['last_name'].' !!!'; ?></h2>
		<div class="topnav">
			<a class="active" href="#performance">Performance</a>
            <a href="#set_paper">Make Test</a>
            <a onclick="result()">Result</a>
            <div class="topnav-right">
                <a onclick="profile()">Profile</a>
                <a onclick="move()">Logout</a>
            </div>
        </div>
	</div>

	<div id="performance" class="w3-card w3-margin w3-padding">
		<h2>See Student Performance</h2>
		<form method="POST" action="report.php" class="w3-container">
			<label class="w3-label w3-textblue">Email of the Student</label>
			<input class="w3-input w3-border" type="text" name="email">

			<label class="w3-label w3-textblue">Date of the Test</label>
			<input class="w3-input w3-border" type="date" name="e_date">
			<br>

			<input class="w3-button w3-blue" type="submit" value="SUBMIT">
		</form>
	</div>

	<div id="set_paper" class="w3-card w3-margin w3-padding">
		<h2><?php echo 'Schedule and make a Test for '.$_SESSION['class'].' students !!'; ?></h2>
		<form method="POST" action="test.php" class="w3-container">
			<label class="w3-label w3-textblue">Question 1</label>
			<input class="w3-input w3-border" type="text" name="Q1">
			<br>
			<div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OA1" placeholder="Option A">
                </div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OB1" placeholder="Option B">
                </div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OC1" placeholder="Option C">
                </div>
            </div>
            <label class="w3-label w3-textblue">Answer 1</label>
			<select class="w3-input w3-border" type="text" name="A1">
				<option value="Option1">Option1</option>
				<option value="Option2">Option2</option>
				<option value="Option3">Option3</option>
			</select>
			<br>

			<label class="w3-label w3-textblue">Question 2</label>
			<input class="w3-input w3-border" type="text" name="Q2">
			<br>
			<div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OA2" placeholder="Option A">
                </div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OB2" placeholder="Option B">
                </div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OC2" placeholder="Option C">
                </div>
            </div>
            <label class="w3-label w3-textblue">Answer 2</label>
			<select class="w3-input w3-border" type="text" name="A2">
				<option value="Option1">Option1</option>
				<option value="Option2">Option2</option>
				<option value="Option3">Option3</option>
			</select>
			<br>

			<label class="w3-label w3-textblue">Question 3</label>
			<input class="w3-input w3-border" type="text" name="Q3">
			<br>
			<div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OA3" placeholder="Option A">
                </div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OB3" placeholder="Option B">
                </div>
                <div class="w3-third">
                    <input class="w3-input w3-border" type="text" name="OC3" placeholder="Option C">
                </div>
            </div>
            <label class="w3-label w3-textblue">Answer 3</label>
			<select class="w3-input w3-border" type="text" name="A3">
				<option value="Option1">Option1</option>
				<option value="Option2">Option2</option>
				<option value="Option3">Option3</option>
			</select>
			<br>

			<label class="w3-label w3-textblue">Date of the Test</label>
			<input class="w3-input w3-border" type="date" name="ex_date">
			<br>

			<input class="w3-button w3-blue" type="submit" value="SUBMIT">
		</form>
	</div>
</body>
</html>

<script>
	function move() {
		window.location = 'logout.php';
	}
	function profile() {
		window.location = 'profile.php';
	}
	function result() {
		window.location = 'result.php';
	}
</script>