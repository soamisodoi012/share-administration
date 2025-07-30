<?php
include "conn1.php";

// Get corresponding  name 
$query = mysqli_query($con, "SELECT value as min_cor FROM parameter WHERE shortname='CV'");
$row = mysqli_fetch_array($query);

$min_cor = $row['min_cor'];

$query2 = mysqli_query($con, "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share FROM shareholder as sh INNER JOIN att_shareholder as att ON att.id=sh.id");
$row2 = mysqli_fetch_array($query2);

$val = $row2['subscribed_share'];

$query3 = mysqli_query($con, "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share FROM shareholder as sh WHERE sh.id != '99999999'");
$row3 = mysqli_fetch_array($query3);

$val1 = $row3['subscribed_share'];
$perc = round((($val / $val1) * 100), 2);

// Store it in a array
$result = array("$perc", "$min_cor");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
