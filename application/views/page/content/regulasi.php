<!--==============================
        Blog Area
    ==============================-->
<section class="th-blog-wrapper blog-details space-top space-extra2-bottom">
    <div class="container">
        <div class="row gx-30">
            <div class="col-xxl-8 col-lg-7">
                <div class="th-blog blog-single">
                    <div class="blog-img">
                        <img src="assets/img/blog/visimisi.jpeg" alt="Blog Image">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a class="author" href="#"><i class="far fa-user"></i>by <?= $content['cont_by']; ?></a>
                            <a href="#"><i class="fa-light fa-calendar-days"></i>17 Agustus, 2023</a>
                            <a href="pengurus"><i class="fa-light fa-book"></i>Regulasi</a>
                        </div>
                        <h2 class="blog-title">Regulasi Pekerja Kampus</h2>
                        <div class="container-fluid">
                            <h4>AD/ART</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <iframe src="<?= base_url('assets/AD-ART SPK.pdf'); ?>" style="width: 100%; height: 600px; border: none;"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><?= $content['link']; ?></p>
                    </div>
                    <div class="share-links clearfix ">
                        <div class="row justify-content-between">
                            <div class="col-md-auto">
                                <span class="share-links-title">Tags:</span>
                                <div class="tagcloud">
                                    <a href="regulasi">Regulasi</a>
                                    <a href="welcome">Serikat Pekerja Kampus</a>
                                </div>
                            </div>
                            <div class="col-md-auto text-xl-end">
                                <span class="share-links-title">Share:</span>
                                <ul class="social-links">
                                    <li><a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                </ul><!-- End Social Share -->
                            </div><!-- Share Links Area end -->
                        </div>
                    </div>
                </div>

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
                    <div class="widget widget_banner  " data-overlay="theme" data-opacity="9" data-bg-src="assets/img/widget/widget-banner-bg.png">
                        <div class="widget-banner">
                            <h4 class="title">Anda Pekerja Kampus dan butuh bantuan?<br>
                                Sampaikan Pengaduan Anda</h4>
                            <div class="logo"><a href="<?= base_url('/'); ?>"><img src="<?= base_url('assets'); ?>/img/logos.svg" alt="SPK"></div>
                            <h5 class="subtitle">Layanan Pengaduan</h5>
                            <!--<a href="https://api.whatsapp.com/send?phone=6287819531788&text=Salam%20perjuangan!" class="link">+62 8781 9531 788</a>-->
                            <a href="contact" class="th-btn style7">Hubungi Kami <i class="far fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>