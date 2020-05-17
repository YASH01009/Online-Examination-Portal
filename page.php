<?php
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $category = $_POST['category'];

    $username = 'id13737626_mydb';
    $dbpassword = 'g<W>rc&D=tH9zbNR';
    $dbname = 'id13737626_studentdb';

    $dbc = mysqli_connect('localhost',$username,$dbpassword,$dbname) or die('Error connecting to MySql Server');

    if($category == 'Student') {
    	$query = "SELECT * FROM students WHERE email = '$email' AND password = '$password1' ";
    }
    else {
    	$query = "SELECT * FROM instructors WHERE email = '$email' AND password = '$password1' ";
    }

    $result = mysqli_query($dbc, $query) or die('Error querying database');
    $row = mysqli_fetch_array($result);

    if(!$row) {
    	header('Location: login.php');
    	die();
    }
    else {
    	session_start();
    	$_SESSION['email'] = $email;
    	$_SESSION['id'] = $row['id'];
    	$_SESSION['category'] = $category;
    	$_SESSION['first_name'] = $row['first_name'];
    	$_SESSION['last_name'] = $row['last_name'];
    	$_SESSION['class'] = $row['class'];

    	if($category == 'Student') {
    		header('Location: student.php');
    	}
    	else {
    		header('Location: instr.php');
    	}
    }

    mysqli_close($dbc);
?>