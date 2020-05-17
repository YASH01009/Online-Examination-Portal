<?php
    session_start();
    if($_SESSION['category'] == 'Student') {
    	$mail = $_SESSION['email'];
    	$date = $_POST['e_date'];
    }
    else {
        $mail = $_POST['email'];
        $date = $_POST['e_date'];
    }
    $class = $_SESSION['class'];

    $username = '';
    $dbpassword = '';
    $dbname = '';

    $dbc = mysqli_connect('localhost',$username,$dbpassword,$dbname) or die('Error connecting to MySql Server');

    $query = "SELECT id FROM dates WHERE c_date = '$date'";
    $result = mysqli_query($dbc, $query);

    $row = mysqli_fetch_array($result);
    $test_name = 'exam_'.$row['id'];

    $query1 = "SELECT $test_name FROM students where email = '$mail'";
    $result1 = mysqli_query($dbc, $query1);

    $row1 = mysqli_fetch_array($result1);
    $response = $row1[$test_name];

    $query2 = "SELECT * FROM responses WHERE id = '$response'";
    $result2 = mysqli_query($dbc, $query2);

    $row2 = mysqli_fetch_array($result2);

    $query3 = "SELECT * FROM tests WHERE class = '$class' AND test_date = '$date'";
    $result3 = mysqli_query($dbc, $query3);

    $row3 = mysqli_fetch_array($result3);
    $test_key = $row3['id'];

    $query4 = "SELECT * FROM responses WHERE test_key = '$test_key' ORDER BY score DESC";
    $result4 = mysqli_query($dbc, $query4);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Test Result</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>

<body>
	<div class="w3-card w3-margin w3-padding">
		<h2>Result</h2>
	</div>

	<div class="w3-card w3-margin w3-padding">
		<h3>Student score</h3>
		<ul>
        	<li> Score : <?php echo $row2['score']; ?> </li>
        	<li> Answer 1 : <?php echo $row2['a1']; ?> </li>
        	<li> Answer 2 : <?php echo $row2['a2']; ?> </li>
        	<li> Answer 3 : <?php echo $row2['a3']; ?> </li>
        </ul>
	</div>

	<div class="w3-card w3-margin w3-padding">
		<h3>Test Paper</h3>
		<h4><?php echo $row3['q1']; ?></h4>
		<ul>
        	<li> Option 1 : <?php echo $row3['oa1']; ?> </li>
        	<li> Option 2 : <?php echo $row3['ob1']; ?> </li>
        	<li> Option 3 : <?php echo $row3['oc1']; ?> </li>
        </ul>
        <h4>Answer : <?php echo $row3['a1']; ?></h4>
        <br>
		<h4><?php echo $row3['q2']; ?></h4>
		<ul>
        	<li> Option 1 : <?php echo $row3['oa2']; ?> </li>
        	<li> Option 2 : <?php echo $row3['ob2']; ?> </li>
        	<li> Option 3 : <?php echo $row3['oc2']; ?> </li>
        </ul>
        <h4>Answer : <?php echo $row3['a2']; ?></h4>
        <br>
		<h4><?php echo $row3['q3']; ?></h4>
		<ul>
        	<li> Option 1 : <?php echo $row3['oa3']; ?> </li>
        	<li> Option 2 : <?php echo $row3['ob3']; ?> </li>
        	<li> Option 3 : <?php echo $row3['oc3']; ?> </li>
        </ul>
        <h4>Answer : <?php echo $row3['a3']; ?></h4>
	</div>

	<div class="w3-card w3-margin w3-padding">
		<h3>Other Statistics</h3>
		<ul>
        	<li> Answer 1 : <?php echo $row3['c1']; ?> answered correctly </li>
        	<li> Answer 2 : <?php echo $row3['c2']; ?> answered correctly </li>
        	<li> Answer 3 : <?php echo $row3['c3']; ?> answered correctly </li>
        </ul>
	</div>

    <div class="w3-card w3-margin w3-padding">
    <?php echo '
        <table class="w3-table-all">
        <thead>
            <tr class="w3-red">
                <th>Answer 1</th>
                <th>Answer 2</th>
                <th>Answer 3</th>
                <th>Score</th>
            </tr>
        </thead>';

        while($row4 = mysqli_fetch_array($result4)) {
            echo 
            '<tr>
                <td>'. $row4['a1'] .'</td>
                <td>'. $row4['a2'] .'</td>
                <td>'. $row4['a3'] .'</td>
                <td>'. $row4['score'] .'</td>
            </tr>';
        }
        echo '</table>';
    ?>
    </div>
</body>
</html>
