<?php
if (isset($_GET['action'])  == "Shareholderatt")
  showShareholders_att();

if (isset($_GET['actionab'])  == "Shareholderabb")
  showShareholders_abb();

if (isset($_GET['actionrep'])  == "AttendanceReport")
  showAttendance_report();

if (isset($_GET['actionelc'])  == "ElectionResult")
  showElection_result();

if (isset($_GET['actionelcd'])  == "ElectionResult")
  showElectionDetail_result();

if (isset($_GET['actionelcd2'])  == "ElectionResult")
  showElectionDetail_result2();

if (isset($_GET['actionelc2'])  == "ElectionResult")
  showElection_result2();

if (isset($_GET['actionres'])  == "ElectionResult")
  showElection_result_all();

if (isset($_GET['actionres1'])  == "ElectionResult")
  showElection_result_all1();

function showShareholders_att()
{

?>

  <div class="box-body">
    <thead>

      <tr>
        <th>S.No</th>
        <th>ID</th>
        <th>Share Holder Name</th>
        <th>Subscribed Share</th>
        <!--th>Paid</th>
          <th>Subscribed %</th-->
      </tr>
    </thead>


    <tbody>
      <?php
      require "conn1.php";
      if ($con) {
        $seq_no = 0;
        $total = 0;
        $totalp = 0;

        $query = "SELECT sh.id as id, sh.name_e as name_e, sh.subscribed_share as subscribed_share, sh.paid_share as paid_share
                      FROM shareholder as sh 
                      INNER JOIN att_shareholder as att ON sh.id=att.id
                      WHERE sh.id != '99999999'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $seq_no++;
          showShareholdersRow_att($row, $seq_no); //$seq_no, 
          $total = $total + $row['subscribed_share'];
          $totalp = $totalp + $row['paid_share'];
          $per = '%';
        }
      ?>
    </tbody>
  </div>
  <tr style="text-align: right; font-size: 18px;">
    <td colspan="3" style="color: green;">&nbsp;Total Subscibed Share</td>
    <td style="color: red;font-family:courier:bold;"><?php echo number_format($total / 1000); ?></td>
    <td colspan="6"></td>
  </tr>
  <!--tr style="text-align: right; font-size: 18px;">
            <td colspan="4" style="color: green;">&nbsp;Total Paid Share</td>
            <td style="color: red;font-family:courier:bold;"><!?php echo number_format($totalp); ?></td>
            <td colspan="6"></td><!--td></td><td></td><td></td><td></td><td></td-->
  </tr-->
<?php //colspan="5" style="color: green;"

      }
    }

    function showShareholdersRow_att($row, $seq_no)
    {
?>
<tr>
  <td style='font-family:courier'><b><?php echo $seq_no; ?></b></td>
  <td style='font-family:courier'><?php echo $row['id']; ?></td>
  <td style='font-family:courier'><?php echo $row['name_e']; ?></td>
  <td style='font-family:courier' class="text-right"><?php echo number_format($row['subscribed_share'] / 1000); ?></td>
  <!--td style='font-family:courier' class="text-right"><!?php echo number_format($row['paid_share']); ?></td>
  <td style='font-family:courier' class="text-right"><!?php echo '%'; ?></td-->
</tr>


<?php
    }

    /////////////////////////////////////////////////////// absent shareholders report /////////////////////////////
    function showShareholders_abb()
    {

?>

  <div class="box-body">
    <thead>

      <tr>
        <th>S.No</th>
        <th>ID</th>
        <th>Share Holder Name</th>
        <th>Subscribed Share</th>
        <!--th>Paid</th>
          <th>Subscribed %</th-->
      </tr>
    </thead>


    <tbody>
      <?php
      require "conn1.php";
      if ($con) {
        $seq_no = 0;
        $total = 0;
        $totalp = 0;

        $query = "SELECT sh.id as id, sh.name_e as name_e, sh.subscribed_share as subscribed_share, sh.paid_share as paid_share
                      FROM shareholder as sh 
                      LEFT JOIN att_shareholder as att ON sh.id=att.id
                      WHERE att.id IS NULL
                      AND sh.id != '99999999'";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $seq_no++;
          showShareholdersRow_att($row, $seq_no); //$seq_no, 
          $total = $total + $row['subscribed_share'];
          $totalp = $totalp + $row['paid_share'];
          $per = '%';
        }
      ?>
    </tbody>
  </div>
  <tr style="text-align: right; font-size: 18px;">
    <td colspan="3" style="color: green;">&nbsp;Total Subscibed Share</td>
    <td style="color: red;font-family:courier:bold;"><?php echo number_format($total); ?></td>
    <td colspan="6"></td>
  </tr>
  <!--tr style="text-align: right; font-size: 18px;">
            <td colspan="4" style="color: green;">&nbsp;Total Paid Share</td>
            <td style="color: red;font-family:courier:bold;"><!?php echo number_format($totalp); ?></td>
            <td colspan="6"></td><!--td></td><td></td><td></td><td></td><td></td-->
  </tr-->
<?php //colspan="5" style="color: green;"

      }
    }

    function showShareholdersRow_abb($row, $seq_no)
    {
?>
<tr>
  <td style='font-family:courier'><b><?php echo $seq_no; ?></b></td>
  <td style='font-family:courier'><?php echo $row['id']; ?></td>
  <td style='font-family:courier'><?php echo $row['name_e']; ?></td>
  <td style='font-family:courier' class="text-right"><?php echo number_format($row['subscribed_share']); ?></td>
  <!--td style='font-family:courier' class="text-right"><!?php echo number_format($row['paid_share']); ?></td>
  <td style='font-family:courier' class="text-right"><!?php echo '%'; ?></td-->
</tr>


<?php
    }

    /////////////////////////////////////////////////////// Attendance Report /////////////////////////////
    function showAttendance_report()
    {
      require "conn1.php";
      if ($con) {
?>
  <?php
        $sql1 = "SELECT SUM(subscribed_share) as total_sub FROM shareholder WHERE id != '99999999'";
        $query1 = $con->query($sql1);
        $row1 = $query1->fetch_assoc();
        $tot_sub = $row1['total_sub'];
        $tot_sub_num = number_format($row1['total_sub'], 2);
        $tot_sub_sharee = number_format(($tot_sub / 1000), 2);

        $sql2 = "SELECT round((sum(sh.subscribed_share)),2) as subscribed_share 
        FROM shareholder as sh INNER JOIN att_shareholder as att ON att.id=sh.id";
        $query2 = $con->query($sql2);
        $row2 = $query2->fetch_assoc();
        $vall = $row2['subscribed_share'];
        $val1_num = number_format($row2['subscribed_share'], 2);
        $val_tot = number_format($vall / 1000);

        $sql5 = "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share 
         FROM shareholder as sh INNER JOIN att_shareholder as att ON att.id=sh.id";
        $query5 = $con->query($sql5);
        $row5 = $query5->fetch_assoc();
        $val = $row5['subscribed_share'];

        $sql3 = "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share 
         FROM shareholder as sh 
         WHERE sh.id != '99999999'";
        $query3 = $con->query($sql3);
        $row3 = $query3->fetch_assoc();
        $val1 = $row3['subscribed_share'];

        $sql4 = "SELECT value FROM parameter WHERE shortname = 'CV'";
        $query4 = $con->query($sql4);
        $row4 = $query4->fetch_assoc();
        $cor_val = $row4['value'];

        $perc = round((($val / $val1) * 100), 2);

        $min_att_share = ($cor_val * $val1) / 100;
        $min_att_number = number_format($min_att_share);

        $min_att = number_format(($tot_sub * $cor_val) / 100000, 2);


        $sql = "SELECT * FROM shareholder WHERE id != '99999999'";
        $query = $con->query($sql);
        //echo "<h2><b>ጠቅላላ የማኀበሩ ባለአክሲዮኖች ብዛት  : </b><u>" . $query->num_rows . "</u></h2>";
  ?>
  <?php
        echo "<h3 style='font-family:Ebrima'>ጠቅላላ የባንኩ የተፈረመ አክሲዮኖች ብዛት :&nbsp;&nbsp;&nbsp;<u>" . $tot_sub_sharee . "</u></h3>";
        echo "<h3 style='font-family:Ebrima'>ጠቅላላ የባንኩ የተፈረመ አክሲዮኖች ጠቅላላ ዋጋ :&nbsp;&nbsp;&nbsp;<u>" . number_format($val1, 2) . "</u></h3>";
        echo "<h3 style='font-family:Ebrima'>ጉባዔውን ለማካሄድ አስፈላጊ የሆኑ የአክሲዮኖች ብዛት  <u>" . $min_att . "</u>  በመቶኛ : <u>" . $cor_val . "%</u></h3>";

        //echo "<h3><b>የአክሲዮኖች ብዛት  : </b><u>" . $tot_sub_sharee . "</u></h3>";
        //echo "<h3><b>የአክሲዮኖች ጠቅላላ ዋጋ ብር  : </b><u>" . $tot_sub_num . "</u></h3>";
  ?>
  <?php
        if ($val_tot != NULL) {
          echo "<h3 style='font-family:Ebrima'>በዕለቱ በስብሰባው ላይ የተገኙ አባላት የያዙት አክሲዮኖች ብዛት : &nbsp;&nbsp;&nbsp;<u>" . $val_tot . "</u></h3>";
          echo "<h3 style='font-family:Ebrima'>በዕለቱ በስብሰባው ላይ የተገኙ አባላት የያዙት አክሲዮኖች ብዛት በመቶኛ : &nbsp;&nbsp;&nbsp;<u>" . $perc . " </u>%</h3>";
          //echo "<h3><b>የአክሲዮኖች ብዛት  : </b><u>" . $val1_num . "</u></h3>";
          //echo "<h3><b>አክሲዮኖች ብዛት በመቶኛ   : </b><u>" . $perc . "</u></h3>";
        } else {
          echo "<h3 style='font-family:Ebrima'>በዕለቱ በስብሰባው ላይ የተገኙ አባላት የያዙት አክሲዮኖች ብዛትና መቶኛ</b></h3>";
          echo "<h3 style='font-family:Ebrima'>የአክሲዮኖች ብዛት  : <u> 0 </u></h3>";
          //echo "<h3 style='font-family:Ebrima'>አክሲዮኖች ብዛት በመቶኛ   : <u> 0 % </u></h3>";
        }
  ?>
  <?php
        //if ($val != NULL) {
        // echo "<h3 style='font-family:Ebrima'>በዕለቱ በስብሰባው ላይ የተገኙ አባላት የያዙት አክሲዮኖች ብዛት በመቶኛ : &nbsp;&nbsp;&nbsp;<u>" . $min_att_number . "</u></h3>";
        //echo "<h3 style='font-family:Ebrima'>ጉባዔውን ለማካሄድ አስፈላጊ የሆኑ የአክሲዮኖች ብዛት በመቶኛ : (" . $cor_val . "%) &nbsp;&nbsp;&nbsp;<u>" . $perc . " </u>%</h3>";
        //echo "<h3><b>አክሲዮኖች ብዛት   : </b><u>" . $min_att_number . "</u></h3>";
        //echo "<h3><b>አክሲዮኖች ብዛት በመቶኛ    : </b> (" . $cor_val . "%) <u>" . $perc . "</u></h3>";
        //} else {
        //  echo "<h3 style='font-family:Ebrima'>ጉባዔውን ለማካሄድ አስፈላጊ የሆኑ አክሲዮኖች ብዛትና መቶኛ </h3>";
        //  echo "<h3 style='font-family:Ebrima'>አክሲዮኖች ብዛት   : <u> 0 </u></h3>";
        //  echo "<h3 style='font-family:Ebrima'>አክሲዮኖች ብዛት በመቶኛ    :  0 % </h3>";
        //}
        echo "<br>";
        echo "<h3 style='font-family:Ebrima'>በንግድ ሕግ አንቀጽ 398 መሠረት ከማኀበሩ ባለአክሲዮኖች ዉስጥ " . "<u>" . $val_tot . "</u> አክሲዮኖችን ወይም <u>" . $perc . "</u> % የሚወክሉ አባላት የተገኙ ስለሆነ ጉባዔውን ለማካሄድ የሚያስችል ምልዓተ ጉባኤ ተሟልቷል፡፡ </h3>";
  ?><br>

  <!--?php
        $sql = "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share 
        FROM shareholder as sh INNER JOIN att_shareholder as att ON att.id=sh.id";
        $query = $con->query($sql);
        $row = $query->fetch_assoc();
        $val = $row['subscribed_share'];

        $sql1 = "SELECT round((sum(sh.subscribed_share)),3) as subscribed_share 
        FROM shareholder as sh 
        WHERE sh.id != '99999999'";
        $query1 = $con->query($sql1);
        $row1 = $query1->fetch_assoc();
        $val1 = $row1['subscribed_share'];

        $perc = round((($val / $val1) * 100), 2);
        if ($val != NULL) {
          echo "<h1><b>Attendance Percentage : </b>" . $perc . " %</h1>";
        } else {
          echo "<h1><b>Attendance Percentage : </b> 0 %</h1>";
        }
  ?-->
<?php
      }
    }

    ////////////////////////////////////////// Election result report 1 //////////////////////////////////
    function showElection_result()
    {

?>

<div class="box-body">
  <thead>

    <tr>
      <th>Rank</th>
      <th>ID</th>
      <th>Candidate Name</th>
      <th>Vote</th>
    </tr>
  </thead>


  <tbody>
    <?php
      require "conn1.php";
      if ($con) {
        $seq_no = 0;
        $total = 0;
        $totalp = 0;

        $query = "SELECT res.candidate_id as id, sh.name_e as name_e, res.candidate_id as candidate_id, SUM(res.v_value) as v_value
                      FROM shareholder as sh 
                      INNER JOIN elc_result as res ON sh.id=res.candidate_id
                      WHERE sh.id != '99999999'
                      AND res.status = 'ORD'
                      GROUP BY res.candidate_id
                      ORDER BY v_value DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $seq_no++;
          showElection_resultRow($row, $seq_no); //$seq_no, 
          //$total = $total + $row['subscribed_share'];
          //$totalp = $totalp + $row['paid_share']; 
          //$per = '%'; 
        }
    ?>
  </tbody>
</div>
<?php //colspan="5" style="color: green;"

      }
    }

    function showElection_resultRow($row, $seq_no)
    {
?>
<tr>
  <td style='font-family:courier'><b><?php echo $seq_no; ?></b></td>
  <td style='font-family:courier'><?php echo $row['id']; ?></td>
  <td style='font-family:courier'><?php echo $row['name_e']; ?></td>
  <td style='font-family:courier' class="text-right"><?php echo number_format($row['v_value']); ?></td>
</tr>


<?php
    }

    ////////////////////////////////////////// Election result report 2 //////////////////////////////////
    function showElectionDetail_result()
    {

?>

  <div class="box-body">
    <thead>

      <tr>
        <th>S.No</th>
        <th>ID</th>
        <th>Candidate Name</th>
        <th>Vote</th>
        <th>Inputter</th>
      </tr>
    </thead>


    <tbody>
      <?php
      require "conn1.php";
      if ($con) {
        $seq_no = 0;
        $total = 0;
        $totalp = 0;

        $query = "SELECT res.candidate_id as id, sh.name_e as name_e, res.candidate_id as candidate_id, SUM(res.v_value) as v_value
                      FROM shareholder as sh 
                      INNER JOIN elc_result as res ON sh.id=res.candidate_id
                      WHERE sh.id != '99999999'
                      AND res.status = 'ORD'
                      GROUP BY res.candidate_id
                      ORDER BY v_value DESC";


        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $seq_no++;
          showElectionDetail_resultRow($row, $seq_no);

          ////////////////// detail voters list ///////////////////////
          $VoteDetailQuery = "SELECT vo.sh_id as shareholderid, sh.name_e as sh_name, vo.candidate_id as candidate, vo.v_value as sharevalue , vo.inputter as inputter
                                  FROM elc_result vo INNER JOIN shareholder sh ON vo.sh_id = sh.id
                                  WHERE vo.candidate_id ='" . $row['id'] . "'
                                  ORDER BY vo.candidate_id";
          $VoteDetailResult = mysqli_query($con, $VoteDetailQuery);

          while ($row_ad = mysqli_fetch_array($VoteDetailResult)) {


            showElectionDetail_resultRow_ad($row_ad);
          }
        }
      ?>
    </tbody>
  </div>
<?php

      }
    }

    function showElectionDetail_resultRow($row, $seq_no)
    {
?>
<tr>
  <td style='font-family:courier'><b>
      <h4><?php echo $seq_no; ?></h4>
    </b></td>
  <td style='font-family:courier'><b>
      <h4><?php echo $row['id']; ?></h4>
    </b></td>
  <td style='font-family:courier'><b>
      <h4><?php echo $row['name_e']; ?></h4>
    </b></td>
  <td style='font-family:courier' class="text-right"><b>
      <h4><?php echo number_format($row['v_value']); ?></h4>
    </b></td>
</tr>

<?php
    }
    function showElectionDetail_resultRow_ad($row_ad)
    {
?>
  <tr>
    <td></td>
    <td style="color: green;"><?php echo $row_ad['shareholderid']; ?></td>
    <td style="color: green;"><?php echo $row_ad['sh_name']; ?></td>
    <td style="color: green;" class="text-right"><?php echo number_format($row_ad['sharevalue']); ?></td>
    <td style="color: green;" class="text-right"><?php echo $row_ad['inputter']; ?></td>
  </tr>

<?php
    }



    ////////////////////////////////////////// Election result report his //////////////////////////////////
    function showElectionDetail_result2()
    {

?>

  <div class="box-body">
    <thead>

      <tr>
        <th>S.No</th>
        <th>ID</th>
        <th>Candidate Name</th>
        <th>Vote</th>
        <th>Inputter</th>
      </tr>
    </thead>


    <tbody>
      <?php
      require "conn1.php";
      if ($con) {
        $seq_no = 0;
        $total = 0;
        $totalp = 0;

        $query = "SELECT res.candidate_id as id, sh.name_e as name_e, res.candidate_id as candidate_id, SUM(res.v_value) as v_value
                      FROM shareholder as sh 
                      INNER JOIN elc_result as res ON sh.id=res.candidate_id
                      WHERE sh.id != '99999999'
                      AND res.status = 'INF'
                      GROUP BY res.candidate_id
                      ORDER BY v_value DESC";


        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $seq_no++;
          showElectionDetail_resultRow2($row, $seq_no);

          ////////////////// detail voters list ///////////////////////
          $VoteDetailQuery = "SELECT vo.sh_id as shareholderid, sh.name_e as sh_name, vo.candidate_id as candidate, vo.v_value as sharevalue, vo.inputter as inputter 
                                  FROM elc_result vo INNER JOIN shareholder sh ON vo.sh_id = sh.id
                                  WHERE vo.candidate_id ='" . $row['id'] . "'
                                  ORDER BY vo.candidate_id";
          $VoteDetailResult = mysqli_query($con, $VoteDetailQuery);

          while ($row_ad = mysqli_fetch_array($VoteDetailResult)) {


            showElectionDetail_resultRow_ad2($row_ad);
          }
        }
      ?>
    </tbody>
  </div>
<?php

      }
    }

    function showElectionDetail_resultRow2($row, $seq_no)
    {
?>
<tr>
  <td style='font-family:courier'><b>
      <h4><?php echo $seq_no; ?></h4>
    </b></td>
  <td style='font-family:courier'><b>
      <h4><?php echo $row['id']; ?></h4>
    </b></td>
  <td style='font-family:courier'><b>
      <h4><?php echo $row['name_e']; ?></h4>
    </b></td>
  <td style='font-family:courier' class="text-right"><b>
      <h4><?php echo number_format($row['v_value']); ?></h4>
    </b></td>
</tr>

<?php
    }
    function showElectionDetail_resultRow_ad2($row_ad)
    {
?>
  <tr>
    <td></td>
    <td style="color: green;"><?php echo $row_ad['shareholderid']; ?></td>
    <td style="color: green;"><?php echo $row_ad['sh_name']; ?></td>
    <td style="color: green;" class="text-right"><?php echo number_format($row_ad['sharevalue']); ?></td>
    <td style="color: green;"><?php echo $row_ad['inputter']; ?></td>
  </tr>

<?php
    }


    ////////////////////////////////////////// Election result report 1 //////////////////////////////////
    function showElection_result2()
    {

?>

  <div class="box-body">
    <thead>

      <tr>
        <th>Rank</th>
        <th>ID</th>
        <th>Candidate Name</th>
        <th>Vote</th>
      </tr>
    </thead>


    <tbody>
      <?php
      require "conn1.php";
      if ($con) {
        $seq_no = 0;
        $total = 0;
        $totalp = 0;

        $query = "SELECT res.candidate_id as id, sh.name_e as name_e, res.candidate_id as candidate_id, SUM(res.v_value) as v_value
                      FROM shareholder as sh 
                      INNER JOIN elc_result as res ON sh.id=res.candidate_id
                      WHERE sh.id != '99999999'
                      AND res.status = 'INF'
                      GROUP BY res.candidate_id
                      ORDER BY v_value DESC";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $seq_no++;
          showElection_resultRow2($row, $seq_no); //$seq_no, 
          //$total = $total + $row['subscribed_share'];
          //$totalp = $totalp + $row['paid_share']; 
          //$per = '%'; 
        }
      ?>
    </tbody>
  </div>
<?php //colspan="5" style="color: green;"

      }
    }

    function showElection_resultRow2($row, $seq_no)
    {
?>
<tr>
  <td style='font-family:courier'><b><?php echo $seq_no; ?></b></td>
  <td style='font-family:courier'><?php echo $row['id']; ?></td>
  <td style='font-family:courier'><?php echo $row['name_e']; ?></td>
  <td style='font-family:courier' class="text-right"><?php echo number_format($row['v_value']); ?></td>
</tr>


<?php
    }



    ////////////////////////////////////////// Election result report 1 //////////////////////////////////
    function showElection_result_all()
    {

?>

  <div class="box-body">
    <thead>

      <tr>
        <th>Rank</th>
        <th>ID</th>
        <th>Candidate Name</th>
        <th>Voted By</th>
        <th>Vote</th>
      </tr>
    </thead>


    <tbody>
      <?php
      require "conn1.php";
      if ($con) {
        $seq_no = 0;
        $seq_no1 = 0;
        $total = 0;
        $totalp = 0;

        $query = "WITH ord AS(
          SELECT res.candidate_id as id, sh.name_e as name_e, res.candidate_id as candidate_id,  SUM(res.v_value) as v_value, res.status as status, 'NON-INFULENTIAL' as vote_stat
                                FROM shareholder as sh 
                                INNER JOIN elc_result as res ON sh.id=res.candidate_id
                                WHERE sh.id != '99999999'
                                AND res.status = 'INF'
                                GROUP BY res.candidate_id
                                ORDER BY v_value DESC
                                LIMIT 3)
          SELECT ord.id, ord.name_e, ord.candidate_id, ord.v_value, ord.status, ord.vote_stat FROM ord
          UNION ALL 
          SELECT res.candidate_id as id, sh.name_e as name_e, res.candidate_id as candidate_id,  SUM(res.v_value) as v_value, res.status as status, 'ALL-SHAREHOLDERS' as vote_stat
                                FROM shareholder as sh 
                                INNER JOIN elc_result as res ON sh.id=res.candidate_id
                                WHERE sh.id != '99999999'
                                AND res.status = 'ORD'
                                GROUP BY res.candidate_id
                                ORDER BY v_value DESC
                                LIMIT 9";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $seq_no++;
          showElection_resultRow_all($row, $seq_no);
        }

      ?>
    </tbody>

  </div>
