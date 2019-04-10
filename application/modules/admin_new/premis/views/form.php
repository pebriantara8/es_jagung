
    <section class="content">
      <div class="row">
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">


          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Gejala</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frm_ed_img" action="<?php echo backend_url().$this->modul ?>/<?php echo isset($is_edit) ? 'save_edit' : 'save' ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      			<input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">

              <div class="box-body">

                <span id="warning_message"></span>
                <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Premis</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Nama" value="<?php echo isset($list) ? $list['name'] : '' ?>" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kategori Gejala</label>

                  <div class="col-sm-10">
                    <select class="select2" name="kategori_premis" required="">
                      <option value="">Kategori Gejala</option>
                      <?php foreach ($list_kat_premis as $key => $value): ?>
                          <option <?php echo (isset($list)?$list['premis_kategori_id']:'')==$value['id']?' selected':'' ?> value="<?php echo $value['id'] ?>"><?php echo $value['nama_premis_kategori'] ?></option>
                      <?php endforeach ?>
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