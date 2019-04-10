<form id="frm_ed_img" action="<?php echo backend_url().$this->modul ?>/save_umum" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Header Text</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                        <div class="form-group">
                                            <label>Judul Utama</label>
                                            <input type="text" name="judul_utama" class="form-control" value="<?php echo $this->main_model->get_content_setting('judul_utama') ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Judul deskripsi</label>
                                            <textarea name="judul_utama_deskripsi" style="height: 100px;" class="form-control"><?php echo $this->main_model->get_content_setting('judul_utama_deskripsi') ?></textarea>
                                        </div>

                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-title">
                                <h4>Kontak</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" value="<?php echo $this->main_model->get_content_setting('email') ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input type="text" name="no_telepon" class="form-control" value="<?php echo $this->main_model->get_content_setting('no_telepon') ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Sekilas tentang kami</label>
                                            <textarea name="sekilas_tentang_kami" style="height: 100px;" class="form-control"><?php echo $this->main_model->get_content_setting('sekilas_tentang_kami') ?></textarea>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Gambar</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-group">
                                            <label>Gambar halaman depan rekomendasi 1920x660</label>
                                            <input type="hidden" name="gambar_utama_home_old" value="<?php echo $this->main_model->get_file_setting('gambar_utama_home'); ?>">
                                            <img id="file_preview_old" style="width: 100%;" src="<?php echo base_url().'public/others/'.$this->main_model->get_file_setting('gambar_utama_home'); ?>" alt="">
                                            <img id="file_preview" src="#" style="display: none; width: 100%;">
                                            <input type="file" id="file_input" onchange="ValidateSingleInput(this);" name="gambar_utama_home" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-title">
                                <h4>Background kritik dan saran</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-group">
                                            <!-- <label>Gambar halaman depan rekomendasi 1920x660</label> -->
                                            <input type="hidden" name="background_kdans_old" value="<?php echo $this->main_model->get_file_setting('background_kdans'); ?>">
                                            <img id="file_preview_old2" style="width: 100%;" src="<?php echo base_url().'public/others/'.$this->main_model->get_file_setting('background_kdans'); ?>" alt="">
                                            <img id="file_preview2" src="#" style="display: none; width: 100%;">
                                            <input type="file" id="file_input2" onchange="ValidateSingleInput(this);" name="background_kdans" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Action</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                	<button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</form>

<!-- <script>

$("#frm_ed_img").on('submit',(function(e) {
e.preventDefault();

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var dtt = new FormData(this);
    // $("#message").empty();
    // $('#loading').show();
    $.ajax({
    url: $(this).attr('action'), // Url to which the request is send
    type: "POST",             // Type of request to be send, called as method
    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    contentType: false,       // The content type used when sending data to the server.
    cache: false,             // To unable request pages to be cached
    processData:false,        // To send DOMDocument or non processed data file it is set to false
    beforeSend: function() {
      // $("#btn_upload_loading").html("loading...");
      // $(".progress").css('display','block');
      $("#btn_save").css('display','none');
      $("#btn_save_loading").css('display','block');
      console.log(dtt);
    },
    success: function(data)   // A function to be called if request succeeds
    {
      $("#btn_save").css('display','block');
      $("#btn_save_loading").css('display','none');
      var data = JSON.parse(data);
      // alert(data);
      if(data.location){
          var loc_load = data.location;
          // loc_load.reload();
          window.location.href = loc_load;
      }else{
          $('#s_a').load(location + ' #s_a_in');
      }
        // $('#loading').hide();
        // $("#message").html(data);
    }
    });
}));

</script> -->

<!-- Validate input type file -->
<script>
var _validFileExtensions = [".jpg", ".jpeg", ".gif", ".png"];
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                // alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                document.getElementById("file_preview").style.display="none";
                $.alert({
                    title: 'File Not Allowed Extensions!',
                    content: 'Allowed extensions are '+ _validFileExtensions.join(", "),
                });
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById("file_preview_old").style.display="none";
      document.getElementById("file_preview").style.display="block";
      $('#file_preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file_input").change(function() {
  readURL(this);
});


function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById("file_preview_old2").style.display="none";
      document.getElementById("file_preview2").style.display="block";
      $('#file_preview2').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file_input2").change(function() {
  readURL2(this);
});
</script>