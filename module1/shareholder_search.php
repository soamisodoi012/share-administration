<?php include 'includes/session_popup.php'; ?>
<?php include 'includes/header.php'; ?>

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
      Share Holders
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
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th>S.No</th>
                <th>ID</th>
                <th>Name</th>
                <th>Subscribed Share</th>
				<th>Dividend</th>
                <th>Nationality</th>
                <th>Phone Number</th>
              </thead>
              <tbody>
                <?php
                $sqn = 0;
                $sql = "SELECT sh.id as id, sh.name_e as name_e, sh.subscribed_share as subscribed_share, sh.paid_share as paid_share, sh.dividend as dividend, sh.nationality as nationality, sh.phone_number as phone_number
                  FROM shareholder as sh
                  WHERE sh.id != '99999999'
				  AND id != '8466'
				  AND subscribed_share !=0
                  ORDER BY TRIM(sh.name_e) ASC"; //IN ('8011','8010','8014')
                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {
                  $sqn++;
                  $paid = $row['paid_share'];           //$row['paid_share']
                  $paid_share = number_format($paid);

                  $subscribed = $row['subscribed_share'];           //$row['subscribed_share']
                  $subscribed_share = number_format($subscribed / 1000);


                  echo "
                      <tr>
                        <td style='font-family:courier'>" . $sqn . "</td>
                        <td style='font-family:courier'>" . $row['id'] . "</td>
                        <td style='font-family:courier'>" . $row['name_e'] . "</td>
                        <td style='font-family:courier' align='right'>" . $subscribed_share . "</td>      
						<td style='font-family:courier'>" . $row['dividend'] . "</td>
                        <td style='font-family:courier'>" . $row['nationality'] . "</td>
                        <td style='font-family:courier'>" . $row['phone_number'] . "</td>
                        
                      </tr>
                    ";
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
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
</script>