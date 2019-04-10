<style>
    .flex-g{
        display: flex;
        /*justify-content: space-around;*/
        /*justify-content: space-between;*/
    }
    .cov-g{
        background-color: black;
        width: 140px;
        height: 90px;
        margin:0px 5px 50px 0px;
    }
    @media only screen and (max-width: 768px){
        .cov-g{
            background-color: black;
            width: 125px;
            height: 90px;
            margin:0px 5px 5px 0px;
        }
    }
    .cov-img-g{
        position: relative;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center center;
    }

    .cov-g a{
        color: #0073aa;
    }
    .cov-g a:hover{
        color: #5b9dd9;
    }

    .crop_text{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>    
                <div class="row">
                    <div class="col-sm-12">
                        <?php require_once __DIR__."/../../blocks/alert_notification.php"; ?>
                    </div>
                </div>
                <!-- <div class="row"> -->
                    <div class="col-lg-12">
                        <div class="row">
                        <?php foreach ($list_file as $value): ?>
                            <?php 
                                $file_full = explode('/', $value);
                                $file_name = end($file_full);

                                // link before
                                $link = explode($file_name, $value);
                                $link = $link[0];
                            ?>
                            <div class="cov-g">
                                <div class="cov-img-g" style="background-image: url(<?php echo base_url().$value ?>);">
                                </div>
                                <a href="<?php echo base_url().$value ?>" target="_blank" title="">view</a> | 
                                <a id="delete_file" href="<?php echo backend_url().$this->modul ?>/file_delete?file=<?php echo encrypt_url($file_name) ?>&dir=<?php echo encrypt_url($link) ?>" title="">delete</a>
                                <!-- <a id="delete_file" href="<?php echo backend_url().$this->modul ?>/file_delete?file=<?php echo $file_name ?>&dir=<?php echo encrypt_url($link) ?>" title="">delete</a> -->
                                <p title="<?php echo $file_name ?>" class="crop_text"><?php echo $file_name ?></p>
                            </div>
                        <?php endforeach ?>
                        </div>
                    </div>
                <!-- </div> -->

<script>
  $('a#delete_file').confirm({
      title: 'Confirm?',
      content: 'Anda yakin akan menghapus file yang dipilih?',
      buttons: {
          confirm: function () {
              location.href = this.$target.attr('href');
          },
          cancel: function () {
          },
      }
  });
</script>