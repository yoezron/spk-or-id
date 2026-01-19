<!--==============================
Contact Area  
==============================-->
<div class="space" id="contact-sec">
    <div class="container">
        <div class="map-sec">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6011.513796175673!2d106.82935574526897!3d-6.2478572731966375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3c559dba411%3A0x6ebd26c94e7726d7!2sJl.%20D%20No.21%2C%20RT.3%2FRW.2%2C%20Tegal%20Parang%2C%20Kec.%20Mampang%20Prpt.%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012790!5e0!3m2!1sid!2sid!4v1742113193523!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5 mb-30 mb-xl-0">
                <div class="me-xxl-5 mt-60">
                    <div class="title-area mb-25">
                        <h2 class="border-title h3">Berkontak dengan Kami!</h2>
                    </div>
                    <p class="mt-n2 mb-25">Butuh berhubungan dan berkonsultasi dengan kami? <br> Silakan mengisi form pengaduan atau hubungi kami secara langsung.</p>
                    <div class="contact-feature">
                        <div class="contact-feature-icon">
                            <i class="fal fa-location-dot"></i>
                        </div>
                        <div class="media-body">
                            <p class="contact-feature_label">Alamat Kami</p>
                            <a href="https://maps.app.goo.gl/4GVtpfsHnNSSAMGSA" target="_blank" class="contact-feature_link">Jl. D No.21, RT.3/RW.2, Tegal Parang, Kec. Mampang Prpt., Kota Jakarta Selatan,<br> Daerah Khusus Ibukota Jakarta 12790</a>
                        </div>
                    </div>
                    <div class="contact-feature">
                        <div class="contact-feature-icon">
                            <i class="fal fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <p class="contact-feature_label">Kontak</p>
                            <!--<a href="https://api.whatsapp.com/send?phone=6287819531788&text=Salam%20perjuangan!" target="_blank" class="contact-feature_link">WhatsApp:<span>+62-8781-9531-788</span></a>-->
                            <a href="mailto:sekretariat@spk.or.id" target="_blank" class="contact-feature_link">Email:<span>sekretariat@spk.or.id</span></a>

                        </div>
                    </div>
                    <div class="contact-feature">
                        <div class="contact-feature-icon">
                            <i class="fal fa-clock"></i>
                        </div>
                        <div class="media-body">
                            <p class="contact-feature_label">Jam Kerja</p>
                            <span class="contact-feature_link">Senin - Jum'at: 09:00 - 20:00</span>
                            <span class="contact-feature_link">Sabtu & Minggu: 10:30 - 22:00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="contact-form-wrap" data-bg-src="assets/img/bg/contact_bg_1.png">
                    <span class="sub-title">Sampaikan pesan anda!</span>
                    <h2 class="border-title">Form Kontak dan Pengaduan</h2>
                    <p class="mt-n1 mb-30 sec-text">Form ini dapat digunakan untuk menyampaikan pengaduan, berkonsultasi, menyampaikan kritik dan saran juga untuk keperluan kontak secara resmi.</p>
                    <form action="<?= base_url('welcome/kirim_pengaduan'); ?>" method="POST" class="contact-form ajax-contact">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control style-white" name="name" id="name" placeholder="Nama lengkap anda*">
                                    <i class="fal fa-user"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control style-white" name="email" id="email" placeholder="Alamat email yang valid*">
                                    <i class="fal fa-envelope"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="subject" id="subject" class="single-select nice-select form-select style-white">
                                        <option value="" disabled selected hidden>Perihal*</option>
                                        <option value="Pengaduan">Pengaduan</option>
                                        <option value="Permohonan">Permohonan</option>
                                        <option value="Kritik dan Saran">Kritik dan Saran</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" class="form-control style-white" name="number" id="number" placeholder="Nomor HP/Whatsapp Aktif*" pattern="^[1-9][0-9]*$" required>
                                    <i class="fal fa-phone"></i>
                                    <small class="form-text text-muted">Mulai dengan angka kode negara, mis: 62xxx</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group ">
                                    <textarea name="message" id="message" cols="30" rows="3" class="form-control style-white" placeholder="Sampaikan pesan anda*"></textarea>
                                    <i class="fal fa-pen"></i>
                                </div>

                            </div>
                            <div class="form-btn col-12 mt-10">
                                <button class="th-btn">Kirim Pesan<i class="fas fa-long-arrow-right ms-2"></i></button>
                            </div>
                            <small><i>mohon reload setelah mengirim pesan</i></small>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                    <br>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>