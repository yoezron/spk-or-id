<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " data-bg-src="<?= base_url('assets'); ?>/img/bg/<?= $image; ?>.jpg" data-overlay="title" data-opacity="8">
    <div class="breadcumb-shape" data-bg-src="<?= base_url('assets'); ?>/img/bg/breadcumb_shape_1_1.png">
    </div>
    <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
        <img src="<?= base_url('assets'); ?>/img/bg/breadcumb_shape_1_2.png" alt="shape">
    </div>
    <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
        <img src="<?= base_url('assets'); ?>/img/bg/breadcumb_shape_1_3.png" alt="shape">
    </div>
    <div class="container">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title"><?= $title; ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="/">Beranda</a></li>
                <li><?= $title; ?></li>
            </ul>
        </div>
    </div>
</div>