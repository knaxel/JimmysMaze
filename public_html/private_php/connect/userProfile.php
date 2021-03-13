<?php
require 'connect.php';

$username = $con->escape_string($_SESSION['username']);

$var = 1;
while($var < 7){
        $result = $con->query("SELECT time_taken FROM user_scores WHERE username='$username' AND level_number='$var' ORDER BY time_taken ASC LIMIT 1;");
        $highscore = $result->fetch_assoc();
	$level_number = $con->escape_string($var);
        echo '<tr>
                <td>'.$var.'</td>
                <td>
                   '.$highscore['time_taken'].'
                </td>
              </tr>';
	$var++;
}


?>