<?php include '../admin/includes/session_popup.php'; ?>
<?php include '../admin/includes/header.php'; ?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    /* Absolute Center Spinner */
    .loader {
      position: fixed;
      z-index: 999;
      height: 2em;
      width: 2em;
      overflow: show;
      margin: auto;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
    }

    /* Transparent Overlay */
    .loader:before {
      content: '';
      display: block;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

      background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
    }

    /* :not(:required) hides these rules from IE9 and below */
    .loader:not(:required) {
      /* hide "loader..." text */
      font: 0/0 a;
      color: transparent;
      text-shadow: none;
      background-color: transparent;
      border: 0;
    }

    .loader:not(:required):after {
      content: '';
      display: block;
      font-size: 10px;
      width: 1em;
      height: 1em;
      margin-top: -0.5em;
      -webkit-animation: spinner 1500ms infinite linear;
      -moz-animation: spinner 1500ms infinite linear;
      -ms-animation: spinner 1500ms infinite linear;
      -o-animation: spinner 1500ms infinite linear;
      animation: spinner 1500ms infinite linear;
      border-radius: 0.5em;
      -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
      box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-moz-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @-o-keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    @keyframes spinner {
      0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a,
    .dropdown-btn {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 13px;
      display: block;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      outline: none;
    }

    /* Add an active class to the active dropdown button */

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
      display: none;
      padding-left: 8px;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
      float: right;
    }

    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }
  </style>
