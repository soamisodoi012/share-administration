<?php include 'includes/session_popup.php'; ?>
<table id="tableID1" class="table table-bordered table-striped">
    <thead>
        <th class="text-center" style="font-size: 20px;"><b>ተራ ቁጥር</b></th>
        <th style="font-size: 20px;"><b>መለያ ቁጥር</b></th>
        <th style="font-size: 20px;"><b>ስም</b></th>
        <th style="font-size: 20px;"><b>የድምጽ ቆጠራ ውጤት</b></th>
    </thead>
    <tbody>
        <?php

        $sql = "SELECT res.candidate_id as id, sh.name_e as name_e, sh.name_a as name_a, res.candidate_id as candidate_id, SUM(res.v_value) as v_value
                                FROM shareholder as sh 
                                INNER JOIN elc_result as res ON sh.id=res.candidate_id
                                WHERE sh.id != '99999999'
								AND res.status = 'ORD'
                                GROUP BY res.candidate_id
                                ORDER BY v_value DESC";

        $result = $conn->query($sql);

        $seq_no = 0;

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $seq_no++;
                echo '<tr>';
                echo '<td style="font-family:courier; font-size:20px;" align="center">';
                echo '<label>' . $seq_no . '</label>';
                echo '</td>';
                echo '<td style="font-family:courier; font-size:20px;">';
                echo '<label>' . $row['id'] . '</label>';
                echo '</td>';
                echo '<td style="font-family:courier; font-size:25px;">';
                echo '<label>' . $row['name_a'] . '</label>';
                echo '</td>';
                echo '<td style="font-family:courier; font-size:30px;">';
                echo '<label>' . number_format($row['v_value']) . '</label>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo 'No records found.';
        }
        //$conn->close();
        ?>
    </tbody>
</table>
<script>
    //////////////show least voted share holders in red yellow text all shareholders /////////////////
    var table1 = document.getElementById("tableID1");
    var table1Rows = table1.getElementsByTagName("tr");

    for (var i = 7; i < table1Rows.length; i++) {
        if (i >= 6 && i <= 8) {
            table1Rows[i].style.color = "blue";
        } else {
            table1Rows[i].style.color = "red";
        }
    }
</script>