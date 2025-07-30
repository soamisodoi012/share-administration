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
          <div class="box-header with-border">
            <a href="#nominee" data-toggle="modal" class="btn btn-primary btn-sm btn-round"><i class="fa fa-plus"></i> New</a>
          </div>

          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Subscribed Share</th>
                <th>Type</th>
                <!--th>Tools</th-->
              </thead>
              <tbody>
                <?php
				$sqla = "SELECT role FROM admin WHERE id = '".$_SESSION['admin']."'";
                  $query1 = $conn->query($sqla);
                  $user = $query1->fetch_assoc();
                  $role = $user['role'];

                  if($role == 'admin'){
					  
                $sql = "SELECT sh.id as id, sh.name_e as name_e, sh.subscribed_share as subscribed_share, sh.paid_share as paid_share, nom.remark as stat
                  FROM shareholder as sh 
                  INNER JOIN elc_nominee as nom ON sh.id=nom.sh_id
                  WHERE sh.id != '99999999'";
                $query = $conn->query($sql);
                while ($row = $query->fetch_assoc()) {

                  $paid = $row['paid_share'];
                  $paid_share = number_format($paid);

                  $subscribed = $row['subscribed_share'];
                  $subscribed_share = number_format($subscribed / 1000);

                  echo "
                      <tr>
                        <td style='font-family:courier'>" . $row['id'] . "</td>
                        <td style='font-family:courier'>" . $row['name_e'] . "</td>
                        <td style='font-family:courier'>" . $subscribed_share . "</td>
                        <td style='font-family:courier'>" . $row['stat'] . "</td>           
                        
                      </tr>
                    ";
                }
				 }else {
					$_SESSION['error'] = "You Don't have permission to access this screen";
				}
                ?><!--td style='font-family:courier'>
                            <button class='btn  btn-sm nominee_rm btn-round' data-id='".$row['id']."'><i class='fa fa-trash'></i>Remove</button>
                        </td-->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php include 'includes/nominee_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>
<script>
  $(function() {
    $(document).on('click', '.nominee_rm', function(e) {
      e.preventDefault();
      $('#nominee_rm').modal('show');
      var id = $(this).data('id');
      getRow(id);
    });

  });

  function getRow(id) {
    $.ajax({
      type: 'POST',
      url: 'nominee_row.php',
      data: {
        id: id
      },
      dataType: 'json',
      success: function(response) {
        $('.id').val(response.id);

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
</script>