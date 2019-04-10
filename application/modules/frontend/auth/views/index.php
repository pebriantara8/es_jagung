            <form class="content_p" action="auth/cek_user" method="post">
              <h1>Login Presensi</h1>

          <?php if ($this->session->flashdata('alert_error')): ?>
          <div id="error_login" class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Error!</strong> <?php echo $this->session->flashdata('alert_error'); ?>
          </div>
          <?php endif ?>

              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required="" />
              </div>
              <div>
                <button class="btn_login btn btn-primary submit" type="submit">Masuk</button>
              </div>
              <br>
              <a class="reset_pass" href="<?php echo base_url() ?>auth/reset">Ganti kata sandi?</a>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?php echo base_url() ?>assets/img/logo_neox.svg" height="50px">
                  <br>
                  <br>
                  <p>©2018 Hak Cipta. Neox Indonesia.</p>
                </div>
              </div>
            </form>