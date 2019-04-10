<!-- <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script> -->
<script src="<?php echo base_url() ?>assets/main/ckeditor/ckeditor.js"></script> 
<script src="<?php echo base_url() ?>assets/ckfinder/ckfinder.js"></script>


    <section class="content">
      <div class="row">
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">


          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Artikel</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="frm_ed_img" action="<?php echo backend_url().$this->modul ?>/<?php echo isset($is_edit) ? 'save_edit' : 'save' ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
      			<input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">

              <div class="box-body">

                <span id="warning_message"></span>
                <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>

                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" placeholder="Judul Artikel" value="<?php echo isset($list) ? $list['title'] : '' ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>

                  <div class="col-sm-10">
                    <?php if (isset($list)): ?>
                    <img id="file_preview" src="<?php echo base_url() ?>public/post_file/<?php echo htmlspecialchars_decode($list['image']) ?>" alt="" width="150px" />
                    <?php else: ?>
                    <img id="file_preview" src="" alt="" width="150px" />
                    <?php endif ?>
                    <input type="file" name="file" id="file_input" onchange="ValidateSingleInput(this);" <?php echo isset($is_edit) ? '' : 'required' ?> >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Konten</label>

                  <div class="col-sm-10">
                    <textarea id="content" name="post_content"><?php echo isset($list) ? $list['content'] : '' ?></textarea>
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