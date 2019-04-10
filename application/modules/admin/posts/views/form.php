<!-- <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script> -->
<script src="<?php echo base_url() ?>assets/main/ckeditor/ckeditor.js"></script> 
<script src="<?php echo base_url() ?>assets/ckfinder/ckfinder.js"></script>

<form id="frm_ed_img" action="<?php echo backend_url().$this->modul ?>/save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $this->uri->segment(4) ?>">
<input type="hidden" name="img_old" value="<?php echo isset($list) ? $list['image'] : '' ?>">

                <div class="row">
                    <div class="col-lg-9">

                        <div id="s_a">
                            <div id="s_a_in">
                                <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-title">
                                <h4>Judul</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-group">
                                            <input type="text" name="title" value="<?php echo isset($list) ? $list['title'] : '' ?>" class="form-control input-flat" placeholder="Tulis judul disini.. ">
                                        </div>
                                </div>
                            </div>

                            <div class="card-title">
                                <!-- <h4>Content</h4> -->
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-group">
                                            <!-- <textarea id="editor" name="content"></textarea> -->
                                            <!-- <textarea id="content" name="contents"></textarea> -->
                                            <!-- <input id="content" type="text" name="contents"> -->
                                            <!-- <input type="text" name="contents"> -->
                                            <textarea id="content" name="post_content"><?php echo isset($list) ? $list['content'] : '' ?></textarea>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-3">

                        <div class="card">
                            <div class="card-title">
                                <h4>Gambar Utama</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Upload gambar utama disini.</p>
                                            <span id="preview"></span>
                                            <?php if (isset($list)): ?>
                                                <img id="file_preview" src="<?php echo base_url() ?>public/post_file/<?php echo htmlspecialchars_decode($list['image']) ?>" alt="" width="100%" />
                                                <input type="file" class="form-control" name="file" id="file_input" onchange="ValidateSingleInput(this);">
                                            <?php else: ?>
                                                <img id="file_preview" src="#" alt="" width="100%" />
                                                <input type="file" class="form-control" name="file" id="file_input" onchange="ValidateSingleInput(this);" required="">
                                            <?php endif ?>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-title">
                                <h4>Simpan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Simpan postingan berikut disini..</p>
                                            <button id="btn_save" type="submit" value="submit" class="btn btn-primary btn-boundered">Simpan</button>
                                            <button type="button" style="display: none;" id="btn_save_loading" class="btn btn-primary btn-boundered">Menyimpan..</button>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-title">
                                <h4>Kategori</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Kategori postingan default:</p>
                                            <p>Komisi Remaja</p>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /# column -->
                </div>
</form>

<script>

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

</script>

<!-- <script>
  $('#frm_ed_img').submit(function (e) {
  alert('ok'); 
  e.preventDefault();
  var frm = $('#frm_ed_img');
      var data = $("#frm_ed_img").serialize();
      var url = $(this).attr('action');
      var type = $(this).attr('method');
      // send the formData
      var formData = new FormData( $("#frm_ed_img")[0] );

      $('.myprogress').css('width', '0');

      $.ajax({
          url : url,  // Controller URL
          type : 'POST',
          data : formData,
          // async : false,
          cache : false,
          contentType : false,
          processData : false,
          xhr: function () {
              // var xhr = new window.XMLHttpRequest();
              // xhr.upload.addEventListener("progress", function (evt) {
              //     if (evt.lengthComputable) {
              //         var percentComplete = evt.loaded / evt.total;
              //         percentComplete = parseInt(percentComplete * 100);
              //         $('.myprogress').html(percentComplete + '%');
              //         $('.myprogress').css('width', percentComplete + '%');
              //     }
              // }, false);
              // return xhr;
              // alert('asd')
          },
          beforeSend: function() {
              $("#btn_upload_loading").html("loading...");
              $(".progress").css('display','block');
              console.log(data);
          },
          success: function(data) {
            // $("#btn_upload_loading").html("Perbarui");
            // $(".progress").css('display','none');
            // var data = JSON.parse(data);
            // if(data.success){
            //   $.alert({
            //       title: 'Success!',
            //       content: data.success+' Berhasil diupload :)',
            //   });
            //   $('#load_img').load(location + ' #c_load_img');
            //   // $('#frm_ed_img')[0].reset();
            // }else{
            //   $.alert({
            //       title: 'Error!',
            //       content: ''+data.error+'',
            //   });
            // }
          },
          error: function() {
              alert('error')
          }
      });
  });
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
      document.getElementById("file_preview").style.display="block";
      $('#file_preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#file_input").change(function() {
  readURL(this);
});
</script>

<!-- ckeditor -->
<script>
    CKEDITOR.replace( 'content', {
        filebrowserBrowseUrl: '<?php echo base_url() ?>assets/ckfinder/ckfinder.html',
        filebrowserUploadUrl: '<?php echo base_url() ?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        // height: 500,
        // autoGrow_onStartup: true
        extraPlugins: 'autogrow',
        autoGrow_minHeight: '200',
        // autoGrow_maxHeight: '600'
        autoGrow_bottomSpace: '50'
    } );
</script>