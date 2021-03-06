<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Stock</title>

    <link rel="stylesheet" href="css/bootstrap_flatly.min.css" >
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="js/jquery.validate.min.js"></script> -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="text-center">
     <!-- method="POST" action="controller/AuthorizeController.php" -->
    <form class="form-signin" id="form-signin">
      <input type="hidden" name="cmd" value="login"/>
      <img class="mb-4" src="image/AOT-logo.png" alt="" width="200">
      <h1 class="h3 mb-3 font-weight-normal">Stock</h1>
      <div class="alert alert-dismissible alert-danger" id="invalid-message" style="display:none;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        Email หรือ Password ไม่ถูกต้อง <br/> กรุณากรอกใหม่อีกครั้ง
      </div>
      <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Email address" autofocus>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="button" id="submit-login">Log in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018 สกค. ฝฟค. ทดม.</p>
    </form>
  </body>
</html>
<script>
  $(document).ready(function(){
    validate();
    $('#submit-login').click(function(){
      $('#form-signin').data('bootstrapValidator').validate();
    })
    // $('#form-signin').validate({
		// 		rules: {
		// 			email: {
		// 				required: true,
		// 				email: true
		// 			},
		// 			password: {
		// 				required: true,
		// 			}
		// 		},
		// 		messages: {
		// 			password: {
		// 				required: "โปรดระบุ Password ให้ถูกต้อง"
		// 			},
		// 			email: "โปรดระบุ Email เพื่อใช้งานระบบ",
    //
		// 		},
		// 		errorElement: "em",
		// 		errorPlacement: function ( error, element ) {
		// 			// Add the `help-block` class to the error element
		// 			error.addClass( "help-block" );
    //
		// 			if ( element.prop( "type" ) === "checkbox" ) {
		// 				error.insertAfter( element.parent( "label" ) );
		// 			} else {
		// 				error.insertAfter( element );
		// 			}
		// 		},
		// 		highlight: function ( element, errorClass, validClass ) {
		// 			$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
		// 		},
		// 		unhighlight: function (element, errorClass, validClass) {
		// 			$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
		// 		},
    //     submitHandler: function(form) {
    //       $.ajax({
    //         type: "POST",
    //         url: "controller/AuthorizeController.php",
    //         catch:false,
    //         data:$('#form-signin').serialize(),
    //         async:false,
    //         success:function(data){
    //           var obj = jQuery.parseJSON(data);
    //           //console.log(data);
    //           if(obj.result==1)
    //           {
    //             window.location.href="index.php?view=test";
    //           }
    //           else{
    //             $('#invalid-message').show();
    //           }
    //           return false ;
    //         }
    //       });
    //       return false ;
    //     }
		// 	});

  })

  function validate()
  {
    $('#form-signin').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        message: 'The name is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        excluded: [':disabled'],
        fields: {
            email: {
                validators: {
                    notEmpty: {message: 'กรุณาใส่ชื่อระบบ'},
                    emailAddress: {message: 'กรุณาระบุอีเมลล์'}
                }
            },
            password: {
                validators: {
                    notEmpty: {message: 'กรุณาใส่รหัสผ่าน'}
                }
            }
        }
      }).on('success.form.bv', function(e) {
            e.preventDefault();
            $.ajax({
              type: "POST",
              url: "controller/AuthorizeController.php",
              catch:false,
              data:$('#form-signin').serialize(),
              async:false,
              success:function(data){
                var obj = jQuery.parseJSON(data);
                //console.log(data);
                if(obj.result==1)
                {
                  window.location.href="index.php?view=test";
                }
                else{
                  $('#invalid-message').show();
                  $('#form-signin').data('bootstrapValidator').resetForm();
                }
                return false ;
              }
            });
      });
  }
</script>
