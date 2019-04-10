    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Google Maps Start ##### -->
    <div class="map-area mt-30">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31624.741209988886!2d110.42902743457013!3d-7.780000532488515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5a0daf1702c3%3A0x8e6dbc518256f59e!2sGKI+Adisucipto!5e0!3m2!1sen!2sid!4v1541137734322" allowfullscreen></iframe>
    </div>
    <!-- ##### Google Maps End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-content-area">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="contact-content contact-information">
                                    <h4>Kontak</h4>
                                    <p><?php echo $this->main_model->get_content_setting('email'); ?></p>
                                    <p><?php echo $this->main_model->get_content_setting('no_telepon'); ?></p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="contact-content contact-information">
                                    <h4>Alamat</h4>
                                    <p>Jalan Solo KM 10,5 Kalasan</p>
                                    <p>Yogyakarta, Indonesia</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="contact-content contact-information">
                                    <h4>Jam Buka</h4>
                                    <p>Sen-Sab: 10 Am to 6 Pm</p>
                                    <p>Minggu: Close</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Contact Form Area Start ##### -->
    <div class="contact-form section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Tinggalkan Pesan</h2>
                        <p>Email Anda tidak akan di publish, mohon diisi form yang dibutuhkan</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="contact-name">Full Name*:</label>
                                        <input type="text" class="form-control" id="contact-name" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="contact-email">Email*:</label>
                                        <input type="email" class="form-control" id="contact-email" placeholder="gkiadisucipto@gmail.com">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="contact-number">Phone*:</label>
                                        <input type="text" class="form-control" id="contact-number" placeholder="08xxxxxxxxx">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Message*:</label>
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn crose-btn mt-15">Kirim Sekarang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Form Area End ##### -->