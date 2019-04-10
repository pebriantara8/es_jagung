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
        margin:0px 5px 5px 0px;
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
                <div class="col-lg-12">
                    <div class="row">
                    <?php
                        $files = glob("public/ckfinder_file/files/*.*", GLOB_BRACE);
                    ?>
                    <?php foreach ($files as $value): ?>
                        <div class="cov-g">
                            <div class="cov-img-g" style="background-image: url(<?php echo base_url().$value ?>);">
                                <!-- <img class="cov-img-g" src="<?php echo base_url().$value ?>" alt=""> -->
                            </div>
                            <a href="<?php echo base_url().$value ?>" target="_blank" title="">view</a> | 
                            <a href="<?php echo backend_url().$this->modul ?>/file_delete?file=<?php echo encrypt_url($value) ?>" title="">delete</a>
                            <p class="crop_text"><?php echo explode('/files/', $value)[1]; ?></p>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>