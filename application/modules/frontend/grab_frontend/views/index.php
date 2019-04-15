<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Sistem Pakar - Penyakit Jagung</title>
    <meta name="Description" content="Sistem pakar pendeteksi penyakit pada tanaman jagung">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/sp/css/bootstrap/bootstrap.min.css">
	  <link rel="stylesheet" href="<?=base_url()?>assets/sp/css/normalize/normalize.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/sp/css/style.css">
    <link rel="icon" type="image/png" href="<?=base_url()?>assets/sp/images/logo.svg">
  </head>
  <body>
	<!-- Image and text -->
    <nav class="navbar navbar-dark bg-dark">
		<a class="navbar-brand" href="#">
		  <img src="<?=base_url()?>assets/sp/images/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
		  SISTEM PAKAR PENYAKIT JAGUNG
		</a>
    </nav>
    <!-- Content Start -->
        <?php if($content) $this->load->view($content); ?>
    <!-- Content End -->

    <!-- Optional JavaScript -->
	<script src="<?=base_url()?>assets/sp/js/index.js"></script>
  </body>
</html>
