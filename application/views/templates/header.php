<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?= $this->security->get_csrf_hash(); ?>">

    <title>SPK - <?= $title; ?></title>

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/') ?>/img/logo/favicon.png" />

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/brands.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/'); ?>css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/'); ?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    <style>
        .select2-container.select2-selection--single {
            height: calc(1.5em +.75rem + 2px) !important;
        }

        .form-group label {
            font-weight: bold;
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        legend {
            width: auto;
            padding: 0 10px;
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var url = "<?php echo site_url('user/add_ajax_kab'); ?>/" + $(this).val();
                $('#kabupaten').load(url);
                return false;
            })

            $("#kabupaten").change(function() {
                var url = "<?php echo site_url('user/add_ajax_kec'); ?>/" + $(this).val();
                $('#kecamatan').load(url);
                return false;
            })

            $("#kecamatan").change(function() {
                var url = "<?php echo site_url('user/add_ajax_des'); ?>/" + $(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    </script>

    <style>
        .select2-container.select2-selection--single {
            height: calc(1.5em +.75rem + 2px) !important;
            padding: .375rem.75rem !important;
            border: 1px solid #ced4da !important;
            display: flex;
            align-items: center;
        }

        .select2-container--bootstrap-5.select2-selection--single.select2-selection__rendered {
            line-height: 1.5em !important;
            border: 1px solid #ced4da !important;
            padding-left: 0 !important;
        }

        .select2-container--bootstrap-5.select2-selection--single.select2-selection__arrow {
            height: calc(1.5em +.75rem) !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
        }

        .chart-container {
            position: relative;
            margin: auto;
            height: 250px;
            width: 100%;
            max-width: 500px;
        }

        .form-label.text-danger {
            font-weight: normal;
            /* Agar asterisk tidak bold */
        }

        /* Membungkus teks panjang dalam option */
        select.wrap-option option {
            white-space: normal;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        select.wrap-option {
            height: auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #2d3436 !important;
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 20px;
        }
    </style>
</head>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content goes here -->