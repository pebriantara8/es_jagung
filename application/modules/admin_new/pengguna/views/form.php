
    <section class="content">
      <div class="row">
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">


          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengguna</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frm_ed_img" action="<?php echo backend_url().$this->modul ?>/<?php echo isset($is_edit) ? 'save_edit' : 'save' ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      			<input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">

              <div class="box-body">

                <span id="warning_message"></span>
                <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Nama" value="<?php echo isset($list) ? $list['name'] : '' ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo isset($list) ? $list['email'] : '' ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>

                  <div class="col-sm-10">
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Email" value="<?php echo isset($list) ? $list['tanggal_lahir'] : '' ?>">
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Foto Profil</label>

                  <div class="col-sm-10">
                    <?php if (isset($list)): ?>
                    <img id="file_preview" src="<?php echo base_url() ?>public/warta/img/thumb/thumb_<?php echo htmlspecialchars_decode($list['image']) ?>" alt="" width="150px" />
                    <?php else: ?>
                    <img id="file_preview" src="" alt="" width="150px" />
                    <?php endif ?>
                    <input type="file" name="file" id="file_input" onchange="ValidateSingleInput(this);" <?php echo isset($is_edit) ? '' : 'required' ?> >
                  </div>
                </div> -->

                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pelayanan</label>

                  <div class="col-sm-10">
                    <select name="pelayanan_id" class="select2">
                      <option value="1">Komisi Dewasa Muda</option>
                      <option value="1">Bidang 1</option>
                      <option value="1">Bidang 2</option>
                      <option value="1">Bidang 3</option>
                      <option value="1">Bidang 4</option>
                    </select>
                  </div>
                </div> -->

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tipe Pengguna</label>

                  <div class="col-sm-10">
                    <select name="akses" class="select2">
                      <option <?=isset($list) ? $list['akses']==1 ? 'selected' : '' : ''?> value="1">Admin</option>
                      <option <?=isset($list) ? $list['akses']==2 ? 'selected' : '' : ''?> value="2">Penulis</option>
                    </select>
                  </div>
                </div>


              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              	<div class="col-sm-2">
              	</div>
              	<div class="col-sm-10">
                  <button type="button" class="btn btn-default" onclick="window.history.back()">Kembali</button>
	                <button type="submit" class="btn btn-info">Simpan</button>
              	</div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>



        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>

    <?php include 'form_js.php'; ?>