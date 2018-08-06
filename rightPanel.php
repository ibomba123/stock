<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php include "header.php" ?>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <strong class="card-title"><?=$_REQUEST["view"]?></strong>
                      </div>
                      <div class="card-body">
                        <?php include "view/".$_REQUEST["view"].".php"?>
                      </div>
                  </div>
              </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
<!-- Right Panel -->
