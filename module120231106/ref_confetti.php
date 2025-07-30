<?php include 'includes/session_popup.php'; ?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .confetti {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1000;
        }

        .confetti-piece {
            position: absolute;
            width: 10px;
            height: 30px;
            background: #ffd300;
            top: 0;
            opacity: 0;
        }

        .confetti-piece:nth-child(1) {
            left: 3%;
            -webkit-transform: rotate(-40deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 182ms;
            -webkit-animation-duration: 1116ms;
        }

        .confetti-piece:nth-child(2) {
            left: 6%;
            -webkit-transform: rotate(4deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 161ms;
            -webkit-animation-duration: 1076ms;
        }

        .confetti-piece:nth-child(3) {
            left: 9%;
            -webkit-transform: rotate(-51deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 481ms;
            -webkit-animation-duration: 1103ms;
        }

        .confetti-piece:nth-child(4) {
            left: 12%;
            -webkit-transform: rotate(61deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 334ms;
            -webkit-animation-duration: 708ms;
        }

        .confetti-piece:nth-child(5) {
            left: 15%;
            -webkit-transform: rotate(-52deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 302ms;
            -webkit-animation-duration: 776ms;
        }

        .confetti-piece:nth-child(6) {
            left: 18%;
            -webkit-transform: rotate(38deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 180ms;
            -webkit-animation-duration: 1168ms;
        }

        .confetti-piece:nth-child(7) {
            left: 21%;
            -webkit-transform: rotate(11deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 395ms;
            -webkit-animation-duration: 1200ms;
        }

        .confetti-piece:nth-child(8) {
            left: 24%;
            -webkit-transform: rotate(49deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 14ms;
            -webkit-animation-duration: 887ms;
        }

        .confetti-piece:nth-child(9) {
            left: 27%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 149ms;
            -webkit-animation-duration: 805ms;
        }

        .confetti-piece:nth-child(10) {
            left: 30%;
            -webkit-transform: rotate(10deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 351ms;
            -webkit-animation-duration: 1059ms;
        }

        .confetti-piece:nth-child(11) {
            left: 33%;
            -webkit-transform: rotate(4deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 307ms;
            -webkit-animation-duration: 1132ms;
        }

        .confetti-piece:nth-child(12) {
            left: 36%;
            -webkit-transform: rotate(42deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 464ms;
            -webkit-animation-duration: 776ms;
        }

        .confetti-piece:nth-child(13) {
            left: 39%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(14) {
            left: 42%;
            -webkit-transform: rotate(-40deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 182ms;
            -webkit-animation-duration: 1116ms;
        }

        .confetti-piece:nth-child(15) {
            left: 45%;
            -webkit-transform: rotate(4deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 161ms;
            -webkit-animation-duration: 1076ms;
        }

        .confetti-piece:nth-child(16) {
            left: 48%;
            -webkit-transform: rotate(-51deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 481ms;
            -webkit-animation-duration: 1103ms;
        }

        .confetti-piece:nth-child(17) {
            left: 41%;
            -webkit-transform: rotate(61deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 334ms;
            -webkit-animation-duration: 708ms;
        }

        .confetti-piece:nth-child(18) {
            left: 44%;
            -webkit-transform: rotate(-52deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 302ms;
            -webkit-animation-duration: 776ms;
        }

        .confetti-piece:nth-child(19) {
            left: 47%;
            -webkit-transform: rotate(38deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 180ms;
            -webkit-animation-duration: 1168ms;
        }

        .confetti-piece:nth-child(20) {
            left: 50%;
            -webkit-transform: rotate(11deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 395ms;
            -webkit-animation-duration: 1200ms;
        }

        .confetti-piece:nth-child(21) {
            left: 53%;
            -webkit-transform: rotate(49deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 14ms;
            -webkit-animation-duration: 887ms;
        }

        .confetti-piece:nth-child(22) {
            left: 56%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 149ms;
            -webkit-animation-duration: 805ms;
        }

        .confetti-piece:nth-child(23) {
            left: 59%;
            -webkit-transform: rotate(10deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 351ms;
            -webkit-animation-duration: 1059ms;
        }

        .confetti-piece:nth-child(24) {
            left: 62%;
            -webkit-transform: rotate(4deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 307ms;
            -webkit-animation-duration: 1132ms;
        }

        .confetti-piece:nth-child(25) {
            left: 65%;
            -webkit-transform: rotate(42deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 464ms;
            -webkit-animation-duration: 776ms;
        }

        .confetti-piece:nth-child(26) {
            left: 68%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(27) {
            left: 71%;
            -webkit-transform: rotate(10deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 351ms;
            -webkit-animation-duration: 1059ms;
        }

        .confetti-piece:nth-child(28) {
            left: 74%;
            -webkit-transform: rotate(4deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 307ms;
            -webkit-animation-duration: 1132ms;
        }

        .confetti-piece:nth-child(29) {
            left: 77%;
            -webkit-transform: rotate(42deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 464ms;
            -webkit-animation-duration: 776ms;
        }

        .confetti-piece:nth-child(30) {
            left: 80%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(31) {
            left: 83%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(32) {
            left: 86%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(33) {
            left: 89%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(34) {
            left: 92%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(35) {
            left: 95%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(36) {
            left: 98%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(37) {
            left: 100%;
            -webkit-transform: rotate(-72deg);
            -webkit-animation: makeItRain 1000ms infinite ease-out;
            -webkit-animation-delay: 429ms;
            -webkit-animation-duration: 818ms;
        }

        .confetti-piece:nth-child(odd) {
            background: #7431e8;
        }

        .confetti-piece:nth-child(even) {
            z-index: 1;
        }

        .confetti-piece:nth-child(4n) {
            width: 5px;
            height: 12px;
            -webkit-animation-duration: 2000ms;
        }

        .confetti-piece:nth-child(3n) {
            width: 3px;
            height: 10px;
            -webkit-animation-duration: 2500ms;
            -webkit-animation-delay: 1000ms;
        }

        .confetti-piece:nth-child(4n-7) {
            background: red;
        }

        @-webkit-keyframes makeItRain {
            from {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            to {
                -webkit-transform: translateY(350px);
            }
        }

        h1 {
            font-size: 60px;
            color: #ffff;
        }

        body {
            background-color: #323092;
            /*#323092*/
            overflow: hidden;
            /* Hide scrollbars */
        }
    </style>
</head>
<div><br>
    <img id="myImg" src="../images/logo2.png" width="150px" height="150px" align="left" alt="Goh Logo">
    <img id="myImg" src="../images/logo4.png" width="200px" height="70px" align="right" alt="Goh Logo">
    <section class="content"><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="confetti">
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
            <div class="confetti-piece"></div>
        </div>
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
        ?>

    </section>
</div>