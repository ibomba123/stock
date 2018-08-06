<?php

?>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
        <span style="font-size: 35px; color:#2C3E50;">
          <i class="fas fa-sitemap"></i>
        </span>
        &nbsp;&nbsp;&nbsp;
        <span class="font18 font_bold">จัดการระบบ</span>
        &nbsp;&nbsp;&nbsp;
        <a href='#modal1' data-toggle='modal'  id="addBtn">
            <button type="button" class="btn btn-primary">เพิ่มระบบ</button>
        </a>
    </div>
  </div>
  <br/>
  <div class="row">
    <div class="col-xs-12">
      <table id="datatable" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="50%">ชื่อ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>
  </div>
  <br/>
</div>

<script>
$(document).ready(function() {
  $('#datatable').DataTable();
});

function createTable()
{
  //console.log(idDepthead,idDept)
  $.ajax({
    type:"POST",
    url:"view/datatable/system.php",
    catch:false,
    async:false,
    success:function(result){
      //console.log(result);
      $('#datatable').dataTable().fnDestroy();
      $('#tbody').empty();
      $('#tbody').append(result);
      table =  $('#table1').DataTable({
        "order": [],
        "lengthMenu": [ [25,50,100,-1], [25,50,100,"ทั้งหมด"] ],
        "pageLength": 100,
        "language": {
            "emptyTable": "ไม่พบข้อมูล",
            "info": "แสดงทั้งหมด _TOTAL_ รายการ",
            "infoEmpty": "แสดงทั้งหมด 0 รายการ",
            "infoFiltered": "(จากทั้งหมด _MAX_ รายการ)",
            "lengthMenu": "แสดง _MENU_",
            "search": "ค้นหา:",
            "zeroRecords": "ไม่พบข้อมูล",
            "paginate": {
                "previous":"ก่อนหน้า",
                "next": "ถัดไป",
                "last": "หลังสุด",
                "first": "หน้าสุด"
            }
        }
      });

      table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = (i+1)+".";
          });
      }).draw();
    }
  });
}
</script>
