            <form class="content_p" action="auth/cek_user" method="post">
              <h1>Reset Kata Sandi</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Kata Sandi" required="" />
              </div>
              <div>
                <input type="password" name="password_baru" class="form-control" placeholder="Kata Sandi Baru" required="" />
              </div>
              <div>
                <button class="btn_login btn btn-default submit" type="submit">Ganti Password</button>
              </div>
              <br>
               <a class="reset_pass" href="<?php echo base_url() ?>auth">Masuk?</a>

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