</head>
<div class="">
  <div class="loader"></div>
  <section class="content-header">
    <h1>
      Share Holders - Attendance
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
          <div class="box-header with-border">
            <a href="#attendance" data-toggle="modal" class="btn btn-primary btn-sm btn-round"><i class="fa fa-plus"></i> New</a>
          </div>

          <!------------------------------------------------------------Attendance Print-------------------------------------->
          <!------------------------------------------------------------------Attendance Print-------------------------------------->
          <div class="hidden" id="print_content_cert">

            <section class="">
              <h3 align='center'><img id='myImg' src='../images/goh_logo.png' width='200' height='60' align='center'></h3>
              <h4 class="text-right" style="font-family:Ebrima">ህዳር 12 ቀን 2017 ዓ.ም</h4>
              <h4 class="text-right" style="font-family:Ebrima">የባለአክሲዮን ልዩ መለያ ቁጥር : <u class="att_id" id="iddd"></u></h4>
            </section>
            <div class="container-fluid">
              <!--h4 class="text-center" style="font-family:courier">
                  Goh Betoch Bank
              </h4-->
              <!--------------------------------------- Attendance Print -------------------------------->

              <h3 class="text-center" style="font-family:Ebrima">የ2014፣ 2015 እና 2016 ዓ.ም በጀት ዓመት የትርፍ ድርሻ ድልድል ማሳወቂያ</h3>
             <h4 class="text-left" style="font-family:Ebrima">1. የባለአክሲዮን ሙሉ ስም : <u><b class="att_name_e" id="test11"></b></u></h4>
			 <table>
			 <tr>
			 <th>
			 </th>
			 <th>
			 <h4 class="text-center" style="font-family:Ebrima">በብር</h4>
			 </th>
			 </tr>
			 
			 <tr>
			 
			 <td>
              <h4 class="text-left" style="font-family:Ebrima">ሀ. የተፈረሙ አክሲዮኖች ብዛት : </u>
			
			  <h4 class="text-left" style="font-family:Ebrima">ለ. የተከፈለ አክሲዮን : </h4>
			
			  <h4 class="text-left" style="font-family:Ebrima">ሐ. ያልተከፈለ ቀሪ ገንዘብ : </h4>
			
			  <h4 class="text-left" style="font-family:Ebrima">መ. የትርፍ ድርሻ( ከታክስ በኋላ) : </h4>
			 </td>
			 
			  <td>
			   <h4 class="text-center" style="font-family:Ebrima"><u><b class="att_sub_share" id="test11"></b></u></h4>
			 
			   <h4 class="text-center" style="font-family:Ebrima"><u><b class="att_paid_share" id="test11"></b></u></h4>
			 
			   <h4 class="text-center" style="font-family:Ebrima"><u><b class="att_not_paid" id="test11"></b></u></h4>
			 
			   <h4 class="text-center" style="font-family:Ebrima"><u><b class="dividend" id="test11"></b></u></h4>
			  </td>
			  </tr>
			  
			  
			  
			  
			  
			  </table>
			  
               <h4 class="text-left" style="font-family:Ebrima">ቀጥሎ ለተመለከቱት ጉዳዮች ምርጫዎ በሆነው ሳጥን ውስጥ <img id='myImg' src='../images/checked.png' width='20' height='20'> ምልክት ያድርጉ</h4>
			  <h4 class="text-left" style="font-family:Ebrima"><img id='myImg' src='../images/checkbox.png' width='20' height='20'> 1. ከላይ የተገለፀው የትርፍ ድርሻ መከፈል ላለበት ቀሪ የተፈረመ የአክሲዮን ክፍያ ወይንም ለተጨማሪ አክሲዮን ማሳደጊያ እንዲውል ተስማምቻለሁ፡፡</h4>
			  <h4 class="text-left" style="font-family:Ebrima"><img id='myImg' src='../images/checkbox.png' width='20' height='20'> 1. የተፈረሙ አክሲዮኖች ሙሉ በሙሉ የተከፈሉ ስለሆነና ቀሪ የአክሲዮን ክፍያ ስለሌለኝ የትርፍ ድርሻዬን በጎሕ ቤቶች ባንክ _ _ _ _ _ _ _ _ _ 
			  ቅርንጫፍ በሚገኘው የሂሳብ ቁጥር _ _ _ _ _ _ _ _ _ _ _ _ ገቢ ይደረግልኝ፡፡</h4></br>
			  
			  

              <h4 class="text-left" style="font-family:Ebrima">የባለአክሲዮኑ (የተወካዩ) ስም:_ _ _ _ _ _ _ _ _ _ _</h4>
			  <h4 class="text-left" style="font-family:Ebrima">ስልክ ቁጥር:_ _ _ _ _ _ _ _ _ _ _ _ _ _የግብር ከፋይ መለያ ቁጥር _ _ _ _ _ _ _ _ _ _ _ _ _ _</h4>
			  <h4 class="text-left" style="font-family:Ebrima">የፋይዳ ልዩ ቁጥር(FIN):_ _ _ _ _ _ _ _ _ _ _ _ _ _ፊርማ _ _ _ _ _ _ _ _ቀን_ _ _ _ _ _</h4></br>
			  
              <h4 class="text-left" style="font-family:Ebrima"><b>ማሳሰቢያ:-</b></h4>
              <h5 class="text-left" style="font-family:Ebrima"><b>1ኛ</b>. የትርፍ ድርሻ ክፍፍሉ ተግባራዊ የሚሆነው የባንኩ ጠቅላላ ጉባኤ ከተከናወነ እና በትርፍ ክፍፍሉ ላይ ውሳኔ ከተሰጠ በኋላ እንደሆነ በትህትና እናሳውቃለን፡፡</h5>
              <h5 class="text-left" style="font-family:Ebrima"><b>2ኛ</b>. በ1ኛው የባለአክሲዮኖች አስቸኳይ ጠቅላላ ጉባኤ ውሳኔ መሰረት ባለአክሲዮኑ አዲስ አክሲዮን ለመግዛት የፈረሟቸውና ዋጋቸው ሙሉ በሙሉ ካልተከፈለ ለባለአክሲዮኑ 
			  የሚደርሰው ትርፍ ድርሻ ላልተከፈሉ ቀሪ አክሲዮኖች ክፍያ የሚውል ይሆናል፡፡</h5>
              <h5 class="text-left" style="font-family:Ebrima"><b>3ኛ</b>. የባንክ ስራ አዋጅን ለማሻሻል በወጣው አዋጅ ቁጠር 1159/2019 መሰረት ማንኛውም ባለአክሲዮን የትርፍ ድርሻው የሚከፈለው ወይም ላለበት ላልተከፈለ ቀሪ 
			  የአክሲዮን ክፍያ እንዲውል የሚደረገው ባለአክሲዮኑ ኢትዮጵያዊ ዜግነት ወይም ትውልደ ኢትዮጵያዊ መሆናቸውን የሚገልጽ የታደሰ መታወቂያ፣ ድርጅቶች ከሆኑ የድርጅቱ ባለአክሲዮኖች በሙሉ ኢትዮጵያዊ ዜግነት ወይም ትውልደ ኢትዮጵያዊያን 
			  መሆናቸውን የሚያረጋግጥ ማስረጃ በዚህ ጠቅላላ ጉባኤ ወቅት ወይንም በባንኩ ዋናው መስሪያ ቤት እና በቅርንጫፎቻችን በአካል በመቅረብ ይህንን ፎርም ተሞልቶ ሲፈረም መሆኑን በትህትና እናሳውቃለን፡፡</h5>
			 
               </div>
		       </div> 
              <!--------------------------------------- Attendance Print -------------------------------->

          <div class="box-body">
            <table id="example" class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Subscribed Share</th>
                <th>Paid Share</th>
                <th>Tools</th>
              </thead>
              <tbody>
                <?php
                // Prepare the first query
                $sqla = "SELECT username, role FROM admin WHERE id = ?";
                $stmt1 = $conn->prepare($sqla);
                $stmt1->bind_param("i", $_SESSION['admin']); // Assuming 'admin' is an integer value
                $stmt1->execute();
                $result1 = $stmt1->get_result();
                $user = $result1->fetch_assoc();

                $inputter = $user['username'];
                $role_a = $user['role'];

                if (1 == 1) {
                  // Prepare the second query
                  $sql = "SELECT sh.id as id, sh.name_e as name_e, sh.subscribed_share as subscribed_share, sh.paid_share as paid_share, att.timestamp as timestamp, att.inputter as inputter
                          FROM shareholder as sh 
                          INNER JOIN att_shareholder as att ON sh.id=att.id
                          WHERE sh.id != '99999999' AND sh.id != '8466' AND att.inputter = ?
                          ORDER BY att.timestamp DESC";
                  $stmt2 = $conn->prepare($sql);
                  $stmt2->bind_param("s", $inputter); // Assuming 'inputter' is a string value
                  $stmt2->execute();
                  $result2 = $stmt2->get_result();

                  while ($row = $result2->fetch_assoc()) {
                    $paid = $row['paid_share'];
                    $paid_share = number_format($paid / 1000);

                    $subscribed = $row['subscribed_share'];
                    $subscribed_share = number_format($subscribed / 1000);

                    echo "
                          <tr>
                            <td style='font-family:courier'>" . $row['id'] . "</td>
                            <td style='font-family:courier'>" . $row['name_e'] . "</td>
                            <td style='font-family:courier'>" . $subscribed_share . "</td>
                            <td style='font-family:courier'>" . $paid_share . "</td>           
                            <td style='font-family:courier'>
                                <button class='btn btn-sm att_rm btn-round' data-id='" . $row['id'] . "' disabled><i class='fa fa-eye'></i>Remove</button>
                                <button class='btn btn-sm att_prn btn-round' data-id='" . $row['id'] . "' ><i class='fa fa-print'></i></button>
                            </td>
                          </tr>
                        ";
                  }
                }

                // Close the statements and connection
                $stmt1->close();
                $stmt2->close();
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include 'includes/attendance_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>
<script>
  $(function() {
    $(document).on('click', '.att_rm', function(e) {
      e.preventDefault();
      $('#att_rm').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

    $(document).on('click', '.att_prn', function(e) {
      e.preventDefault();
      $('#att_prn').modal('show');
      var id = $(this).data('id');
      getRow(id);
      //print_content_cert(id)

    });

  });

  function getRow(id) {
    $.ajax({
      type: 'POST',
      url: '../admin/shareholders_row.php',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(response) {
        $('.id').val(response.id);

        $('.att_sh_id').val(response.id);
        $('.att_sub_share').html(Number(response.subscribed_share));

        	$('.att_paid_share').html(response.paid_share);

        var divisor = 1000; // The number you want to divide by
        var currentValue = Number($('.att_sub_share').html());
        var divisionResult = currentValue / divisor;
		
		//paid share
		var paid_share_total = Number($('.att_paid_share').html());
        var paid_sh_in100 = paid_share_total / divisor;
		
		//Not paid share
		var not_paid = currentValue - paid_share_total;
        $('.att_sub_share').html(formatNumberWithCommas(Number(response.subscribed_share)));
		

        $('.att_name_e').html(response.name_a);
        $('.att_id').html(response.id);
		$('.att_paid_share').html(formatNumberWithCommas(Number(response.paid_share)));
        $('.att_not_paid').html(formatNumberWithCommas(Number(not_paid)));  

        $('.dividend').html(formatNumberWithCommas(Number(response.dividend)));
        $('.name_e_sh').html('<b style="font-family:courier">Shareholder Name : </b>' + response.name_e);
        $('.sub_sh').html('<b style="font-family:courier">Subscribed Share : </b>' + Number(response.subscribed_share));
        $('.fullname').html(response.name_e + '/' + response.name_a);
        $('.inputter_sh').html('<b style="font-family:courier">Inputter : </b>' + response.inputter);
        $('.authorizer_sh').html('<b style="font-family:courier">Authorizer : </b>' + response.authorizer);
        $('.timestamp_sh').html('<b style="font-family:courier">Date Time : </b>' + response.timestamp);
      }
    });
  }

  document.onreadystatechange = function() {

    if (document.readyState !== "complete") {
      document.querySelector(
        "body").style.visibility = "hidden";
      document.querySelector(
        ".loader").style.visibility = "visible";
    } else {
      document.querySelector(
        ".loader").style.display = "none";
      document.querySelector(
        "body").style.visibility = "visible";
    }
  };

  function print_content_cert(id) {

    var page_content = document.body.innerHTML;
    //var image = "<img id='myImg' src='../images/goh_logo.png' width='200' height='70' align='center'>";
    var id = parseInt(document.getElementById("iddd").innerText);

    fetch('INF.txt')
      .then(response => response.text())
      .then(data => {
        // Parse the contents into an array of numbers
        //const infulentailList = data.split('\n').map(Number);

        //if (infulentailList.includes(id)) {

        //  var image1 = "<img id='myImg' src='../images/goh_logo.png' width='200' height='70' align='center'>";
        //  var print_content_cert2 = document.getElementById("print_content_cert2").innerHTML;
        //  print_content_cert2 = print_content_cert2;

        //  document.body.innerHTML = print_content_cert2;
        //  window.print();
        //  document.body.innerHTML = page_content;
        //  location.reload();


        //} else {
          var image2 = "<img id='myImg' src='../images/goh_logo.png' width='200' height='70' align='center'>";
          var print_content_cert = document.getElementById("print_content_cert").innerHTML;
          print_content_cert = print_content_cert;

          document.body.innerHTML = print_content_cert;
          window.print();
          document.body.innerHTML = page_content;

          location.reload();
        //}

      })
      .catch(error => {
        console.error('Error fetching the file:', error);
      });

  }
  function formatNumberWithCommas(number) {
    let [integerPart, decimalPart] = number.toString().split(".");
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return decimalPart ? integerPart + "." + decimalPart : integerPart;
}
</script>