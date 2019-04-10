                <div class="single-sidebar-widget post-category-widget">
                  <h4 class="category-title">Post Catgories</h4>
                  <ul class="cat-list">
<?php $data_pelayanan = $this->main_model->get_pelayanan(); ?>
<?php foreach ($data_pelayanan as $key => $value): ?>	
                    <li>
                      <a href="<?php echo base_url() ?>berita?category=<?php echo $value['id_pelayanan'] ?>" class="d-flex justify-content-between">
                        <p><?php echo $value['nama_pelayanan'] ?></p>
                        <p><?php echo $value['total_post']; ?></p>
                      </a>
                    </li>
<?php endforeach ?>                       
                  </ul>
                </div>  