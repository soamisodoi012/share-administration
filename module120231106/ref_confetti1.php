<?php include 'includes/session_popup.php'; ?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        h1 {
            font-size: 60px;
            color: #ffff;
        }

        body {
            background-color: #323092;
        }
    </style>
</head>
<div><br>
    <img id="myImg" src="../images/logo2.png" width="150px" height="150px" align="left" alt="Goh Logo">
    <img id="myImg" src="../images/logo4.png" width="200px" height="70px" align="right" alt="Goh Logo">
    <section class="content"><br><br><br><br><br><br><br><br><br><br><br><br>
        <h1 align="center">Attended Percentage %</h1>
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
            echo "<h3 align='center'>" . $perc . " %</h3>";
        } else {
            echo "<h3 align='center'>0 %</h3>";
        }
        $sql_para = "SELECT value FROM parameter WHERE shortname='CV'";
        $query_para = $conn->query($sql_para);
        $row_para = $query_para->fetch_assoc();
        $min_cor = $row_para['value'];
        ?>
    </section>
</div>