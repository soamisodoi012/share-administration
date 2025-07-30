 <?php include 'includes/session_popup.php'; ?>
 <?php include 'includes/header.php'; ?>

 <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">

 </head>
 <style>
   input[type="checkbox"] {
     transform: scale(2);
     /* Increase the size of the checkbox */
     margin-right: 10px;
     /* Add some spacing between the checkbox and the label */
   }
 </style>
 <div class="">
   <section class="content-header">
     <h1>
       Election Nominee
     </h1>
   </section>
   <!-- Main content -->
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
      ?>

     <div class="row">
       <div class="col-xs-12">
         <div class="box">

           <div class="box-body">

             <form method="post" action="nominee_election.php">
               <!------------------------------------------------------------------------------------------------------------------------->
               <!------------------------------------------------------------------------------------------------------------------------->

               <div class="form-group">
                 <label for="holder_id" class="col-sm-3 control-label">Shareholder ID</label>
                 <div class="col-sm-8">
                   <input type="text" class="form-control" id="holder_id" name="holder_id" onkeyup="GetIdDetail(this.value)" value="">
				   <script>
					window.onload = function () {
						const inputFiled = document.getElementById("holder_id").focus();
					}
				   </script>
                 </div>
               </div>

               <div class="form-group">
                 <label for="name_e_a" class="col-sm-3 control-label">Full Name</label>
                 <div class="col-sm-8">
                   <input type="text" class="form-control" id="name_e_a" name="name_e" readonly placeholder="Full Name">
                 </div>
               </div>

               <div class="form-group">
                 <label for="subscribed_share_a" class="col-sm-3 control-label">Subscribed Share</label>
                 <div class="col-sm-8">
                   <input type="text" class="form-control" id="subscribed_share_a" name="subscribed_share" readonly placeholder="Subscribed Share">
                 </div>
               </div>
               <!------------------------------------------------------------------------------------------------------------------------->
               <!------------------------------------------------------------------------------------------------------------------------->
               <ul id="recordList">
                 <table id="" class="table table-bordered table-striped">
                   <thead>
                     <th style="font-size: 20px;">ID</th>
                     <th style="font-size: 20px;">Name</th>
                     <th style="font-size: 20px;">Nom. Type</th>
                     <!--th>Subscribed Share</th>
                    <th>Status</th-->
                     <th style="font-size: 20px;">----</th>
                   </thead>
                   <tbody>
                     <?php

                      $sql_param = "SELECT value FROM elc_parameter WHERE shortname='NV1'";
                      $query_param = $conn->query($sql_param);
                      $value_param = $query_param->fetch_assoc();
                      $max_vote = $value_param['value'];

                      $sql_param_ORD = "SELECT value FROM elc_parameter WHERE shortname='NV'";
                      $query_param_ORD = $conn->query($sql_param_ORD);
                      $value_param_ORD = $query_param_ORD->fetch_assoc();
                      $max_vote_ORD = $value_param_ORD['value'];

                      $max_Tot = $max_vote_ORD + $max_vote;

                      $sql = "SELECT sh.id as id, sh.name_a as name_a, sh.subscribed_share as subscribed_share, sh.paid_share as paid_share, 
                                CASE WHEN nom.remark='INF' THEN 'ተፅዕኖ ፈጣሪ ባልሆኑ የሚመረጡ' WHEN nom.remark = 'ORD' THEN 'በሁሉም የሚመረጡ' ELSE 'NONE' END as typee
                        FROM shareholder as sh 
                        INNER JOIN elc_nominee as nom ON sh.id=nom.sh_id
                        WHERE sh.id != '99999999'
                        AND nom.remark = 'ORD'";

                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        $selectedCounter = 0;
                        while ($row = $result->fetch_assoc()) {
                          echo '<tr>';
                          echo '<td style="font-family:courier; font-size: 20px;">';
                          echo '<label>' . $row['id'] . '</label>';
                          echo '</td>';
                          echo '<td style="font-family:courier; font-size: 20px;">';
                          echo '<label>' . $row['name_a'] . '</label>';
                          echo '</td>';
                          echo '<td style="font-family:courier; font-size: 20px;">';
                          echo '<label>' . $row['typee'] . '</label>';
                          echo '</td>';
                          //echo '<td style="font-family:courier; font-size: 20px;">';
                          //echo '<label>' . $row['subscribed_share'] . '</label>';
                          //echo '</td>';
                          //echo '<td style="font-family:courier; font-size: 14px;">';
                          //echo '<label>Nominee</label>';
                          //echo '</td>';
                          echo '<td style="font-family:courier; font-size: 14px;">';
                          echo '<input type="checkbox" name="record[]" value="' . $row['id'] . '" onclick="updateCounter(this)">';
                          $selectedCounter++;
                          echo '</td>';

                          echo '</tr>';
                        }
                      } else {
                        echo 'No records found.';
                      }

                      //$conn->close();
                      ?>
                   </tbody>
                   <br>
                   <tbody>
                     <?php

                      $sql_param = "SELECT value FROM elc_parameter WHERE shortname='NV1'";
                      $query_param = $conn->query($sql_param);
                      $value_param = $query_param->fetch_assoc();
                      $max_vote = $value_param['value'];

                      $sql_param_ORD = "SELECT value FROM elc_parameter WHERE shortname='NV'";
                      $query_param_ORD = $conn->query($sql_param_ORD);
                      $value_param_ORD = $query_param_ORD->fetch_assoc();
                      $max_vote_ORD = $value_param_ORD['value'];

                      $max_Tot = $max_vote_ORD + $max_vote;

                      $sql = "SELECT sh.id as id, sh.name_a as name_a, sh.subscribed_share as subscribed_share, sh.paid_share as paid_share, 
                                CASE WHEN nom.remark='INF' THEN 'ተፅዕኖ ፈጣሪ ባልሆኑ የሚመረጡ' WHEN nom.remark = 'ORD' THEN 'በሁሉም የሚመረጡ' ELSE 'NONE' END as typee
                        FROM shareholder as sh 
                        INNER JOIN elc_nominee as nom ON sh.id=nom.sh_id
                        WHERE sh.id != '99999999'
                        AND nom.remark = 'INF'";

                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                        $selectedCounter2 = 0;
                        while ($row = $result->fetch_assoc()) {
                          echo '<tr>';
                          echo '<td style="font-family:tomha; font-size: 20px;">';
                          echo '<label>' . $row['id'] . '</label>';
                          echo '</td>';
                          echo '<td style="font-family:tomha; font-size: 20px;">';
                          echo '<label>' . $row['name_a'] . '</label>';
                          echo '</td>';
                          echo '<td style="font-family:tomha; font-size: 20px;">';
                          echo '<label>' . $row['typee'] . '</label>';
                          echo '</td>';
                          echo '<td style="font-family:tomha; font-size: 14px;">';
                          echo '<input type="checkbox" name="record1[]" value="' . $row['id'] . '" onclick="updateCounter2(this)">';
                          $selectedCounter2++;
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
               </ul>
               <button type="submit" class="btn-primary btn-lg" name="nominee_vote" onclick="return validateForm()">Vote</button>
             </form>
           </div>
         </div>
       </div>
     </div>
   </section>
 </div>
 <?php include 'includes/scripts.php'; ?>

 <script>
   function GetIdDetail(str) {
     if (str.length == 0) {
       document.getElementById("name_e_a").value = "Share Holder Name";
       document.getElementById("subscribed_share_a").value = "Subscribed Share";

       var checkboxes = document.getElementsByName('record1[]');
       for (var i = 0; i < checkboxes.length; i++) {
         checkboxes[i].disabled = true;
       }
       return;
     } else {

       // Creates a new XMLHttpRequest object
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {

         if (this.readyState == 4 &&
           this.status == 200) {

           var myObj = JSON.parse(this.responseText);

           document.getElementById("name_e_a").value = myObj[0];
           document.getElementById("subscribed_share_a").value = myObj[10];

           var INFidentifer = myObj[12];

           if (INFidentifer == 'Y') {
             var checkboxes = document.getElementsByName('record1[]');
             for (var i = 0; i < checkboxes.length; i++) {
               checkboxes[i].disabled = true;
             }
           }else{
            var checkboxes = document.getElementsByName('record1[]');
             for (var i = 0; i < checkboxes.length; i++) {
               checkboxes[i].disabled = false;
             }
           }

         }
       };

       xmlhttp.open("GET", "get_reportDetails.php?holder_id=" + str, true);

       xmlhttp.send();
     }
   }

   var selectedCounter = 0;
   var selectedCounter2 = 0;


   function updateCounter2(checkbox) {
     if (checkbox.checked) {
       selectedCounter2++;
     } else {
       selectedCounter2--;
     }


     var checkboxes = document.querySelectorAll('input[name="record1[]"]');

     
     checkboxes.forEach(function(cb) {
       if (selectedCounter2 >= <?php echo $max_vote; ?> && !cb.checked) {
         cb.disabled = true;
       } else {
         cb.disabled = false;
       }
     });
   }

   function updateCounter(checkbox) {
     if (checkbox.checked) {
       selectedCounter++;
     } else {
       selectedCounter--;
     }

     var checkboxes = document.querySelectorAll('input[name="record[]"]');
     checkboxes.forEach(function(cb) {
       if (selectedCounter >= <?php echo $max_vote_ORD; ?> && !cb.checked) {
         cb.disabled = true;
       } else {
         cb.disabled = false;
       }
     });
   }


   function validateForm() {
     var checkboxes = document.getElementsByName('record[]');
     var checkedCount = 0;

     var checkboxes1 = document.getElementsByName('record1[]');
     var checkedCount1 = 0;

     for (var i = 0; i < checkboxes.length; i++) {
       if (checkboxes[i].checked) {
         checkedCount++;
       }
     }
     for (var i = 0; i < checkboxes1.length; i++) {
       if (checkboxes1[i].checked) {
         checkedCount1++;
       }
     }

     if ((checkedCount === 0 ) && (checkedCount1 === 0 )){
       alert("Please check at least one checkbox.");
       return false;
     }

     // Additional validation logic can be added here

     return true;
   }
 </script>