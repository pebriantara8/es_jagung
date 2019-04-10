<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>GKI Adisucipto - Official Website</title>
    <meta name="Description" content="Situs Resmi Gereja Kristen Indonesia Adisucipto, Jadwal Ibadah Minggu Pukul 09.00, website ini dikelola oleh tim website GKI Adisucipto">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url() ?>public/logo/logo-gki-warna.svg">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/new1/style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <!-- <div class="preloader d-flex align-items-center justify-content-center"> -->
        <!-- Line -->
        <!-- <div class="line-preloader"></div> -->
    <!-- </div> -->

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->

        <!-- ***** Top Header Area ***** -->

        <!-- ***** Navbar Area ***** -->
        <div class="crose-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="croseNav" style="height:70px;">

                        <!-- Nav brand -->
                        <!-- <a href="<?php echo base_url() ?>" class="nav-brand"><img style="height: 34px;" src="<?php echo base_url() ?>public/logo/logo-gki-dan-text-warna.svg" alt=""></a> -->
                        <a href="<?php echo base_url() ?>" class=""><img style="height: 34px;" src="<?php echo base_url() ?>public/logo/logo-gki-dan-text-warna.svg" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                                    <li><a href="<?php echo base_url('warta') ?>">Warta</a></li>
                                    <!-- <li><a href="<?php echo base_url() ?>warta">Warta</a></li> -->
<!--                                     <li><a href="javascript:void(0)">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                                            <li><a href="<?php echo base_url() ?>about">About</a></li>
                                            <li><a href="<?php echo base_url() ?>assets/new1/sermons.html">Sermons</a></li>
                                            <li><a href="<?php echo base_url() ?>assets/new1/sermons-details.html">Sermons Details</a></li>
                                            <li><a href="<?php echo base_url() ?>assets/new1/events.html">Events</a></li>
                                            <li><a href="<?php echo base_url() ?>assets/new1/blog.html">Blog</a></li>
                                            <li><a href="<?php echo base_url() ?>assets/new1/single-post.html">Blog Details</a></li>
                                            <li><a href="<?php echo base_url() ?>assets/new1/contact.html">Contact</a></li>
                                        </ul>
                                    </li> -->
                                    <li><a href="<?php echo base_url() ?>berita">Artikel</a></li>
                                    <li><a href="<?php echo base_url() ?>about">Tentang</a></li>
                                    <li><a href="<?php echo base_url() ?>kontak">Kontak</a></li>
                                </ul>

                                <!-- Search Button -->
                                <div id="header-search"><i class="fa fa-search" aria-hidden="true"></i></div>

                                <!-- Donate Button -->
                                <!-- <a href="javascript:void(0)" class="btn crose-btn header-btn">Donasi</a> -->

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>

            <!-- ***** Search Form Area ***** -->
            <div class="search-form-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="searchForm">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Masukkan keywords &amp; tekan enter...">
                                    <button type="submit" class="d-none"></button>
                                </form>
                                <div class="close-icon" id="searchCloseIcon"><i class="fa fa-close" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Navbar Area ***** -->
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- Content Start -->
    <?php if($content) $this->load->view($content); ?>
    <!-- Content End -->

    <!-- ##### Subscribe Area Start ##### -->
    <section class="subscribe-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Subscribe Text -->
                <div class="col-12 col-lg-6">
                    <div class="subscribe-text">
                        <h3>Subscribe To Our Newsletter</h3>
                        <h6>Subscribe Kami dan Beritahu Tentang Kisah Anda</h6>
                    </div>
                </div>
                <!-- Subscribe Form -->
                <div class="col-12 col-lg-6">
                    <div class="subscribe-form text-right">
                        <form action="#">
                            <input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Your Email">
                            <button type="submit" class="btn crose-btn">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Subscribe Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70">
                            <a href="javascript:void(0)" class="footer-logo"><img style="height: 40px;" src="<?php echo base_url() ?>public/logo/logo-gki-dan-text-warna.svg" alt=""></a>
                            <p><?php echo $this->main_model->get_content_setting('sekilas_tentang_kami'); ?></p>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70">
                            <h5 class="widget-title">Quick Link</h5>
                            <nav class="footer-menu">
                                <ul>
                                    <li><a href="<?=base_url()?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Home</a></li>
                                    <li><a href="<?=base_url('warta')?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Warta</a></li>
                                    <li><a href="<?=base_url('berita')?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Artikel</a></li>
                                    <li><a href="<?=base_url('about')?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Tentang</a></li>
                                    <li><a href="<?=base_url('kontak')?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70">
                            <h5 class="widget-title">Artikel Terbaru</h5>

                            <?php foreach ($f_list_posts as $key => $vvp) { ?>
                                <!-- Single Latest News -->
                                <div class="single-latest-news">
                                    <a href="<?=base_url()?>berita/read/<?=$vvp['id_post']?>"><?=$vvp['title']?></a>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i><?=$vvp['date']?></p>
                                </div>
                            <?php } ?>

                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget mb-70">
                            <h5 class="widget-title">Kontak</h5>

                            <div class="contact-information">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> Jalan Solo, Kalasan, Yogyakarta</p>
                                <a href="<?php echo base_url() ?>assets/new1/callto:001-1234-88888"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $this->main_model->get_content_setting('no_telepon'); ?></a>
                                <a href="javascript:void(0)"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $this->main_model->get_content_setting('email'); ?></a>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> Setiap Hari: 08.00am - 18.00pm</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Copwrite Area -->
        <div class="copywrite-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center flex-wrap">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tim Bidang 4 GKI Adisucipto | Template by <a href="<?php echo base_url() ?>assets/new1/https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>

                    <!-- Footer Social Icon -->
                    <div class="col-12 col-md-6">
                        <div class="footer-social-icon">
                            <a href="https://www.facebook.com/pages/GKI-Adisucipto-Yogyakarta/263124707862590"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <!-- <a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo base_url() ?>assets/new1/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url() ?>assets/new1/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url() ?>assets/new1/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url() ?>assets/new1/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url() ?>assets/new1/js/active.js"></script>
    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cab362c53f1e453fb8cb3e3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>