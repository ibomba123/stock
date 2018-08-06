<header id="header" class="header" style="width:99% !important ;">
    <div class="header-menu">
        <div class="col-sm-7">
          <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        </div>
        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <span><?=$login["email"]?></span>
            </div>
        </div>
    </div>
</header><!-- /header -->
<!-- Header-->
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
