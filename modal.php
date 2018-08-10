<div class="modal fade" id="addSystem" tabindex="-1" role="dialog" aria-labelledby="addSystem" aria-hidden="true" >
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="headLabel">เพิ่ม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addSystemFrm" name="addSystemFrm">
              <input type="hidden" name="cmd" id="cmd" value="add"/>
              <input type="hidden" name="id_system" id="id_system" value=""/>
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-12 col-3 text-right"><span><b>ชื่อระบบ :</b></span></div>
                  <div class="col-xs-12 col-8"><input name="name" id="name" type="text" class="form-control" value=""/></div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>
