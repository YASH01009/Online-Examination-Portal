<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['category'] == 'Student') {
    	header('Location: logout.php');
    	die();
    }

    $q1 = $_POST['Q1'];
    $q2 = $_POST['Q2'];
    $q3 = $_POST['Q3'];

    $oa1 = $_POST['OA1'];
    $ob1 = $_POST['OB1'];
    $oc1 = $_POST['OC1'];

    $oa2 = $_POST['OA2'];
    $ob2 = $_POST['OB2'];
    $oc2 = $_POST['OC2'];

    $oa3 = $_POST['OA3'];
    $ob3 = $_POST['OB3'];
    $oc3 = $_POST['OC3'];

    $a1 = $_POST['A1'];
    $a2 = $_POST['A2'];
    $a3 = $_POST['A3'];

    $date = $_POST['ex_date'];;
    $class = $_SESSION['class'];

    $id = $_SESSION['id'];

    $username = '';
    $dbpassword = '';
    $dbname = '';

    $dbc = mysqli_connect('localhost',$username,$dbpassword,$dbname) or die('Error connecting to MySql Server');

    $query = "INSERT INTO tests(class, q1, q2, q3, oa1, ob1, oc1, a1, oa2, ob2, oc2, a2, oa3, ob3, oc3, a3, test_date, c1, c2, c3) ".
             "VALUES ('$class', '$q1', '$q2', '$q3', '$oa1', '$ob1', '$oc1', '$a1', '$oa2', '$ob2', '$oc2', '$a2', ".
             "'$oa3', '$ob3', '$oc3', '$a3', '$date', 0, 0, 0)";

    $result = mysqli_query($dbc, $query) or die('Error querying database : 1');
    $last_id = mysqli_insert_id($dbc);

    $query1 = "UPDATE instructors SET test_date = '$date', test_key = '$last_id' WHERE id = '$id'";
    $result1 = mysqli_query($dbc, $query1) or die('Error querying database : 2');

    $query3 = "SELECT * FROM dates WHERE c_date = '$date'";
    $result3 = mysqli_query($dbc, $query3) or die('Error querying database : 3');
    $row = mysqli_fetch_row($result3);

    if(!$row) {
    	$query4 = "INSERT INTO dates(c_date) VALUES('$date')";
    	$result4 = mysqli_query($dbc, $query4) or die('Error querying database : 4');
    	$last_date_id = mysqli_insert_id($dbc);

    	$last_date = 'exam_'.$last_date_id;

    	$query5 = "ALTER TABLE students ADD $last_date INT";
    	$result5 = mysqli_query($dbc, $query5) or die('Error querying database : 5');
    }

    mysqli_close($dbc);

    header('Location: instr.php')
?>
