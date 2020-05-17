<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['category'] == 'Instructor') {
        header('Location: logout.php');
        die();
    }

    $class = $_SESSION['class'];

    $username = 'id13737626_mydb';
    $dbpassword = 'g<W>rc&D=tH9zbNR';
    $dbname = 'id13737626_studentdb';

    $dbc = mysqli_connect('localhost',$username,$dbpassword,$dbname) or die('Error connecting to MySql Server');

    $query = "SELECT test_key FROM instructors WHERE class = '$class' AND test_date = CURDATE() ";
    $result = mysqli_query($dbc, $query);

    $row = mysqli_fetch_array($result);

    if(!$row) {
        mysqli_close($dbc);
        header('Location: no_test.php');
    }
    else {
        $query2 = "SELECT * FROM dates WHERE c_date = CURDATE()";
        $result2 = mysqli_query($dbc, $query2);
        $row2 = mysqli_fetch_array($result2);

        $student_id = $_SESSION['id'];
        $test_id = $row2['id'];
        $test_name = 'exam_'. $test_id;

        $query1 = "SELECT $test_name FROM students WHERE id = '$student_id'";
        $result1 = mysqli_query($dbc, $query1);
        $row1 = mysqli_fetch_array($result1);

        mysqli_close($dbc);

        if($row1[$test_name]) {
            header('Location: no_test.php');
            die();
        }

        $_SESSION['test_key'] = $row['test_key'];
        $_SESSION['test_name'] = $test_name;
        header('Location: start_test.php');
    }
?>