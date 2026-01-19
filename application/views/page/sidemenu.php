<!--==============================
    Mobile Menu
  ============================== -->
<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="<?= base_url('/'); ?>"><img src="<?= base_url('assets'); ?>/img/logos.svg" alt="SPK"></a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="<?= base_url('/'); ?>">Beranda</a>
                    <ul class="sub-menu">
                        <li><a href="about">Tentang Kami</a></li>
                        <li><a href="sejarah">Sejarah</a></li>
                        <li><a href="manifesto">Manifesto</a></li>
                        <li><a href="visimisi">Visi dan Misi</a></li>
                        <li><a href="adart">AD/ART</a></li>
                        <!--<li><a href="pengurus">Pengurus</a></li>-->
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Dokumen</a>
                    <ul class="sub-menu">
                        <li><a href="publikasi">Publikasi</a></li>
                        <li><a href="regulasi">Regulasi</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Berita</a>
                    <ul class="sub-menu">
                        <li><a href="<?= base_url('post'); ?>">Berita SPK</a></li>
                        <li><a href="https://www.google.com/search?q=Serikat+Pekerja+Kampus&sca_esv=5422c522b7433249&sca_upv=1&biw=1707&bih=862&tbm=nws&sxsrf=ADLYWIJ-VEiDby8I1MDoUUVKZh20cj7Kjw%3A1726854622265&ei=3rXtZr36D-mVseMPqMXA8AM&ved=0ahUKEwi94driitKIAxXpSmwGHagiED4Q4dUDCA0&oq=Serikat+Pekerja+Kampus&gs_lp=Egxnd3Mtd2l6LW5ld3MiFlNlcmlrYXQgUGVrZXJqYSBLYW1wdXMyBRAAGIAEMggQABiABBiiBDIIEAAYgAQYogQyCBAAGIAEGKIEMggQABiABBiiBEiqRFAAWABwAXgAkAEAmAFUoAFUqgEBMbgBDMgBAJgCAqACX5gDAIgGAZIHATKgB7QD&sclient=gws-wiz-news" target="_blank">Publikasi Luar</a></li>
                    </ul>
                </li>
                <!-- <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About Us</a></li>
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
                        <li><a href="event.html">Events</a></li>
                        <li><a href="event-details.html">Event Details</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="error.html">Error Page</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="<?= base_url('contact'); ?>">Kontak</a>
                </li>
                <li>
                    <a href="<?= base_url('auth'); ?>"><i class="fas fa-door-open"></i> Login Anggota</a>
                </li>
                <li>
                    <a href="<?= base_url('register'); ?>"><i class="fas fa-user-plus"></i> Mendaftar SPK</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="popup-search-box d-none d-lg-block">
    <button class="searchClose"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" placeholder="Ada yang dapat kami bantu?">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>
<!--==============================
    Sidemenu
============================== -->
<div class="sidemenu-wrapper d-none d-lg-block ">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
        <div class="widget  ">
            <div class="th-widget-about">
                <div class="about-logo">
                    <a href="index.html"><img src="<?= base_url('assets'); ?>/img/logos.svg" alt="SPK"></a>
                </div>
                <p class="about-text">Serikat Pekerja Kampus adalah Serikat pekerja yang mewadahi pekerja di bidang/sektor pendidikan tinggi</p>
                <div class="th-social style2">
                    <h6 class="title">IKUTI KAMI:</h6>
                    <a href="https://www.facebook.com/pekerjakampus"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com/pekerjakampus"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/@SerikatPekerjaKampus"><i class="fab fa-youtube"></i></i></a>
                    <a href="https://www.linkedin.com/company/serikat-pekerja-kampus/"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/serikatpekerjakampus"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="widget  ">
            <h3 class="widget_title">Tulisan Anggota Terbaru</h3>
            <div class="recent-post-wrap">
                <?php
                // Sort the $all_posts array by 'waktu_posting' in descending order (newest to oldest)
                usort($all_posts, function ($a, $b) {
                    return strtotime($b['waktu_posting']) - strtotime($a['waktu_posting']);
                });
                ?>
                <?php if (!empty($all_posts)) : ?>
                    <?php
                    // Batasi jumlah post yang ditampilkan (misalnya 3 post terbaru)
                    $recent_posts = array_slice($all_posts, 0, 3);
                    foreach ($recent_posts as $post) : ?>
                        <div class="recent-post">
                            <div class="media-img">
                                <!-- Ganti 'src' dengan path gambar dari postingan -->
                                <a href="<?= base_url('post/view/' . $post['slug']); ?>">
                                    <img src="<?= base_url('assets/img/posting/' . $post['gambar']); ?>" alt="Blog Image" style="width: 100px; height: 80px; object-fit: cover;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="post-title">
                                    <a class="text-inherit" href="<?= base_url('post/view/' . $post['slug']); ?>"><?= $post['judul_tulisan']; ?></a>
                                </h4>
                                <div class="recent-post-meta">
                                    <a href="blog.html">
                                        <i class="fal fa-calendar"></i><?= date('d/m/Y', strtotime($post['waktu_posting'])); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Tidak ada postingan terbaru.</p>
                <?php endif; ?>
                <a href="<?= base_url('post'); ?>" class="link-btn">
                    Baca Tulisan Lainnya<i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
        <div class="widget widget_contact  ">
            <h3 class="widget_title">Alamat SPK</h3>
            <p class="contact-text">Mari bergabung, atau tetap terhubung dengan kami untuk memperjuangkan nasib pekerja kampus.</p>
            <div class="th-widget-contact">
                <div class="info-box-wrap">
                    <div class="info-box_icon">
                        <i class="fas fa-location-dot"></i>
                    </div>
                    <p class="info-box_text">
                        Jakarta, Indonesia.
                    </p>
                </div>
                <div class="info-box-wrap">
                    <div class="info-box_icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <a href="mailto:info@Edura.com" class="info-box_link">serikatpekerjakampus@gmail.com</a>
                </div>
                <div class="info-box-wrap">
                    <div class="info-box_icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <a href="https://api.whatsapp.com/send?phone=6287819531788&text=Salam%20perjuangan!" class="info-box_link">+62 8781 9531 788</a>
                </div>
            </div>
        </div>
    </div>
</div>