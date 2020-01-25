<?php
include_once('connection.php');
// update_my_direct_team_count('NKB959151');
// echo get_total_direct_count('NKB808298');die;

echo "<br>----------- Check for fund ------------ <br>";
check_for_fund('NKB140282');die;

echo "<br>-------------------------<br>";
echo "User Rank (NKB808298): ".get_current_rank('NKB808298');
echo "<br>-------------------------<br>";
// echo "User Rank (NKB514656): ".get_current_rank('NKB514656');
echo "<br>-------------------------<br>";
die;
check_for_rank('NKB514656');

?>