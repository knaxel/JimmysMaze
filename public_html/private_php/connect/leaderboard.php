<?php
require 'connect.php';
if (!isset($_POST["level_selector"])) {
    $post_level = 1;
} else {
    $post_level = $con->escape_string($_POST["level_selector"]);
}
$result = $con->query("SELECT username,time_taken FROM user_scores WHERE level_number = '$post_level' ORDER BY time_taken ASC LIMIT 5");

//$_SESSION["selected_level"] = $post_level;

echo '<thead>
    <tr>
    <th colspan="3">
    Level #'.$post_level.'
        </th>
        </tr>
        <tr>
        <th>Rank</th>
        <th>User</th>
        <th>Time taken to complete</th>
        </tr>
        </thead><tbody>';

$var = 1;
while($highscore = $result->fetch_assoc()){
    echo '<tr>';
	//$_SESSION["bestplayer".$var] = $highscore["username"];
	//$_SESSION["time".$var] = $highscore["time_taken"];
        echo '<td>'.$var.'</td>';
        echo '<td>'.$highscore["username"].' </td>';
        echo '<td>'.$highscore["time_taken"].' </td>';
    
    echo '</tr>';
	$var += 1;
}
echo '</tbody>';

?>