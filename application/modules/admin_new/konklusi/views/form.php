
    <section class="content">
      <div class="row">
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">


          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Penyakit</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frm_ed_img" action="<?php echo backend_url().$this->modul ?>/<?php echo isset($is_edit) ? 'save_edit' : 'save' ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      			<input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">

              <div class="box-body">

                <span id="warning_message"></span>
                <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama Penyakit</label>

                  <div class="col-sm-10">
                    <input type="text" name="nama_penyakit" class="form-control" placeholder="Nama" value="<?php echo isset($list) ? $list['nama_konklusi'] : '' ?>" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="" class="col-sm-2 control-label"></label>

                  <div class="col-sm-10">
                    <h4>Silahkan pilih gejala-gejala pada penyakitnya!</h4>
                  </div>
                </div>

                <?php foreach ($list_premis as $key => $vlp) { ?>
                  <div class="form-group">
                    <label for="" class="col-sm-2 control-label"></label>

                    <div class="col-sm-10">
                      <u><h5 class="box-title" style="font-weight:bold;"><?=$vlp['nama_premis_kategori']?></h5></u>
                      <div class="col-md-6">
                      <b>AND</b>
                        <?php foreach ($vlp['premis'] as $key => $vp) { ?>
                          <input type="checkbox" name="asd" class="flat-red"> <?=$vp['nama_premis']?>
                        <?php } ?>
                      </div>
                      <div class="col-md-6"></div>
                      <b>OR</b>
                        <?php foreach ($vlp['premis'] as $key => $vp) { ?>
                          <input type="checkbox" name="asd" class="flat-red"> <?=$vp['nama_premis']?>
                        <?php } ?>
                      <label>
                      </label>
                    </div>
                  </div>
                <?php } ?>


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