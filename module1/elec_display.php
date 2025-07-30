<?php include 'includes/session_popup.php'; ?>
<?php include '../admin/includes/header.php'; ?>
<div>
  <section class="content">
    <div class="row" align="center">
      <h2 class="text-center"><b>የምርጫ ውጤት - በሁሉም ባለአክስዮኖች የተመረጡ</b></h2>
      <div class="">
        <div class="">
          <div class="inner" id="auto_refresh_res">
            <table id="tableID1" class="table table-bordered table-striped">
              <thead>
                <th style="font-size: 20px;"><b>S.No</b></th>
                <th style="font-size: 20px;"><b>ID</b></th>
                <th style="font-size: 20px;"><b>ስም</b></th>
                <th style="font-size: 20px;"><b>Vote</b></th>
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
          </div>
        </div>
      </div>
      <br>

      <div class="">
        <h2 class="text-center"><b>የምርጫ ውጤት - ተፅዕኖ ፈጣሪ ባልሆኑ ባለአክስዮኖች የተመረጡ</b></h2>
        <div class="">
          <div class="inner" id="auto_refresh_res1">
            <table id="tableID2" class="table table-bordered table-striped">
              <thead>
                <th style="font-size: 20px;" align="center"><b>S.No</b></th>
                <th style="font-size: 20px;"><b>ID</b></th>
                <th style="font-size: 20px;"><b>ስም</b></th>
                <th style="font-size: 20px;"><b>Vote</b></th>
              </thead>
              <tbody>
                <?php

                $sql = "SELECT res.candidate_id as id, sh.name_e as name_e, sh.name_a as name_a, res.candidate_id as candidate_id, SUM(res.v_value) as v_value
                                FROM shareholder as sh 
                                INNER JOIN elc_result as res ON sh.id=res.candidate_id
                                WHERE sh.id != '99999999'
								AND res.status = 'INF'
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
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </section>
</div>

<?php include 'includes/base_footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
<script>
  ////////////////// vote results ord ///////////////////
  $(document).ready(function() {
    setInterval(function() {
      $.ajax({
        url: 'auto_refresh_res.php', // URL of the server-side script
        success: function(data) {
          $('#auto_refresh_res').html(data); // Update the auto_refresh of the DIV element
        }
      });
    }, 5000); // Refresh the auto_refresh every 5 seconds
  });
  ////////////////// vote results inf ///////////////////
  $(document).ready(function() {
    setInterval(function() {
      $.ajax({
        url: 'auto_refresh_res1.php', // URL of the server-side script
        success: function(data) {
          $('#auto_refresh_res1').html(data); // Update the auto_refresh of the DIV element
        }
      });
    }, 5000); // Refresh the auto_refresh every 5 seconds
  });

  //////////////show least voted share holders in red yellow text all shareholders /////////////////
  var table1 = document.getElementById("tableID1");
  var table1Rows = table1.getElementsByTagName("tr");

  for (var i=7 ; i < table1Rows.length; i++){
    if(i >= 6 && i <= 8){
      table1Rows[i].style.color = "blue";
    }else{
      table1Rows[i].style.color = "red";
    }
  }

  //////////////show least voted share holders in red yellow text all shareholders /////////////////
  var table1 = document.getElementById("tableID2");
  var table1Rows = table1.getElementsByTagName("tr");

  for (var i=4 ; i < table1Rows.length; i++){
    if(i >= 4 && i <= 5){
      table1Rows[i].style.color = "blue";
    }else{
      table1Rows[i].style.color = "red";
    }
  }
</script>
<script type="text/javascript">
  function newPopup(url) {
    popupWindow = window.open(
      url, 'popUpWindow', 'height=500,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
  }
</script>