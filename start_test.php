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
	<title>Take a test</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://www.w3schools.com/w3css/4/w3.css">
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
			<a onclick="go_back()">See my Performance</a>
            <a class="active">Take Test</a>
            <a onclick="result()">Result</a>
            <div class="topnav-right">
                <a onclick="profile()">Profile</a>
                <a onclick="move()">Logout</a>
            </div>
        </div>
	</div>

	<div class="w3-card w3-margin w3-padding">
		<h2>Welcome to the test !!!</h2>
        <h3>You can only submit once</h3>

        <?php 
            $username = 'id13737626_mydb';
            $dbpassword = 'g<W>rc&D=tH9zbNR';
            $dbname = 'id13737626_studentdb';

            $dbc = mysqli_connect('localhost',$username,$dbpassword,$dbname) or die('Error connecting to MySql Server');
            $test_key = $_SESSION['test_key'];

            $query = "SELECT * FROM tests WHERE id = '$test_key'";
            $result = mysqli_query($dbc, $query);

            $row = mysqli_fetch_array($result);

            mysqli_close($dbc);
        ?>

        <form method="POST" class="w3-container w3-card-4" action="submit_ans.php">
            <h4><?php echo $row['q1']; ?></h4>
                <input class="w3-radio" type="radio" name="a1" value="Option1">
                <label><?php echo $row['oa1']; ?></label><br>
                <input class="w3-radio" type="radio" name="a1" value="Option2">
                <label><?php echo $row['ob1']; ?></label><br>
                <input class="w3-radio" type="radio" name="a1" value="Option3">
                <label><?php echo $row['oc1']; ?></label><br>

            <h4><?php echo $row['q2']; ?></h4>
                <input class="w3-check" type="radio" name="a2" value="Option1">
                <label><?php echo $row['oa2']; ?></label><br>
                <input class="w3-check" type="radio" name="a2" value="Option2">
                <label><?php echo $row['ob2']; ?></label><br>
                <input class="w3-check" type="radio" name="a2" value="Option3">
                <label><?php echo $row['oc2']; ?></label><br>

            <h4><?php echo $row['q3']; ?></h4>
                <input class="w3-check" type="radio" name="a3" value="Option1">
                <label><?php echo $row['oa3']; ?></label><br>
                <input class="w3-check" type="radio" name="a3" value="Option2">
                <label><?php echo $row['ob3']; ?></label><br>
                <input class="w3-check" type="radio" name="a3" value="Option3">
                <label><?php echo $row['oc3']; ?></label><br>
            
            <br>
            <input class="w3-button w3-blue" type="submit" value="SUBMIT">
            <br>
            <br>
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
    function go_back() {
        window.location = 'student.php';
    }
</script>