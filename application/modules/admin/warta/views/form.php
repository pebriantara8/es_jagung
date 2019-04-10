<!-- <script src="https://cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script> -->
<script src="<?php echo base_url() ?>assets/main/ckeditor/ckeditor.js"></script> 
<script src="<?php echo base_url() ?>assets/ckfinder/ckfinder.js"></script>

<form id="frm_ed_img" action="<?php echo backend_url().$this->modul ?>/<?php echo isset($list) ? 'update' : 'save' ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input type="hidden" name="id_warta" value="<?php echo $this->uri->segment(4) ?>">

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
                                <h4>File</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="form-group">
                                        <input type="file" name="file_warta" class="form-control input-flat" value="pdf">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /# column -->
                    <div class="col-lg-3">

                        <div class="card">
                            <div class="card-title">
                                <h4>Simpan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Simpan warta berikut disini..</p>
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

    var dtt = new FormData(this);
    $.ajax({
        url: $(this).attr('action'), // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        beforeSend: function() {
            $("#btn_save").css('display','none');
            $("#btn_save_loading").css('display','block');
            console.log(dtt);
        },
        success: function(data)   // A function to be called if request succeeds
        {

            $("#btn_save").css('display','block');
            $("#btn_save_loading").css('display','none');
            var data = JSON.parse(data);

                // $('#s_a').load(location + ' #s_a_in');
            if(data.success){
                // var loc_load = data.location;
                window.location.href = data.redirect;
            }else{
                toastr.error(data.message)
            }

            // alert(data);
            // if(data.location){
            //     var loc_load = data.location;
            //     window.location.href = loc_load;
            // }else{
            //     $('#s_a').load(location + ' #s_a_in');
            // }

        }
    });
}));

</script>


<!-- Validate input type file -->
<script>
var _validFileExtensions = [".pdf"];
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