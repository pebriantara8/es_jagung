    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Warta</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <div class="events-area" style="padding-top: 30px;">
        <div class="container">
            <div class="row">

                <!-- Events Title -->
                <div class="col-12">
                    <div class="events-title">
                        <h2>Warta Jemaat</h2><hr>
                    </div>
                </div>

                <!-- Event Search Form -->
                <!-- <div class="col-12">
                    <div class="event-search-form mb-50">
                        <form action="#" method="get">
                            <div class="row align-items-end">
                                <div class="col-12 col-md">
                                    <div class="form-group mb-0">
                                        <label for="eventDate">Warta Bulan</label>
                                        <input type="date" class="form-control" id="eventDate" placeholder="Event In">
                                    </div>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="form-group mb-0">
                                        <label for="eventLocation">Tahun</label>
                                        <input type="text" class="form-control" id="eventLocation" placeholder="Location">
                                    </div>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="form-group mb-0">
                                        <label for="eventKeyword">Keyword</label>
                                        <input type="text" class="form-control" id="eventKeyword" placeholder="Typing Keyword">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-lg-2">
                                    <button type="submit" class="btn crose-btn">Cari Warta</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
                <?php foreach ($data_warta as $key => $value) { ?>
                <div class="col-12">
                    <!-- Single Upcoming Events Area -->
                    <div class="single-upcoming-events-area d-flex flex-wrap align-items-center">
                        <!-- Thumbnail -->
                        <div class="upcoming-events-thumbnail">
                            <img src="<?php echo base_url() ?>public/warta/img/<?=$value['image']?>" alt="">
                        </div>
                        <div class="upcoming-events-content d-flex flex-wrap align-items-center">
                            <div class="events-text">
                                <a href="<?=base_url()?>public/warta/<?=$value['file']?>"><h4><?=$value['title']?></h4></a>
                                <div class="events-meta">
                                    <a href="<?=base_url()?>public/warta/<?=$value['file']?>"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$value['date']?></a>
                                </div>
                            </div>
                            <div class="find-out-more-btn">
                                <a href="<?=base_url()?>public/warta/<?=$value['file']?>" class="btn crose-btn btn-2">Lihat/Download</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php } ?>

                <div class="col-12" style="padding-bottom: 30px; ">

                    <div class="pagination-area mt-70" style="padding-bottom: 30px;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php echo $this->pagination->create_links(); ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Events Area End ##### -->