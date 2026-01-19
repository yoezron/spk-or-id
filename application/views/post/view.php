<!--==============================
        Blog Area
    ==============================-->
<section class="th-blog-wrapper blog-details space-top space-extra2-bottom">
    <!--<div class="container">-->
    <!--    <div class="row mb-3">-->
    <!--        <img src="<?= base_url('assets/img/adver/adv-banner.svg'); ?>" alt="">-->
    <!--    </div>-->
    <!--</div>-->
    <div class="container">
        <div class="row gx-30">
            <div class="col-xxl-8 col-lg-7">
                <?php if ($post) : ?>
                    <div class="th-blog blog-single">
                        <div class="blog-img">
                            <!-- Ganti gambar dengan gambar dari postingan -->
                            <img src="<?= base_url('assets/img/posting/' . $post['gambar']); ?>" alt="Post Image" />
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <!-- Ganti nama penulis dan tanggal posting -->
                                <a class="author" href="#"><i class="far fa-user"></i>By
                                    <?= $post['penulis']; ?></a>
                                <a href="#"><i class="fa-light fa-calendar-days"></i><?= date('d F, Y', strtotime($post['waktu_posting'])); ?></a>
                                <!-- Ganti tag dengan tag dari database -->
                                <?php
                                // Misalkan $post['tag'] berisi string tag yang dipisahkan oleh koma
                                $tags = explode(';', $post['tag']);
                                ?>

                                <a href="#">
                                    <i class="fa-light fa-book"></i>
                                    <?php
                                    // Tampilkan setiap tag dengan semicolon sebagai pemisah
                                    foreach ($tags as $index => $tag) {
                                        echo trim($tag);

                                        // Tambahkan semicolon setelah setiap tag kecuali yang terakhir
                                        if ($index < count($tags) - 1) {
                                            echo ' - ';
                                        }
                                    }
                                    ?>
                                </a>

                            </div>
                            <!-- Ganti judul dengan judul dari postingan -->
                            <h2 class="blog-title"><?= $post['judul_tulisan']; ?></h2>
                            <!-- Ganti konten teks dengan isi dari database -->
                            <p><?= $post['isi_tulisan']; ?></p>

                        </div>

                        <!-- Tidak mengubah layout share links -->
                        <div class="share-links clearfix">
                            <div class="row justify-content-between">
                                <div class="col-md-auto">
                                    <span class="share-links-title">Tags:</span>
                                    <div class="tagcloud">
                                        <!-- Mengubah string tag menjadi array -->
                                        <?php
                                        // Misalkan $post['tag'] berisi string tag yang dipisahkan oleh koma
                                        $tags = explode(';', $post['tag']);

                                        // Tampilkan setiap tag dengan semicolon sebagai pemisah
                                        foreach ($tags as $index => $tag) {
                                            echo '<a href="#">' . trim($tag) . '</a>';

                                            // Tambahkan semicolon setelah setiap tag kecuali yang terakhir
                                            if ($index < count($tags) - 1) {
                                                echo ' ';
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-auto text-xl-end">
                                    <span class="share-links-title">Share:</span>
                                    <ul class="social-links">
                                        <!-- Tautan berbagi media sosial -->
                                        <li>
                                            <a href="https://facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://linkedin.com/sharing/share-offsite/?url=<?= urlencode(current_url()); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                    <!-- End Social Share -->
                                </div>
                                <!-- Share Links Area end -->
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <p>Postingan tidak ditemukan.</p>
                <?php endif; ?>

                <!-- <div class="th-comments-wrap">
                    <h2 class="blog-inner-title h5">Comments (3)</h2>
                    <ul class="comment-list">
                        <li class="th-comment-item">
                            <div class="th-post-comment">
                                <div class="comment-avater">
                                    <img src="assets/img/blog/comment-author-1.jpg" alt="Comment Author" />
                                </div>
                                <div class="comment-content">
                                    <h3 class="name">Adam Jhon</h3>
                                    <span class="commented-on">25Aug, 2023 08:56pm</span>
                                    <p class="text">Through this blog, we aim to inspire readers to embrace education as a lifelong journey and to advocate for quality education that empowers individuals and communities.</p>
                                    <div class="reply_and_edit">
                                        <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                    </div>
                                </div>
                            </div>
                            <ul class="children">
                                <li class="th-comment-item">
                                    <div class="th-post-comment">
                                        <div class="comment-avater">
                                            <img src="assets/img/blog/comment-author-2.jpg" alt="Comment Author" />
                                        </div>
                                        <div class="comment-content">
                                            <h3 class="name">Marvin McKinney</h3>
                                            <span class="commented-on">25Aug, 2023 10:56pm</span>
                                            <p class="text">Education News and Trends: We provide updates on the latest developments and trends in the education sector, including educational research,</p>
                                            <div class="reply_and_edit">
                                                <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="th-comment-item">
                            <div class="th-post-comment">
                                <div class="comment-avater">
                                    <img src="assets/img/blog/comment-author-3.jpg" alt="Comment Author" />
                                </div>
                                <div class="comment-content">
                                    <h3 class="name">Anadi Juila</h3>
                                    <span class="commented-on">26Aug, 2023 10:00pm</span>
                                    <p class="text">We discuss strategies to help students make informed decisions about their educational and career paths, ensuring they are prepared for success in the workforce.</p>
                                    <div class="reply_and_edit">
                                        <a href="blog-details.html" class="reply-btn"><i class="fas fa-reply"></i>Reply</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> -->
                <!-- Comment end -->
                <!-- Comment Form -->
                <!-- <form class="th-comment-form">
                    <div class="form-title">
                        <h3 class="blog-inner-title h5">Leave a Reply</h3>
                        <p class="mb-30">Your email address will not be published. Required fields are marked</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" placeholder="Full Name*" class="form-control" />
                            <i class="far fa-user"></i>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" placeholder="Your Email*" class="form-control" />
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" placeholder="Website*" class="form-control" />
                            <i class="fal fa-globe"></i>
                        </div>
                        <div class="col-12 form-group">
                            <textarea placeholder="Comment*" class="form-control"></textarea>
                            <i class="fal fa-pencil"></i>
                        </div>
                        <div class="col-12 form-group mb-0">
                            <button class="th-btn">Submit Message <i class="fas fa-arrow-right ms-1"></i></button>
                        </div>
                    </div>
                </form> -->
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <!-- <div class="widget widget_search">
                        <form class="search-form">
                            <input type="text" placeholder="Search Product..." />
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget widget_categories">
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
                    <!-- <div class="widget widget_tag_cloud">
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
                    <div class="widget widget_banner" data-overlay="theme" data-opacity="9" data-bg-src="assets/img/widget/widget-banner-bg.png">
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
    
    <!--==============================
Modal Area  
==============================-->
    <!-- Modal Pop-Up -->
    <div class="modal-overlay" id="popupModal">
        <div class="modal-content">
            <span class="modal-close" id="closeModal"><i class="fas fa-times-circle"></i></span>
            <img src="https://ik.imagekit.io/spk170823/spkchannel.jpg?updatedAt=1747067358241" alt="Survei SPK" border="0">
            <a href="https://whatsapp.com/channel/0029VarSDWzEFeXi45Uay73E" target="_blank">Ikuti Channel SPK</a>
        </div>
    </div>
</section>