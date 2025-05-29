<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SPK - <?= $post['judul_tulisan']; ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:image" content="<?= base_url('assets/img/posting/' . $post['gambar']); ?>">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/logo/favicon.png') ?>" />

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/custom-animation.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/slick.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/flaticon.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/nice-select.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/flaticon.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/swiper-bundle.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/meanmenu.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome-pro.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/magnific-popup.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/spacing.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
</head>

<body>
   
    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

    <!-- back-to-top-start  -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="far fa-angle-double-up"></i>
    </button>
    <!-- back-to-top-end  -->

    <!-- search popup start -->
    <div class="search__popup">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="search__wrapper">
                        <div class="search__top d-flex justify-content-between align-items-center">
                            <div class="search__logo">
                                <a href="https://spk.or.id/">
                                    <img src="<?= base_url('assets/img/logo/footer-1.png') ?>" alt="" />
                                </a>
                            </div>
                            <div class="search__close">
                                <button type="button" class="search__close-btn search-close-btn">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="search__form">
                            <form action="#">
                                <div class="search__input">
                                    <input class="search-input-field" type="text" placeholder="Type here to search..." />
                                    <span class="search-focus-border"></span>
                                    <button type="submit">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- search popup end -->

    <!-- tp-offcanvus-area-start -->
    <div class="tpoffcanvas-area">
        <div class="tpoffcanvas">
            <div class="tpoffcanvas__close-btn">
                <button class="close-btn"><i class="fal fa-times"></i></button>
            </div>
            <div class="tpoffcanvas__logo">
                <a href="https://spk.or.id/">
                    <img src="<?= base_url('assets/img/logo/footer-1.png')  ?>" alt="" />
                </a>
            </div>
            <div class="tpoffcanvas__title">
                <p>Serikat Pekerja Kampus.
                    Serikat pekerja yang mewadahi pekerja di bidang/sektor pendidikan tinggi.</p>
            </div>
            <div class="tp-main-menu-mobile d-xl-none"></div>
            <div class="tpoffcanvas__contact-info">
                <div class="tpoffcanvas__contact-title">
                    <h5>Kontak Kami</h5>
                </div>
                <ul>
                    <li>
                        <i class="fa-light fa-location-dot"></i>
                        <a href="https://maps.app.goo.gl/i9bTXZKxVJa8NKft9" target="_blank">Malang, Indonesia.</a>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:serikatpekerjakampus@gmail.com">serikatpekerjakampus@gmail.com</a>
                    </li>
                    <li>
                        <i class="fal fa-phone-alt"></i>
                        <a href="https://api.whatsapp.com/send?phone=6287819531788&text=Salam%20perjuangan!">+6287819531788</a>
                    </li>
                </ul>
            </div>
            <div class="tpoffcanvas__input">
                <div class="tpoffcanvas__input-title">
                    <h4>Dapatkan Pembaruan</h4>
                </div>
                <form action="mailto:serikatpekerjakampus@gmail.com">
                    <div class="p-relative">
                        <input type="text" placeholder="Masukkan Email" />
                        <button>
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="tpoffcanvas__social">
                <div class="social-icon">
                    <a href="https://twitter.com/pekerjakampus"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/serikatpekerjakampus/"><i class="fab fa-instagram"></i></a>
                    <a href="http://facebook.com/serikatpekerjakampus"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- tp-offcanvus-area-end -->

    <header class="tp-header-height">
        <div id="header-sticky" class="tp-header__left-wrap p-relative">
            <div class="tp-header__logo">
                <a href="https://spk.or.id/"><img src="<?= base_url('assets/img/logo/logo.png') ?>" alt="" /></a>
            </div>
            <div class="tp-header__right-wrap tp-header__plr">
                <!-- header-top-area-start -->
                <div class="tp-header-top__area tp-header-top__hide tp-header-top__space theme-bg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xxl-6 col-xl-5 col-lg-7 col-md-8">
                                <div class="tp-header-top__left-box">
                                    <ul>
                                        <li><span>Serikat Pekerja Kampus</span></li>
                                        <li>
                                            <div class="tp-header-top__social">
                                                <a href="http://facebook.com/serikatpekerjakampus"><i class="fab fa-facebook-f"></i></a>
                                                <a href="https://www.instagram.com/serikatpekerjakampus/"><i class="fab fa-instagram"></i></a>
                                                <a href="https://twitter.com/pekerjakampus"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-tiktok"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-7 col-lg-5 col-md-4">
                                <div class="tp-header-top__right-box text-end">
                                    <ul>
                                        <li class="location">
                                            <i class="fa-solid fa-location-dot"></i><a target="_blank" href="https://maps.app.goo.gl/i9bTXZKxVJa8NKft9">Malang, INA</a>
                                        </li>
                                        <li><i class="fa-solid fa-envelope"></i><a href="mailto:serikatpekerjakampus@gmail.com">serikatpekerjakampus@gmail.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-top-area-end -->

                <!-- header-area-start -->
                <div class="tp-header__area tp-header__space">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-xxl-6 col-xl-8 col-lg-8 d-none d-lg-block">
                                <div class="tp-header__main-menu">
                                    <nav class="tp-main-menu-content">
                                        <ul>
                                            <li class="has-dropdown">
                                                <a href="http://spk.or.id/index.html">Beranda</a>
                                            </li>
                                            <li class="has-dropdown">
                                                <a href="#">Tentang Kami</a>
                                                <ul class="submenu tp-submenu">
                                                    <li><a href="http://spk.or.id/about-us.html">Struktur</a></li>
                                                    <li><a href="http://spk.or.id/spk-login/auth">Sejarah</a></li>
                                                    <li><a href="http://spk.or.id/spk-login/auth">Login</a></li>
                                                    <li><a href="http://spk.or.id/spk-login/auth/registration">Registrasi Anggota</a></li>
                                                </ul>
                                            </li>
                                            <!-- <li class="has-dropdown">
                          <a href="donation-details.html">Donasi</a>
                          <ul class="submenu tp-submenu">
                            <li><a href="donation-1.html">Donation 01</a></li>
                            <li><a href="donation-2.html">Donation 02</a></li>
                            <li><a href="donation-sidebar.html">Donation Sidebar</a></li>
                            <li><a href="donation-details.html">Donation Details</a></li>
                          </ul>
                        </li> -->
                                            <!-- <li class="has-dropdown">
                          <a href="evant-details.html">Events</a>
                          <ul class="submenu tp-submenu">
                            <li><a href="event.html">Event</a></li>
                            <li><a href="evant-details.html">Event Details</a></li>
                          </ul>
                        </li> -->
                                            <li class="has-dropdown">
                                                <a href="/spk-login/Post#">Berita</a>
                                                <ul class="submenu tp-submenu">
                                                    <li><a href="/spk-login/Post#">Tulisan Anggota</a></li>
                                                    <li><a href="https://tekno.tempo.co/read/1761526/serikat-pekerja-kampus-resmi-dibentuk-ini-tujuan-pendiriannya">Berita SPK</a></li>
                                                    <li><a href="https://indoprogress.com/2023/09/pendirian-serikat-pekerja-kampus/">Pendirian SPK</a></li>
                                                    <li><a href="https://trimurti.id/kabar-perlawanan/serikat-pekerja-kampus-milik-seluruh-pekerja-kampus/">SPK Milik Semua</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="http://spk.or.id/contact.html">Kontak</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-4 col-lg-4 col-12">
                                <div class="tp-header__right-action">
                                    <ul class="d-flex align-items-center justify-content-end">
                                        <li class="d-none d-xl-block">
                                            <div class="tp-header__icon-box">
                                                <button class="search-open-btn"><i class="flaticon-loupe"></i></button>
                                                <a href="http://spk.or.id/spk-login/auth"><i class="flaticon-user"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tp-header__btn d-none d-md-block">
                                                <a class="tp-btn" href="http://spk.or.id/spk-login/auth/registration">Bergabung!</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tp-header-2__bar d-lg-none">
                                                <button class="tp-menu-bar" type="button">
                                                    <span><i class="fa-solid fa-bars-staggered"></i></span>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="tp-header__tel-box d-flex align-items-center">
                                                <div class="tp-header__tel-icon">
                                                    <span><i class="flaticon-phone"></i></span>
                                                </div>
                                                <div class="tp-header__tel-text">
                                                    <span>Hubungi Kami</span>
                                                    <a href="https://api.whatsapp.com/send?phone=6287819531788&text=Salam%20perjuangan!">+62 8781 9531 788</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- header-area-end -->
            </div>
        </div>
    </header>

    <main>
        <!-- breadcrumb-area-start -->
        <div class="tp-breadcrumb__area p-relative fix tp-breadcrumb-height" data-background="<?= base_url('assets/img/breadcrumb/breadcrumb-bg.png') ?>">
            <div class="tp-breadcrumb__shape-1 z-index-5">
                <img src="<?= base_url('assets/img/breadcrumb/breadcrumb-shape-1.png') ?>" alt="" />
            </div>
            <div class="tp-breadcrumb__shape-2 z-index-5">
                <img src="<?= base_url('assets/img/breadcrumb/breadcrumb-shape-2.png') ?>" alt="" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-breadcrumb__content z-index-5">
                            <div class="tp-breadcrumb__list">
                                <span><a href="<?= base_url('post') ?>">Tulisan</a></span>
                                <span class="dvdr"><i class="fa-sharp fa-solid fa-slash-forward"></i></span>
                                <span><?= $post['judul_tulisan']; ?></span>
                            </div>
                            <h3 class="tp-breadcrumb__title"><?= $post['judul_tulisan']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        