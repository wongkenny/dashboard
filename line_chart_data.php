<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("trip planner", $con);

$sth = mysql_query("SELECT count(registration_id) as user FROM registration group by month order by registered_date");
$rows = array();
$rows['name'] = 'User';
while($r = mysql_fetch_array($sth)) {
    $rows['data'][] = $r['user'];
}

$sth = mysql_query("SELECT count(reservation_id) as booked FROM reservation group by month order by registration_date");
$rows1 = array();
$rows1['name'] = 'Reservations';
while($rr = mysql_fetch_assoc($sth)) {
    $rows1['data'][] = $rr['booked'];
}

$result = array();
array_push($result,$rows);
array_push($result,$rows1);


print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>
