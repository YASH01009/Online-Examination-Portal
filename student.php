<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['category'] == 'Instructor') {
    	header('Location: logout.php');
    	die();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student's Room</title>
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
			<a class="active" href="#performance">See my Performance</a>
            <a onclick="take_test()">Take Test</a>
            <a onclick="result()">Result</a>
            <div class="topnav-right">
                <a onclick="profile()">Profile</a>
                <a onclick="move()">Logout</a>
            </div>
        </div>
	</div>

    <div id="performance" class="w3-card w3-margin w3-padding">
        <h2>See my Performance</h2>
        <form method="POST" action="report.php" class="w3-container">

            <label class="w3-label w3-textblue">Date of the Test</label>
            <input class="w3-input w3-border" type="date" name="e_date">
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
        window.location = 'sprofile.php';
    }
    function result() {
        window.location = 'result.php';
    }
    function take_test() {
        window.location = 'take_test.php';
    }
</script>