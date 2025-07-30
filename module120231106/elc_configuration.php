<?php include '../admin/includes/session_popup.php'; ?>
<?php include '../admin/includes/header.php'; ?>

<body>
  <div>
    <section class="content-header">
      <h1>
        Election Configurations
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
              <a href="#addnewelec" data-toggle="modal" class="btn btn-primary btn-sm btn-round"><i class="fa fa-plus"></i> New</a>
              <a href="#closeelec" data-toggle="modal" class="btn btn-danger btn-sm btn-round pull-right"><i class="fa fa-warn"></i>Close Election</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th></th>
                  <th>Discription</th>
                  <th>Value</th>
                  <th>Election Date</th>
                  <th></th>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM elc_parameter";
                  $query = $conn->query($sql);
                  while ($row = $query->fetch_assoc()) {

                    echo "
                        <tr>
                          <td style='font-family:courier bold'>" . $row['shortname'] . "</td>
                          <td style='font-family:courier'>" . $row['description'] . "</td>
                          <td style='font-family:courier'>" . $row['value'] . "</td>
                          <td style='font-family:courier'>" . $row['elc_date'] . "</td>
                          <td style='font-family:courier' align='right'>
                            <button class='btn btn-sm editelc btn-round text-blue bold' data-id='" . $row['id'] . "'><i class='fa fa-edit'></i> Edit</button>
                            
                          </td>
                        </tr>
                      ";
                  }
                  ?><!--button class='btn btn-sm deleteelc btn-round text-red bold' data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button-->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include 'includes/module_config_modal.php'; ?>
  <?php include 'includes/scripts.php'; ?>
  <script>
    $(function() {
      $(document).on('click', '.editelc', function(e) {
        e.preventDefault();
        $('#editelc').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

      $(document).on('click', '.deleteelc', function(e) {
        e.preventDefault();
        $('#deleteelc').modal('show');
        var id = $(this).data('id');
        getRow(id);
      });

    });

    function getRow(id) {
      $.ajax({
        type: 'POST',
        url: 'elc_config_row.php',
        data: {
          id: id
        },
        dataType: 'json',
        success: function(response) {
          $('.id').val(response.id);
          $('#edit_shortname').val(response.shortname);
          $('#edit_description').val(response.description);
          $('#edit_remarks').val(response.remarks);
          $('#edit_value').val(response.value);
          $('#edit_elc_date').val(response.elc_date);
          $('.sharee').html(response.shortname + '-' + response.description);
        }
      });
    }
  </script>
</body>

</html>