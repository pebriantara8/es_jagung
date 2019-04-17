<script>
$("#form-kdans").on('submit',(function(e) {
e.preventDefault();

    var dtt = new FormData(this);

    $.ajax({
	    url: $(this).attr('action'),
	    type: "POST",
	    data: new FormData(this),
	    contentType: false,
	    cache: false,
	    processData:false,
	    beforeSend: function() {
			$("#btn-submit-kdans").css('display','none');
			$("#loading-submit-kdans").css('display','block');
			console.log(dtt);
	    },
	    success: function(data)
	    {
	    	var data=JSON.parse(data)
	    	if(data.success){
	    		document.getElementById('form-kdans').reset();
	      		$("#loading-submit-kdans").html(data.success);
	    	}else{
	    		$("#loading-submit-kdans").html(data.error);
	    	}
	    }
    });
}));

function diagnosa(){
	window.location.href = '<?=base_url()?>diagnosa/start';
}

</script>