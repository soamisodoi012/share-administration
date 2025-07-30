<?php include 'includes/session_popup.php'; ?>
<?php
$sql = "SELECT * FROM att_shareholder";
$query = $conn->query($sql);
echo "<h3>" . $query->num_rows . "</h3>";
?>
<p><b>Total No. Shareholders</b></p>