<?php include 'includes/session_popup.php'; ?>
<?php
$sql = "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share 
    FROM shareholder as sh INNER JOIN att_shareholder as att ON att.id=sh.id";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$vall = $row['subscribed_share'];
$val = number_format($vall / 1000);
if ($val != NULL) {
  echo "<h3>" . $val . "</h3>";
} else {
  echo "<h3>0</h3>";
}

?>
<p><b>Total subscribed Share in Number</b></p>