    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$data_post['title']?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area" style="padding-top: 30px;">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">
                        <style>
                            .c_content div{
                                font-family: "Open Sans", sans-serif;
                                font-size:16px;
                                margin: 0;
                                padding: 0;
                                color: #636363;
                                line-height: 1.8;
                            }
                        </style>
                        <!-- Post Details Area -->
                        <div class="single-post-details-area">
                            <div class="post-thumbnail mb-30">
                                <img src="<?=base_url().'public/post_file/'.$data_post['image']?>" alt="">
                            </div>
                            <div class="post-content c_content">
                                <h2 class="post-title"><?=$data_post['title']?></h2>
                                <?=$data_post['content']?>
                            </div>
                        </div>

                        <!-- Post Tags & Share -->
                        <div class="post-tags-share d-flex justify-content-between align-items-center">
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                                <li>Tags:</li>
                                <li><a href="#">Pray,</a></li>
                                <li><a href="#">Hope,</a></li>
                                <li><a href="#">Church</a></li>
                            </ol>
                            <!-- Share -->
                            <div class="post-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Blog Sidebar Area -->
                <?php include('blog_sidebar_area.php') ?>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->