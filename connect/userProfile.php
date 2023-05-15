<?php
require 'connect.php';

$username = $con->escape_string($_SESSION['username']);

$var = 1;
while($var < 7 ){
        $result = $con->query("SELECT time_taken FROM user_scores WHERE username='$username' AND level_number='$var' ORDER BY time_taken ASC LIMIT 1;");
        $highscore = $result->fetch_assoc()  ;
        $hs = $highscore!=null ? ($highscore['time_taken'] /1000).' sec': 'n/a';
        echo '<tr>
                <td>'.$var.'</td>
                <td>
                   '.$hs.'
                </td>
              </tr>';
	$var++;
}


?>