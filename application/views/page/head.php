<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SPK - <?= $title; ?></title>
    <meta name="author" content="themeholy">
    <meta name="description" content="SPK - Serikat Pekerja Kampus">
    <meta name="keywords" content="SPK - Serikat Pekerja Kampus">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <link rel="manifest" href="<?= base_url('assets'); ?>/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/') ?>/img/logo/favicon.png">
    <meta name="theme-color" content="#ffffff">

    
    <!-- META OG -->
    <meta property="og:title" content="<?= $title; ?>" />
    <meta property="og:url" content="<?= current_url(); ?>" />
    <meta property="og:image" content="<?= base_url('assets/img/posting/' . $image); ?>" />

    
    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Jost:wght@300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">


    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/slick.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/nice-select.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/style.css">
    
    <!--==============================
	    MODAL STYLE CSS
	============================== -->
    <style>
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .modal-content a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 18px;
            cursor: pointer;
            color: #aaa;
        }

        .modal-close:hover {
            color: #000;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>

</head>