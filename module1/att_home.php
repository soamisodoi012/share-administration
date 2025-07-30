<?php include 'includes/session_popup.php'; ?>
<?php include '../admin/includes/header.php'; ?>
<div>
  <section class="content">
    <?php
    if (isset($_SESSION['error'])) {
      echo "
                <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Error!</h4>
                " . $_SESSION['error'] . "
                </div>
            ";
      unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
      echo "
                <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Success!</h4>
                " . $_SESSION['success'] . "
                </div>
            ";
      unset($_SESSION['success']);
    }
    ?><br>
    <h2 align='center'><b>Attendance</b></h2><br>
    <div class="row" align="center">
      <div class="col-lg-4 col-xs-4">
        <div class="small-box bg-purple">
          <div class="inner" id="auto_refresh">
            <?php
            $sql = "SELECT * FROM att_shareholder";
            $query = $conn->query($sql);
            echo "<h3>" . $query->num_rows . "</h3>";
            ?>
            <p><b>Total No. Shareholders</b></p>
          </div>
          <!--a href="#" class="small-box-footer">---- <i class="fa fa-arrow-circle-right"></i></a-->
        </div>
      </div>
      <div class="col-lg-4 col-xs-4">
        <div class="small-box bg-orange">
          <div class="inner" id="auto_refresh1">
            <?php
            $sql = "SELECT round((sum(sh.subscribed_share)),2) as subscribed_share 
                    FROM shareholder as sh INNER JOIN att_shareholder as att ON att.id=sh.id";
            $query = $conn->query($sql);
            $row = $query->fetch_assoc();
            $vall = $row['subscribed_share'];
            $val = number_format($vall / 1000);
            if ($val != NULL) {
              echo "<h3>" . $val . " </h3>";
            } else {
              echo "<h3>0</h3>";
            }
            ?>
            <p><b>Total subscribed Share in Number</b></p>
          </div>
          <!--a href="#" class="small-box-footer">---- <i class="fa fa-arrow-circle-right"></i></a-->
        </div>
      </div>
      <div class="col-lg-4 col-xs-4">
        <div class="small-box bg-purple">
          <div class="inner" id="auto_refresh2">
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
          </div>
          <!--a href="#" class="small-box-footer">---- <i class="fa fa-arrow-circle-right"></i></a-->
        </div>
      </div><br>
      <h3 class="text-center"><b>የምርጫ ውጤት - በሁሉም ባለአክስዮኖች የተመረጡ</b></h3>
      <div class="">
        <div class="">
          <div class="inner" id="auto_refresh_res">
            <table id="tableID1" class="table table-bordered table-striped">
              <thead>
                <th style="font-size: 20px;" class="text-center"><b>ተራ ቁጥር</b></th>
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
          </div>
        </div>
      </div>
      <br>

      <div class="">
        <h3 align='center'><b>የምርጫ ውጤት - ተፅዕኖ ፈጣሪ ባልሆኑ ባለአክስዮኖች የተመረጡ</b></h3>
        <div class="">
          <div class="inner" id="auto_refresh_res1">
            <table id="tableID2" class="table table-bordered table-striped">
              <thead>
                <th style="font-size: 20px;" class="text-center"><b>ተራ ቁጥር</b></th>
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
  $(document).ready(function() {

    setInterval(function() {

      $.ajax({
        url: 'auto_ref.php', // URL of the server-side script
        success: function(data) {
          $('#auto_refresh').html(data); // Update the auto_refresh of the DIV element
        }
      });
    }, 5000); // Refresh the auto_refresh every 5 seconds
  });
  ////////////////// Total share Holders ///////////////////
  $(document).ready(function() {

    setInterval(function() {

      $.ajax({
        url: 'auto_ref1.php', // URL of the server-side script
        success: function(data) {
          $('#auto_refresh1').html(data); // Update the auto_refresh of the DIV element
        }
      });
    }, 5000); // Refresh the auto_refresh every 5 seconds
  });
  ////////////////// Total Subscribed Share ///////////////////
  $(document).ready(function() {
    setInterval(function() {
      $.ajax({
        url: 'auto_ref2.php', // URL of the server-side script
        success: function(data) {
          $('#auto_refresh2').html(data); // Update the auto_refresh of the DIV element
        }
      });
    }, 5000); // Refresh the auto_refresh every 5 seconds
  });

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