<!--==============================
Header Area
==============================-->
<header class="th-header header-layout6">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-md-between align-items-center gy-2">
                <div class="col-auto d-none d-md-block">
                    <div class="header-links">
                        <ul>
                            <!--<li><i class="far fa-phone"></i><a href="https://api.whatsapp.com/send?phone=6287819531788&text=Salam%20perjuangan!">+62 8781 9531 788</a></li>-->
                            <li class="d-none d-xl-inline-block"><i class="far fa-location-dot"></i>Jakarta, Indonesia</li>
                            <li><i class="far fa-envelope"></i><a href="mailto:sekretariat@spk.or.id">sekretariat@spk.or.id</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-lg-inline-block">
                                <div class="dropdown-link">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-user"> </i>Keanggotaan</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li>
                                            <a href="<?= base_url('auth'); ?>">Masuk</a>
                                            <a href="<?= base_url('register'); ?>">Mendaftar</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="header-social">
                                    <span class="social-title">Ikuti Kami:</span>
                                    <a href="https://www.facebook.com/pekerjakampus"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.twitter.com/pekerjakampus"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.youtube.com/@SerikatPekerjaKampus"><i class="fab fa-youtube"></i></i></a>
                                    <a href="https://www.linkedin.com/company/serikat-pekerja-kampus/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/serikatpekerjakampus"><i class="fab fa-instagram"></i></a>
                                    <a href="<?= base_url('auth'); ?>"><i class="fas fa-door-open"> Log In</i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="sticky-active">
            <!-- Main Menu Area -->
            <div class="menu-area" data-bg-src="<?= base_url('assets'); ?>/img/update1/bg/pattern_bg_2.png">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="<?= base_url('/'); ?>"><img src="<?= base_url('assets'); ?>/img/logos.svg" alt="SPK" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <nav class="main-menu d-none d-lg-inline-block">
                                        <ul>
                                            <li class="menu-item">
                                                <a href="<?= base_url('/'); ?>">Beranda</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="<?= base_url('about'); ?>">Tentang Kami</a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?= base_url('sejarah'); ?>">Sejarah</a></li>
                                                    <li><a href="<?= base_url('manifesto'); ?>">Manifesto</a></li>
                                                    <li><a href="<?= base_url('visimisi'); ?>">Visi dan Misi</a></li>
                                                    <li><a href="<?= base_url('adart'); ?>">AD/ART</a></li>
                                                    <!--<li><a href="<?= base_url('pengurus'); ?>">Pengurus</a></li>-->
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Dokumen</a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?= base_url('publikasi'); ?>">Publikasi</a></li>
                                                    <li><a href="<?= base_url('regulasi'); ?>">Regulasi</a></li>
                                                </ul>
                                            </li>
                                            <!-- <li class="menu-item-has-children">
                                                <a href="#">Laman</a>
                                                <ul class="sub-menu">
                                                    <li><a href="about.html">Kegiatan</a></li>
                                                    <li class="menu-item-has-children">
                                                        <a href="#">Shop</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="shop.html">Shop</a></li>
                                                            <li><a href="shop-details.html">Shop Details</a></li>
                                                            <li><a href="cart.html">Cart Page</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="event.html">Galeri</a></li>
                                                    <li><a href="event-details.html">Event Details</a></li>
                                                    <li><a href="gallery.html">Gallery</a></li>
                                                    <li><a href="error.html">Error Page</a></li>
                                                </ul>
                                            </li> -->
                                            <li class="menu-item-has-children">
                                                <a href="#">Berita</a>
                                                <ul class="sub-menu">
                                                    <li><a href="<?= base_url('post'); ?>">Berita SPK</a></li>
                                                    <li><a href="https://www.google.com/search?q=Serikat+Pekerja+Kampus&sca_esv=5422c522b7433249&sca_upv=1&biw=1707&bih=862&tbm=nws&sxsrf=ADLYWIJ-VEiDby8I1MDoUUVKZh20cj7Kjw%3A1726854622265&ei=3rXtZr36D-mVseMPqMXA8AM&ved=0ahUKEwi94driitKIAxXpSmwGHagiED4Q4dUDCA0&oq=Serikat+Pekerja+Kampus&gs_lp=Egxnd3Mtd2l6LW5ld3MiFlNlcmlrYXQgUGVrZXJqYSBLYW1wdXMyBRAAGIAEMggQABiABBiiBDIIEAAYgAQYogQyCBAAGIAEGKIEMggQABiABBiiBEiqRFAAWABwAXgAkAEAmAFUoAFUqgEBMbgBDMgBAJgCAqACX5gDAIgGAZIHATKgB7QD&sclient=gws-wiz-news" target="_blank">Publikasi Luar</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('contact'); ?>">Kontak</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                                </div>
                                <div class="col-auto d-none d-xl-block">
                                    <div class="header-button">
                                        <button type="button" class="simple-icon me-3 searchBoxToggler"><i class="far fa-search"></i></button>
                                        <a href="<?= base_url('register'); ?>" class="th-btn style3">Bergabung<i class="fas fa-arrow-right ms-2"></i></a>
                                        <a href="#" class="simple-icon style2 ms-3 sideMenuToggler"><i class="fa-sharp fa-solid fa-grid"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-shape"></div>
            </div>
        </div>
    </div>
</header>