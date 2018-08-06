<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">AOT Stock</a>
            <a class="navbar-brand hidden" href="./">S</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.html"> <i class="menu-icon ti ti-home"></i>หน้าหลัก</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti ti-user"></i>ผู้ใช้</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="ti ti-power-off"></i><a href="javascript:logout();">ออกจากระบบ</a></li>
                    </ul>
                </li>
                <h3 class="menu-title">Job</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti ti-clipboard"></i>ใบงาน</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="ti ti-hummer"></i><a href="ui-buttons.html">งานซ่อมทั่วไป</a></li>
                        <li><i class="ti ti-desktop"></i><a href="ui-badges.html">ขอติดตั้ง Computer & Printer</a></li>
                    </ul>
                </li>
                <h3 class="menu-title">Stock</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#"> <i class="menu-icon ti ti-package"></i>อุปกรณ์ระบบ</a>
                </li>
                <h3 class="menu-title">Admin</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti ti-harddrives"></i>จัดการข้อมูล</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti ti-settings"></i><a href="page-login.html">จัดการระบบ</a></li>
                        <li><i class="menu-icon ti ti-user"></i><a href="page-register.html">จัดการผู้ใช้</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<script>
  function logout()
  {
    $.ajax({
      type: "POST",
      url: "controller/AuthorizeController.php",
      catch:false,
      data:{"cmd":"logout"},
      async:false,
      success:function(data){
        var obj = jQuery.parseJSON(data);
        console.log(data);
        if(obj.result==1)
        {
          window.location.href="login.php";
        }
        return false ;
      }
    });
  }
</script>
