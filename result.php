<?php

    $username = 'id13737626_mydb';
    $dbpassword = 'g<W>rc&D=tH9zbNR';
    $dbname = 'id13737626_studentdb';
    
    $dbc = mysqli_connect('localhost',$username,$dbpassword,$dbname) or die('Error connecting to MySql Server');

    $query = "SELECT * FROM students ORDER BY c_score";
    $result = mysqli_query($dbc, $query);

    mysqli_close($dbc);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Test Result</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
</head>

<body>
    <div class="w3-card w3-margin w3-padding">
    <h2>Students by cumulative score</h2>
    <?php echo '
        <table class="w3-table-all">
        <thead>
            <tr class="w3-red">
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Cumulative Score</th>
                <th>Class</th>
            </tr>
        </thead>';

        while($row = mysqli_fetch_array($result)) {
            echo 
            '<tr>
                <td>'. $row['first_name'] .'</td>
                <td>'. $row['last_name'] .'</td>
                <td>'. $row['email'] .'</td>
                <td>'. $row['c_score'] .'</td>
                <td>'. $row['class'] .'</td>
            </tr>';
        }
        echo '</table>';
    ?>
    </div>
</body>
</html>