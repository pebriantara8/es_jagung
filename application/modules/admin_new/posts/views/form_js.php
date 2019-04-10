<script>

$("#frm_ed_img").on('submit',(function(e) {
e.preventDefault();

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var dtt = new FormData(this);
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
      // $("#btn_save").css('display','none');
      // $("#btn_save_loading").css('display','block');
      // console.log(dtt);
    },
    success: function(data)   // A function to be called if request succeeds
    {
      var data = JSON.parse(data);
      if(data.success){
        location.reload();
      }else{
        show_alert('','warning_message',data.message)
        $('html, body').animate({
            scrollTop: $(".content-header").offset().top
        }, 1000);
      }
      // alert(data)
      // $("#btn_save").css('display','block');
      // $("#btn_save_loading").css('display','none');
      // var data = JSON.parse(data);
      // // alert(data);
      // if(data.location){
      //     var loc_load = data.location;
      //     // loc_load.reload();
      //     window.location.href = loc_load;
      // }else{
      //     $('#s_a').load(location + ' #s_a_in');
      // }
        // $('#loading').hide();
        // $("#message").html(data);
    }
    });
}));

function show_alert(tipe,id_attr,message) {
    var div = document.createElement('div');
    // div.className = 'row';
    div.innerHTML =
      '<div class="alert alert-warning alert-dismissible" id="alert_warning_message">'
      +'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
      +'<h4><i class="icon fa fa-warning"></i> Alert!</h4>'
      +'<span>'+message+'</span>'
      +'</div>';
    document.getElementById(id_attr).appendChild(div);
}

</script>


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