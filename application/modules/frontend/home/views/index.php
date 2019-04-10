    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area hero-post-slides owl-carousel">

        <?php foreach ($slider_home as $ksh => $vsh): ?>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url() ?>public/slider_home/<?php echo $vsh['image'] ?>);">
            <!-- Post Content -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms"><?php echo $vsh['title'] ?></h2>
                            <p data-animation="fadeInUp" data-delay="300ms"><?php echo $vsh['deskripsi'] ?></p>
                            <a href="<?=base_url()?>jadwal/ibadah" class="btn crose-btn" data-animation="fadeInUp" data-delay="500ms">Jadwal Ibadah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>

    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Artikel Terbaru</h2>
                        <p>Informasi Terbaru tentang agama, gereja, politik di sekitar kita.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <?php foreach ($list_posts as $keylp => $valuelp): ?>
                    
                <!-- Single Blog Post Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-blog-post mb-100">
                        <div class="post-thumbnail">
                            <a href="<?php echo base_url().'berita/read/'.$valuelp['id_post'] ?>"><img src="<?php echo base_url() ?>public/post_file/thumb/thumb_<?php echo $valuelp['image'] ?>" alt=""></a>
                        </div>
                        <div class="post-content">
                            <a href="<?php echo base_url().'berita/read/'.$valuelp['id_post'] ?>" class="post-title">
                                <h4><?php echo $valuelp['title'] ?></h4>
                            </a>
                            <div class="post-meta d-flex">
                                <a href="<?php echo base_url().'berita/read/'.$valuelp['id_post'] ?>"><i class="fa fa-calendar" aria-hidden="true"></i> April 23, 2018</a>
                                <a href="javascript:void(0)"><?=$valuelp['name']?></a>
                            </div>
                            <!-- <p class="post-excerpt">The priest, who was also the diocesan judicial vicar, was accosted by the assailant and was involved in a discussion.</p> -->
                        </div>
                    </div>
                </div>
                <?php endforeach ?>

                <a href="<?= base_url() ?>berita" style="margin-top:-50px; margin-bottom:50px;" class="btn crose-btn" >Lihat Artikel Lainnya</a>

            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Call To Action Area Start ##### -->
        <section class="call-to-action-area section-padding-100 bg-img bg-overlay" style="background-image: url(<?php echo base_url() ?>assets/new1/img/bg-img/2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call-to-action-content text-center">
                        <h6>Sebuah Tempat Untuk Anda</h6>
                        <h2>Temukan tempat untuk terhubung dan berkembang melalui kelompok kecil, kelas, atau pertemuan rutin.</h2>
                        <!-- <a href="javascript:void(0)" class="btn crose-btn btn-2">Daftar Anggota</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Apa yang Anda cari</h2>
                        <p>Sebuah gereja bukanlah bangunan - melainkan orang-orangnya.</p>
                    </div>
                </div>
            </div>

            <div class="row about-content justify-content-center text-center">
                <!-- Single About Us Content -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="about-us-content mb-100">
                        <img src="<?php echo base_url() ?>public/others/warta_jemaat_image.jpg" alt="">
                        <div class="about-text">
                            <h4>Warta Jemaat Terbaru</h4>
                            <p>Downlaod warta terbaru dengan menekan tombol download dibawah ini.</p>
                            <a href="<?php echo base_url() ?>warta">Download <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single About Us Content -->
                <!-- <div class="col-12 col-md-6 col-lg-3">
                    <div class="about-us-content mb-100">
                        <img src="<?php echo base_url() ?>assets/new1/img/bg-img/4.jpg" alt="">
                        <div class="about-text">
                            <h4>Jadwal Ibadah</h4>
                            <p>Silahkan klik link dibawah untuk melihat jadwal ibadah pada GKI Adisucipto.</p>
                            <a href="javascript:void(0)">Read More <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Gallery Area Start ##### -->
    <div class="gallery-area d-flex flex-wrap">

        <?foreach ($gallery as $gkey => $gvalue) { ?>
        <!-- Single Gallery Area -->
        <div class="single-gallery-area">
            <a href="<?php echo base_url() ?>public/gallery/<?=$gvalue['image']?>" class="gallery-img" title="<?=$gvalue['title']?>">
                <img src="<?php echo base_url() ?>public/gallery/thumb/thumb_<?=$gvalue['image']?>" alt="">
            </a>
        </div>
        <?}?>


    </div>
    <!-- ##### Gallery Area End ##### -->