<?php

      }
    }

    function showElection_resultRow_all($row, $seq_no)
    {
?>
<tr>
  <td style='font-family:courier'><b><?php echo $seq_no; ?></b></td>
  <td style='font-family:courier'><?php echo $row['id']; ?></td>
  <td style='font-family:courier'><?php echo $row['name_e']; ?></td>
  <td style='font-family:courier'><?php echo $row['vote_stat']; ?></td>
  <td style='font-family:courier' class="text-right"><?php echo number_format($row['v_value']); ?></td>
</tr>

<?php

    }

    ////////////////////////////////////////// Election result report 1 //////////////////////////////////
    function showElection_result_all1()
    {

?>

  <div class="box-body">
    <thead>

      <tr>
        <th>Rank</th>
        <th>ID</th>
        <th>Candidate Name</th>
        <th>Voted By</th>
        <th>Vote</th>
      </tr>
    </thead>


    <tbody>
      <?php
      require "conn1.php";
      if ($con) {
        $seq_no = 0;
        $seq_no1 = 0;
        $total = 0;
        $totalp = 0;

        $query = "WITH ord AS(
          SELECT res.candidate_id as id, sh.name_e as name_e, sh.name_a as name_a, res.candidate_id as candidate_id,  SUM(res.v_value) as v_value, res.status as status, 'ተፅዕኖ ፈጣሪ ባልሆኑ ባለአክስዮኖች የተመረጡ' as vote_stat
                                FROM shareholder as sh 
                                INNER JOIN elc_result as res ON sh.id=res.candidate_id
                                WHERE sh.id != '99999999'
                                AND res.status = 'INF'
                                GROUP BY res.candidate_id
                                ORDER BY v_value DESC
                                LIMIT 3)
          SELECT ord.id, ord.name_e, ord.name_a, ord.candidate_id, ord.v_value, ord.status, ord.vote_stat FROM ord
          UNION ALL 
          SELECT res.candidate_id as id, sh.name_e as name_e, sh.name_a as name_a, res.candidate_id as candidate_id,  SUM(res.v_value) as v_value, res.status as status, 'በሁሉም ባለአክስዮኖች የተመረጡ' as vote_stat
                                FROM shareholder as sh 
                                INNER JOIN elc_result as res ON sh.id=res.candidate_id
                                WHERE sh.id != '99999999'
                                AND res.status = 'ORD'
                                GROUP BY res.candidate_id
                                ORDER BY v_value DESC
                                LIMIT 9";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
          $seq_no++;
          showElection_resultRow_all1($row, $seq_no);
        }

      ?>
    </tbody>

  </div>
<?php

      }
    }

    function showElection_resultRow_all1($row, $seq_no)
    {
?>
<tr>
  <td style='font-family:courier'><b><?php echo $seq_no; ?></b></td>
  <td style='font-family:courier'><?php echo $row['id']; ?></td>
  <td style='font-family:courier'><?php echo $row['name_a']; ?></td>
  <td style='font-family:courier'><?php echo $row['vote_stat']; ?></td>
  <td style='font-family:courier' class="text-right"><?php echo number_format($row['v_value']); ?></td>
</tr>

<?php

    }

?>