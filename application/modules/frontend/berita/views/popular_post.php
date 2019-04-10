                <div class="single-sidebar-widget popular-post-widget">
                  <h4 class="popular-title">Popular Posts</h4>
                  <div class="popular-post-list">
<?php $data_post_popular = $this->main_model->get_post_popular(); ?>
<?php foreach ($data_post_popular as $key => $value): ?>	
                    <div class="single-post-list d-flex flex-row align-items-center">
                      <div class="thumb">
                      	<div class="cover_image" style="background-image: url(<?php echo base_url() ?>public/post_file/<?php echo $value['image'] ?>);height: 50px; width: 80px;">
                      		
                      	</div>
                        <!-- <img class="img-fluid" src="<?php echo base_url() ?>assets/img/blog/pp1.jpg" alt=""> -->
                        <!-- <img class="img-fluid" src="<?php echo base_url() ?>public/post_file/<?php echo $value['image'] ?>" alt=""> -->
                      </div>
                      <div class="details text_el">
                        <a href="<?php echo base_url().$this->modul ?>/<?php echo set_permalink($value['title'],$value['id_post']) ?>"><h6 class="text_el"><?php echo $value['title'] ?></h6></a>
                        <p><?php echo date("d/m/Y",strtotime($value['date'])) ?></p>
                      </div>
                    </div>
<?php endforeach ?>

<!--                     <div class="single-post-list d-flex flex-row align-items-center">
                      <div class="thumb">
                        <img class="img-fluid" src="<?php echo base_url() ?>assets/img/blog/pp2.jpg" alt="">
                      </div>
                      <div class="details">
                        <a href="blog-single.html"><h6>The Amazing Hubble</h6></a>
                        <p>02 Hours ago</p>
                      </div>
                    </div>
                    <div class="single-post-list d-flex flex-row align-items-center">
                      <div class="thumb">
                        <img class="img-fluid" src="<?php echo base_url() ?>assets/img/blog/pp3.jpg" alt="">
                      </div>
                      <div class="details">
                        <a href="blog-single.html"><h6>Astronomy Or Astrology</h6></a>
                        <p>02 Hours ago</p>
                      </div>
                    </div>
                    <div class="single-post-list d-flex flex-row align-items-center">
                      <div class="thumb">
                        <img class="img-fluid" src="<?php echo base_url() ?>assets/img/blog/pp4.jpg" alt="">
                      </div>
                      <div class="details">
                        <a href="blog-single.html"><h6>Asteroids telescope</h6></a>
                        <p>02 Hours ago</p>
                      </div>
                    </div>     -->                          
                  </div>
                </div>