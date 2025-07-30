<!------------------------------------------------Configuration modal for election screen-------------------------------------------------------------------->
<!------------------------------------------------------------ Add ----------------------------------------------------->
<div class="modal fade" id="addnewelec">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Election Configuration</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="elc_config_actions.php" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="shortname" class="col-sm-3 control-label">Short Name</label>

                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="shortname" name="shortname" required>
                    </div>
                <!--/div>

                <div class="form-group"-->
                    <label for="description" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                </div>

                <div class="form-group"-->
                    <label for="" class="col-sm-3 control-label">Value</label>

                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="value" name="value" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="remarks" class="col-sm-3 control-label">Remarks</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="remarks" name="remarks" rows="4" ></textarea>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-round pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-round" name="add_e"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------ close Election ----------------------------------------------------->
<div class="modal fade" id="closeelec">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Close Election !!!</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="elc_config_actions.php" enctype="multipart/form-data">
                
                <div class="form-group">
                    <p><h2 class="text-red text-center">Please Proceed With caution!!!!</h2></p>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-round pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-round" name="cls_elc"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------- Delete ------------------------------------------------------>

<div class="modal fade" id="deleteelc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="elc_config_actions.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE Configuration Details</p>
                    <h2 class="bold sharee"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-round pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-round" name="deleteel"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>




<!------------------------------------------------------------------- Edit ----------------------------------------------------------------->
<div class="modal fade" id="editelc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><b>Edit Configuration Details</b></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="id" name="id">
        <form class="form-horizontal" method="POST" action="elc_config_actions.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="edit_shortname" class="col-sm-3 control-label">Short Name</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="edit_shortname" name="shortname" readonly>
            </div>
            <label for="edit_description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="edit_description" name="description" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_value" class="col-sm-3 control-label">Value</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="edit_value" name="value" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_elc_date" class="col-sm-3 control-label">Election Date</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="edit_elc_date" name="elc_date" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_remarks" class="col-sm-3 control-label">Remarks</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="edit_remarks" name="remarks" rows="4" readonly></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-round pull-left" data-dismiss="modal">
              <i class="fa fa-close"></i> Close
            </button>
            <button type="submit" class="btn btn-success btn-round" name="editel">
              <i class="fa fa-check-square-o"></i> Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-------------------------------------------------------Configuration modal for attendance------------------------------------------------------>
<!------------------------------------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------- Delete ------------------------------------------------------>
<div class="modal fade" id="deletec">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="att_config_actions.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE Configuration Details</p>
                    <h2 class="bold sharee"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-round pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-round" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------ Add ----------------------------------------------------->
<div class="modal fade" id="addnewc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Attendance Configuration</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="att_config_actions.php" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="shortname" class="col-sm-3 control-label">Short Name</label>

                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="shortname" name="shortname" required>
                    </div>
                <!--/div>

                <div class="form-group"-->
                    <label for="description" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                </div>

                <div class="form-group"-->
                    <label for="" class="col-sm-3 control-label">Attendance Date</label>

                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="value" name="value" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="remarks" class="col-sm-3 control-label">Remarks</label>

                    <div class="col-sm-9">
                      <textarea class="form-control" id="remarks" name="remarks" rows="4" ></textarea>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-round pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-round" name="addc"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------- Edit ----------------------------------------------------------------->
<div class="modal fade" id="editc">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><b>Edit Configuration Details</b></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" class="id" name="id">
        <form class="form-horizontal" method="POST" action="att_config_actions.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="edit_shortname_a" class="col-sm-3 control-label">Short Name</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="edit_shortname_a" name="shortname" readonly>
            </div>
            <label for="edit_description_a" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="edit_description_a" name="description" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_value_a" class="col-sm-3 control-label">Value</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="edit_value_a" name="value" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_remarks_a" class="col-sm-3 control-label">Remarks</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="edit_remarks_a" name="remarks" rows="4" readonly></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-round pull-left" data-dismiss="modal">
              <i class="fa fa-close"></i> Close
            </button>
            <button type="submit" class="btn btn-success btn-round" name="editco">
              <i class="fa fa-check-square-o"></i> Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>