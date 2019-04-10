                <!-- Sidebar Area -->
                <div class="col-12 col-lg-3">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <div class="search-form">
                                <form action="#" method="get">
                                    <input type="search" name="search" placeholder="Search Here">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <!-- <div class="widget-title">
                                <h6>Categories</h6>
                            </div>
                            <ol class="crose-catagories">
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Religion</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Hope</a></li>
                            </ol> -->
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h6>Recent News</h6>
                            </div>

                            <!-- Single Latest Posts -->
                            <?php foreach ($recent_post as $keyvrp => $vrp) { ?>
                            <div class="single-latest-post">
                                <a href="#" class="post-title">
                                    <h6><?=$vrp['title']?></h6>
                                </a>
                                <p class="post-date"><?=$vrp['date']?></p>
                            </div>
                            <?php } ?>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <!-- <div class="single-widget-area">
                            <div class="widget-title">
                                <h6>Archives</h6>
                            </div>
                            <ol class="crose-archives">
                                <li><a href="#">July 2015</a></li>
                                <li><a href="#">March 2015</a></li>
                            </ol>
                        </div> -->

                    </div>
                </div>