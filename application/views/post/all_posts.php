<section class="th-blog-wrapper space-top space-extra2-bottom">
    <!--<div class="container">-->
    <!--    <div class="row mb-3">-->
    <!--        <img src="<?= base_url('assets/img/adver/adv-banner.svg'); ?>" alt="">-->
    <!--    </div>-->
    <!--</div>-->
    <div class="container">
        <div class="row gx-40">
            <div class="col-xxl-8 col-lg-7">
                <div class="container">
                    <div class="row">
                        <?php
                        // Urutkan berdasarkan 'waktu_posting' dari terbaru ke terlama
                        usort($all_posts, function ($a, $b) {
                            return strtotime($b['waktu_posting']) - strtotime($a['waktu_posting']);
                        });
                        ?>
                        <?php if (!empty($all_posts)) : ?>
                            <?php foreach ($all_posts as $post) : ?>
                                <div class="col-12 mb-30"> <!-- Mengubah kelas kolom menjadi col-12 untuk tampilan vertikal -->
                                    <div class="th-blog blog-single has-post-thumbnail">
                                        <div class="blog-img">
                                            <!-- Ganti 'src' dengan path gambar dari postingan -->
                                            <a href="<?= base_url('post/view/' . $post['slug']); ?>">
                                                <img src="assets/img/posting/<?= $post['gambar']; ?>" alt="Blog Image" style="width: 832px; height: 450px; object-fit: cover;"> <!-- Menetapkan resolusi gambar -->
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <!-- Tampilkan nama penulis, tanggal, dan tag -->
                                                <a class="author" href="blog.html"><i class="fa-light fa-user"></i>by <?= $post['penulis']; ?></a>
                                                <a href="blog.html"><i class="fa-light fa-calendar-days"></i><?= date('F j, Y', strtotime($post['waktu_posting'])); ?></a>
                                                <a href="blog-details.html"><i class="fa-light fa-tags"></i><?= $post['tag']; ?></a>
                                            </div>
                                            <h2 class="blog-title">
                                                <a href="<?= base_url('post/view/' . $post['slug']); ?>"><?= $post['judul_tulisan']; ?></a>
                                            </h2>
                                            <p class="blog-text">
                                                <!-- Tampilkan sebagian isi tulisan -->
                                                <?= substr($post['isi_tulisan'], 0, 500) . '...'; ?>
                                            </p>
                                            <a href="<?= base_url('post/view/' . $post['slug']); ?>" class="link-btn">
                                                Baca Selengkapnya<i class="fas fa-arrow-right ms-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p class="text-center">Tidak ada postingan saat ini.</p>
                        <?php endif; ?>
                    </div>

                </div>


                <!-- <div class="th-pagination ">
                    <ul>
                        <li><a href="blog.html">01</a></li>
                        <li><a href="blog.html">02</a></li>
                        <li><a href="blog.html">03</a></li>
                        <li><a href="blog.html"><i class="far fa-arrow-right"></i></a></li>
                    </ul>
                </div> -->
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <!-- <div class="widget widget_search  ">
                        <form class="search-form">
                            <input type="text" placeholder="Search Product...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget widget_categories  ">
                        <h3 class="widget_title">Categories</h3>
                        <ul>
                            <li><a href="service-details.html">Design</a><span>(08)</span></li>
                            <li><a href="service-details.html">Development</a> <span>(12)</span></li>
                            <li><a href="service-details.html">Photography</a><span>(15)</span></li>
                            <li><a href="service-details.html">Health</a><span>(21)</span></li>
                            <li><a href="service-details.html">Health</a><span>(14)</span></li>
                            <li><a href="service-details.html">Finance</a><span>(05)</span></li>
                            <li><a href="service-details.html">Technology</a><span>(10)</span></li>
                        </ul>
                    </div> -->
                    <div class="widget">
                        <h3 class="widget_title">Tulisan Terbaru</h3>
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
                                                <img src="assets/img/posting/<?= $post['gambar']; ?>" alt="Blog Image" style="width: 100px; height: 80px; object-fit: cover;">
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
                        </div>
                    </div>

                    <!-- <div class="widget widget_tag_cloud  ">
                        <h3 class="widget_title">Popular Tags</h3>
                        <div class="tagcloud">
                            <a href="blog.html">Business</a>
                            <a href="blog.html">Courses</a>
                            <a href="blog.html">Online</a>
                            <a href="blog.html">Remote</a>
                            <a href="blog.html">Education</a>
                            <a href="blog.html">Solution</a>
                            <a href="blog.html">Students</a>
                            <a href="blog.html">UX</a>
                        </div>
                    </div> -->
                    <!--<div class="widget widget_banner" data-overlay="theme" data-opacity="9" data-bg-src="assets/img/widget/widget-banner-bg.png">-->
                    <!--    <img src="<?= base_url('assets/img/adver/adv-banner2.gif'); ?>" alt="">-->
                    <!--</div>-->
                    <div class="widget widget_banner  " data-overlay="theme" data-opacity="9" data-bg-src="assets/img/widget/widget-banner-bg.png">
                        <div class="widget-banner">
                            <h4 class="title">Anda Pekerja Kampus dan butuh bantuan?<br>
                                Sampaikan Pengaduan Anda</h4>
                            <div class="logo"><a href="<?= base_url('/'); ?>"><img src="<?= base_url('assets'); ?>/img/logos.svg" alt="SPK"></div>
                            <h5 class="subtitle">Layanan Pengaduan</h5>
                            <a href="https://api.whatsapp.com/send?phone=6287819531788&text=Salam%20perjuangan!" class="link">+62 8781 9531 788</a>
                            <a href="<?= base_url('contact'); ?>" class="th-btn style7">Hubungi Kami <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>