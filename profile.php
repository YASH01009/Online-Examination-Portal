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
	<title>User Profile</title>
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
			<a onclick="move()">Performance</a>
            <a onclick="move()">Make Test</a>
            <a onclick="result()">Result</a>
            <div class="topnav-right">
                <a class="active">Profile</a>
                <a onclick="logout()">Logout</a>
            </div>
        </div>
	</div>

	<div class="w3-card w3-margin w3-padding">
		<h2>User Profile</h2>
		<h3> <?php echo $_SESSION['first_name'] . $_SESSION['last_name']; ?> </h3>
        <ul>
        	<li> Email : <?php echo $_SESSION['email']; ?> </li>
        	<li> Class : <?php echo $_SESSION['class']; ?> </li>
        </ul>
	</div>
</body>
</html>

<script>
	function move() {
		window.location = 'instr.php';
	}
	function result() {
		window.location = 'result.php';
	}
	function logout() {
		window.location = 'logout.php';
	}
</script>