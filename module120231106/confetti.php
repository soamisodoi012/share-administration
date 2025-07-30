<?php include 'includes/session_popup.php'; ?>
<?php include '../admin/includes/header.php'; ?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        h1 {
            font-size: 60px;
            color: #ffff;
        }

        h3 {
            font-size: 40px;
            color: #ffff;
        }

        body {
            background-color: #323092;
        }
    </style>
</head>

<body class="body" id="ref_confetti">
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
            ?>
        </section>
    </div>
</body>
<?php include 'includes/base_footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
<script>
    // Function to fetch $myJSON values from the server

    function fetchMinCor() {
        // Make an AJAX request to the server
        var xsh = new XMLHttpRequest();
        xsh.open('GET', 'fetch_min_cor.php', true); // Replace 'fetch_min_cor.php' with the appropriate server-side script URL
        xsh.onreadystatechange = function() {
            if (xsh.readyState === XMLHttpRequest.DONE) {
                if (xsh.status === 200) {
                    // Request successful, update the value
                    var myJSON = JSON.parse(xsh.responseText);

                    // Process the fetched value as desired here
                    var att_perc = myJSON[0];
                    var minCor = myJSON[1];

                    excuteComparsion(att_perc, minCor);

                } else {
                    // Request failed, handle the error
                    console.error('Failed to fetch $myJSON:', xsh.status);
                }

            }
        };
        xsh.send();
    }



    function excuteComparsion(att_perc, minCor) {

        if (Number(att_perc) >= Number(minCor)) {
            $(document).ready(function() {

                setInterval(function() {

                    $.ajax({
                        url: 'ref_confetti.php', // URL of the server-side script
                        success: function(data) {
                            $('#ref_confetti').html(data); // Update the ref_confetti of the DIV element
                        }
                    });
                }, 10000); // Refresh the ref_confetti every 10 seconds
            });
        } else {
            $(document).ready(function() {

                setInterval(function() {

                    $.ajax({
                        url: 'ref_confetti1.php', // URL of the server-side script
                        success: function(data) {
                            $('#ref_confetti').html(data); // Update the ref_confetti of the DIV element
                        }
                    });
                }, 10000); // Refresh the ref_confetti every 10 seconds
            });
        }
    }

    // Fetch $myJSON initially
    fetchMinCor();


    // Fetch $myJSON every 10 seconds
    setInterval(fetchMinCor, 9999);
</script>