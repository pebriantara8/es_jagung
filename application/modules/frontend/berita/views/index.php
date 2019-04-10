    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <style>
        .c_post_content{
            max-height:45px;
            overflow-y: hidden;
        }
        .c_post_content p{
            font-family: "Open Sans", sans-serif;
            font-size: 14px;
            --font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
--font-family-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
        }
        .c_post_content div{
            ffont-family: "Open Sans", sans-serif;
            font-size: 14px;
            --font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
--font-family-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
        }
    </style>
    <div class="blog-area" style="padding-top: 30px;">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Blog Post Area -->
                <div class="col-12 col-lg-8">
                    <div class="row">

                        <?php foreach ($list_posts as $key => $vp) { ?>
                        <!-- Single Blog Post Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post mb-50">
                                <div class="post-thumbnail">
                                    <a href="<?=base_url()?>berita/read/<?=$vp['id_post']?>"><img src="<?php echo base_url() ?>public/post_file/thumb/thumb_<?=$vp['image']?>" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <a href="<?=base_url()?>berita/read/<?=$vp['id_post']?>" class="post-title">
                                        <h4><?=$vp['title']?></h4>
                                    </a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?=$vp['name']?></a>
                                        <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$vp['date']?></a>
                                    </div>
                                    <div class="post-excerpt c_post_content"><?=$vp['content']?></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>

                    <div class="pagination-area" style="padding-bottom: 30px;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php echo $this->pagination->create_links(); ?>
                            </ul>
                        </nav>
                    </div>
                </div>

                <?php include('blog_sidebar_area.php') ?>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->