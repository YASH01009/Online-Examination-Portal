<?php
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $category = $_POST['category'];

    if($first_name == '') {
    	header('Location: index.php');
    	die();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>

<body>
	<div class="w3-card w3-margin w3-padding">
		<h2>User Profile</h2>
		<h3> <?php echo $first_name . $last_name; ?> </h3>
        <ul>
        	<li> Email : <?php echo $email; ?> </li>
        	<li> Class : <?php echo $class; ?> </li>
        </ul>
	</div>
</body>

<?php

$username = 'id13737626_mydb';
$dbpassword = 'g<W>rc&D=tH9zbNR';
$dbname = 'id13737626_studentdb';

$dbc = mysqli_connect('localhost',$username,$dbpassword,$dbname) or die('Error connecting to MySql Server');

if($category == 'Student') {
    $query = "INSERT INTO students(first_name, last_name, email, password, class, c_score) ".
             "VALUES ('$first_name', '$last_name', '$email', '$password2', '$class', 0)";

    $result = mysqli_query($dbc, $query) or die('Error querying database');

    mysqli_close($dbc);
}

if($category == 'Instructor') {
    $query = "INSERT INTO instructors(first_name, last_name, email, password, class) ".
             "VALUES ('$first_name', '$last_name', '$email', '$password2', '$class')";

    $result = mysqli_query($dbc, $query) or die('Error querying database');

    mysqli_close($dbc);
}

?>
</html>