      <!-- Start blog Area -->
      <section class="blog-area section-gap" id="blog">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="menu-content pb-30 col-lg-8">
              <div class="title text-center">
                <h1 class="mb-10">Warta Jemaat</h1>
                <p>Daftar warta jemaat</p>
              </div>
            </div>
          </div>          
          <div class="row">

<?php foreach ($list_posts as $key => $value): ?>
            <div class="col-lg-3 col-md-6 single-blog" style="margin-bottom: 15px;">
              <a href="#">
                <div class="thumb">
                  <div class="img-fluid blog-home-banner2" style="height: 180px;background-image: url(<?php echo base_url().'public/post_file/'.$value['image'] ?>);">
                  </div>
                </div>
              </a>
                <p class="meta" style="margin-bottom: 0px;"><?php echo date("d/m/Y", strtotime($value['date'])) ?>  |  <?php echo $value['name'] ?></p>
              <a href="<?php echo base_url() ?>berita/<?php echo set_permalink($value['title'],$value['id_post']) ?>">
                <h5 title="<?php echo set_permalink($value['title'],$value['id_post']) ?>" class="text_ellipsis"><?php echo $value['title'] ?></h5>
              </a>
            </div>
<?php endforeach ?>

          </div>
          <div class="row">
            <div style="margin:20px auto;">
              <a href="<?php echo base_url() ?>berita" class="genric-btn primary circle arrow" title="Tampilkan semua" >Tampilkan semua</a>
            </div>
          </div>
        </div>
      </section>
      <!-- End blog Area -->


      <!-- Start blog Area -->
      <section class="blog-area section-gap" id="blog">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="menu-content pb-30 col-lg-8">
              <div class="title text-center">
                <h1 class="mb-10">Kegiatan Terbaru</h1>
                <p>Temukan kegiatan-kegiatan harian gereja GKI Adisucipto terbaru disini...</p>
              </div>
            </div>
          </div>          
          <div class="row">

<?php foreach ($list_posts as $key => $value): ?>
            <div class="col-lg-3 col-md-6 single-blog" style="margin-bottom: 15px;">
              <a href="#">
                <div class="thumb">
                  <div class="img-fluid blog-home-banner2" style="height: 180px;background-image: url(<?php echo base_url().'public/post_file/'.$value['image'] ?>);">
                  </div>
                </div>
              </a>
                <p class="meta" style="margin-bottom: 0px;"><?php echo date("d/m/Y", strtotime($value['date'])) ?>  |  <?php echo $value['name'] ?></p>
              <a href="<?php echo base_url() ?>berita/<?php echo set_permalink($value['title'],$value['id_post']) ?>">
                <h5 title="<?php echo set_permalink($value['title'],$value['id_post']) ?>" class="text_ellipsis"><?php echo $value['title'] ?></h5>
              </a>
            </div>
<?php endforeach ?>

          </div>
          <div class="row">
            <div style="margin:20px auto;">
              <a href="<?php echo base_url() ?>berita" class="genric-btn primary circle arrow" title="Tampilkan semua" >Tampilkan semua</a>
            </div>
          </div>
        </div>
      </section>
      <!-- End blog Area -->