<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['category'] == 'Instructor') {
    	header('Location: logout.php');
    	die();
    }

    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];

    $test_key = $_SESSION['test_key'];

    $username = 'id13737626_mydb';
    $dbpassword = 'g<W>rc&D=tH9zbNR';
    $dbname = 'id13737626_studentdb';

    $dbc = mysqli_connect('localhost',$username,$dbpassword,$dbname) or die('Error connecting to MySql Server');

    $query = "SELECT a1, a2, a3, c1, c2, c3 FROM tests WHERE id = '$test_key'";
    $result = mysqli_query($dbc, $query);

    $row = mysqli_fetch_array($result);

    $score = 0;

    if($row['a1'] == $a1) {
    	$score += 1;
    	$c1 = $row['c1'] + 1;
    	$query1 = "UPDATE tests SET c1 = '$c1' WHERE id = '$test_key'";
    	$result1 = mysqli_query($dbc, $query1);
    }

    if($row['a2'] == $a2) {
    	$score += 1;
    	$c2 = $row['c2'] + 1;
    	$query2 = "UPDATE tests SET c2 = '$c2' WHERE id = '$test_key'";
    	$result2 = mysqli_query($dbc, $query2);
    }

    if($row['a3'] == $a3) {
    	$score += 1;
    	$c3 = $row['c3'] + 1;
    	$query3 = "UPDATE tests SET c3 = '$c3' WHERE id = '$test_key'";
    	$result3 = mysqli_query($dbc, $query3);
    }
    
     $student_id = $_SESSION['id'];
    if($score > 0) {
        $query4 = "SELECT c_score FROM students WHERE id = '$student_id'";
        $result4 = mysqli_query($dbc, $query4);
        $row = mysqli_fetch_array($result4);

        $cs = $row['c_score'] + $score;
        $query5 = "UPDATE students SET c_score = '$cs' WHERE id = '$student_id'";
        $result5 = mysqli_query($dbc, $query5);
    }

    $query6 = "INSERT INTO responses(a1, a2, a3, score, test_key) ".
              "VALUES('$a1', '$a2', '$a3', '$score', '$test_key')";
    $result6 = mysqli_query($dbc, $query6);
    $last_id = mysqli_insert_id($dbc);

    $test_name = $_SESSION['test_name'];
    $query7 = "UPDATE students SET $test_name = '$last_id' WHERE id = '$student_id'";
    $result7 = mysqli_query($dbc, $query7);

    mysqli_close($dbc);

    header('Location: student.php');
?>