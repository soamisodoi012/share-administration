<div class="modal fade" id="nominee">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Nominee Shareholder</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="nominee_action.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="holder_id" class="col-sm-3 control-label">Shareholder ID</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="holder_id" name="holder_id" onkeyup="GetIdDetail(this.value)" value="" required>
                    </div>
                </div>
                <div class="form-group">
                  <label for="nominee_role" class="col-sm-3 control-label">Nominee Type</label>

                    <div class="col-sm-8">
                      
                      <select id = "nominee_role" name="nominee_role"  class="form-control">
                      <option value="" selected>--select--</option>
                        <option value="INF" >Infulential</option>
                        <option value="ORD">Ordinary</option>
                      </select>
                    </div>  
                </div>
                <div class="form-group">
                    <label for="name_e_a" class="col-sm-3 control-label">Full Name</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="name_e_a" name="name_e" readonly placeholder="Full Name ">
                    
                    </div>
                </div>
                <div class="form-group">
                    <label for="name_a_a" class="col-sm-3 control-label">ስም</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="name_a_a" name="name_a" readonly placeholder="ስም">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subscribed_share_a" class="col-sm-3 control-label">Subscribed Share</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="subscribed_share_a" name="subscribed_share" readonly placeholder="subscribed_share">
                    </div>
                </div>
                <div class="form-group">
                    <label for="paid_share_a" class="col-sm-3 control-label">Paid Share</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="paid_share_a" name="paid_share_a" readonly placeholder="paid_share">
                    </div>
                </div>
                <div class="form-group">
                    <label for="date_a" class="col-sm-3 control-label">Date</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="date_a" name="datee" readonly placeholder="date">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default btn-round pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-round" name="nominate"><i class="fa fa-check-square-o"></i> Nominate</button>
              </form>
            </div>
        </div>
    </div>
</div>
<script>
    function GetIdDetail(str) {
    if (str.length == 0) {
      document.getElementById
        ("name_e_a").value = "Share Holder Name";

      document.getElementById
        ("name_a_a").value = "Name";
      document.getElementById
        ("paid_share_a").value = "Paid Share";
      document.getElementById
        ("subscribed_share_a").value = "Subscribed Share in Birr";
      return;
    }
    else {

      // Creates a new XMLHttpRequest object
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 &&
            this.status == 200) {

          var myObj = JSON.parse(this.responseText);
          
          document.getElementById
            ("name_e_a").value = myObj[0];
          document.getElementById
            ("subscribed_share_a").value = myObj[1];
          document.getElementById
            ("paid_share_a").value = myObj[2];
          document.getElementById
            ("name_a_a").value = myObj[9];
            document.getElementById
            ("date_a").value = myObj[6];
        }
      };

      xmlhttp.open("GET", "../module1/get_reportDetails.php?holder_id=" + str, true);

      xmlhttp.send();
    }
  }

</script>