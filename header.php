<?php
  session_start() ;
  $login = $_SESSION["user"] ;
  if($login==null)
  {
    header("location:login.php");
  }
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="javascript::void(0);">Stock</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">หน้าแรก<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">แบบฟอร์มขอติดตั้ง Computer <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="javascript::void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">จัดการอุปกรณ์</a>
          <a class="dropdown-item" href="?view=manageSystem">จัดการระบบ</a>
          <a class="dropdown-item" href="#">จัดการส่วนงาน</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-right">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="javascript::void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=$login["email"]?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="javascript:logout();">Log out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

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
