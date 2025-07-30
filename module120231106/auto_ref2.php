<?php include 'includes/session_popup.php'; ?>
<?php
$sql = "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share 
    FROM shareholder as sh INNER JOIN att_shareholder as att ON att.id=sh.id";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$val = $row['subscribed_share'];

$sql1 = "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share 
    FROM shareholder as sh 
    WHERE sh.id != '99999999'";
$query1 = $conn->query($sql1);
$row1 = $query1->fetch_assoc();
$val1 = $row1['subscribed_share'];

$perc = round((($val / $val1) * 100), 2);
if ($val != NULL) {
  echo "<h3>" . $perc . " %</h3>";
} else {
  echo "<h3>0 %</h3>";
}

?>
<p><b>Attended %</b></p>