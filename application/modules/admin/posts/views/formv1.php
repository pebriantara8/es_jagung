<script src="<?php echo base_url() ?>assets/main/ckeditor/ckeditor.js"></script> 
<script src="<?php echo base_url() ?>assets/ckfinder/ckfinder.js"></script>

                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-title">
                                <h4>Judul</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-flat" placeholder="Tulis judul disini.. ">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-title">
                                <!-- <h4>Content</h4> -->
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <!-- <textarea id="editor" name="content"></textarea> -->
                                            <textarea name="content"></textarea>
                                        </div>
                                    </form>
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
                                    <form>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Upload gambar utama disini.</p>
                                            <span id="preview"></span>
                                            <!-- <input id="file_input" type="file" name="file"> -->
                            <img id="file_preview" src="#" alt="" width="100%" />
                            <input type="file" name="file" id="file_input" onchange="ValidateSingleInput(this);" required="">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-title">
                                <h4>Simpan</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">Use the classes on an <code>input-group</code>, <code>input-group-btn</code> for Default input group.</p>
                                            <button type="" class="btn btn-primary btn-boundered">Simpan</button>
                                            <button type="" class="btn btn-default btn-boundered">Simpan ke draft</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>


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
        extraPlugins: 'autogrow',
        autoGrow_minHeight: '200',
        // autoGrow_maxHeight: '600',
        // autoGrow_bottomSpace: '50'
    } );
</script>