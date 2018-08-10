<?php

?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
        <button data-toggle='modal'  id="addBtn" data-target="#addSystem" type="button" class="btn btn-primary">เพิ่มระบบ</button>
    </div>
  </div>
  <br/>
  <div class="row">
    <div class="col">
      <table id="datatable" class="table table-striped table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th width="5%">ลำดับ</th>
                <th width="50%">ชื่อ</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
    </div>
  </div>
  <br/>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    createTable();
    validate();

    $('#addSystem').on('hidden.bs.modal', function (e) {
      $('#addSystemFrm').data('bootstrapValidator').resetForm();
      $('#addSystemFrm #id_system').val("");
      $('#addSystemFrm #name').val("");
      $('#addSystemFrm #cmd').val("add");
      $('#addSystem #headLabel').text("เพิ่ม");
    })

  });

  function validate()
  {
    $('#addSystemFrm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        message: 'The name is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            name: {
                validators: {
                    notEmpty: {message: 'กรุณาใส่ชื่อระบบ'}
                }
            }
        }
      }).on('success.form.bv', function(e) {
            e.preventDefault();
            console.log($('#addSystemFrm').serialize());
            $.ajax({
              type:"POST",
              url:"controller/SystemController.php",
              data:$('#addSystemFrm').serialize(),
              catch:false,
              async:false,
              success:function(data){
                var result = jQuery.parseJSON(data);
                if(result.success==1)
                {
                  createTable();
                  $('#addSystem').modal('hide');
                }
              }
            });
      });
  }

  function createTable()
  {
    $.ajax({
      type:"POST",
      url:"view/datatable/system.php",
      catch:false,
      async:true,
      success:function(result){
        $('#datatable').dataTable().fnDestroy();
        $('#tbody').empty();
        $('#tbody').append(result);
        table =  $('#datatable').DataTable({
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

  function editSystem(obj)
  {
    var id = $(obj).data('id');
    var name = $(obj).data('name');
    $('#addSystemFrm #id_system').val(id);
    $('#addSystemFrm #name').val(name);
    $('#addSystemFrm #cmd').val("update");
    $('#addSystem #headLabel').text("แก้ไข");
    $('#addSystem').modal('show');
  }

  function deleteSystem(obj)
  {
    var id = $(obj).data('id');
    if(id > 0)
    {
      bootbox.confirm({
          message: "ต้องการลบข้อมูลระบบนี้ ใช่หรือไม่ ?",
          buttons: {
              confirm: {
                  label: 'ใช่ ลบเลย',
                  className: 'btn-success'
              },
              cancel: {
                  label: 'ไม่ ยังไม่ลบ',
                  className: 'btn-danger'
              }
          },
          callback: function (result) {
              if(result)
              {
                $.ajax({
                  type:"POST",
                  url:"controller/SystemController.php",
                  data:{"cmd":"delete","id_system":id},
                  catch:false,
                  async:false,
                  success:function(data){
                    var result = jQuery.parseJSON(data);
                    if(result.success==1)
                    {
                      createTable();
                    }
                  }
                });
              }
          }
      });
    }
  }

</script>
