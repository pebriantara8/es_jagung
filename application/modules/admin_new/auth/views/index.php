<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Auth - Admin GKI Adisucipto</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/admin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/admin/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/style.css" rel="stylesheet">
    <!-- All Jquery -->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/jquery/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4><b>LOGIN</b></h4>
                                <form id="form_login" action="<?php echo backend_url() ?>auth/login" method="post">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Kata Sandi</label>
                                        <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
                                    </div>
                                    <div class="checkbox">
                                    <label class="pull-right">
                                        <a href="<?php echo backend_url() ?>auth/lupa_kata_sandi">Lupa kata sandi?</a>
                                    </label>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>assets/admin/js/scripts.js"></script>

</body>
    <script>
      $('#form_login').submit(function (e) {
      e.preventDefault();
      var frm = $('#form_login');
          var data = $("#form_login").serialize();
          var urlpost = $(this).attr('action');
          var method = $(this).attr('method');
          $.ajax({
              url: urlpost,
              type: method,
              dataType: 'json',
              data: data,
              beforeSend: function() {
                  console.log(data);
              },
              success: function(data) {
                  if(data.success){
                    // alert('success');
                    location.reload();
                  }else{
                    alert('Maaf, email atau kata sandi tidak cocok');
                    // $('#form_login')[0].reset();
                    // $('#load_error').load(location + ' #error_login');
                  }
              },
              error: function() {
                  alert('error')
              }
          });
      });
    </script>
</html>