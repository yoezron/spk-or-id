<style media="print">
    /* Penyesuaian CSS untuk halaman cetak */
    body * {
        visibility: hidden;
    }

    .container-fluid,
    .container-fluid * {
        visibility: visible;
    }

    .container-fluid {
        position: absolute;
        left: 0;
        top: 0;
    }

    .text-center small {
        visibility: hidden;
    }

    /* Menyembunyikan tombol cetak saat mencetak */
    #cetakKartu {
        display: none !important;
    }

    .h3 {
        display: none;
    }

    .col-6.col-md-4 img {
        max-width: 60%;
        height: 60%;
        position: relative;
    }

    .col-sm-6.col-md-8 {
        padding: inherit;
        position: relative;
    }

    .col-sm-6.col-md-8 .card-title,
    .col-sm-6.col-md-8 .card-text {
        color: black;
        text-align: left !important;
        position: inherit;
        padding: inherit;
    }
</style>
<style>
    .card-title {
        margin-top: 60px;
        font-family: Arial, Helvetica, sans-serif;
        color: black;
    }

    .card-text {
        font-family: Arial, Helvetica, sans-serif;
        color: black;
        font-weight: bold;
        margin-bottom: 5px;
        line-height: 1.2;

    }

    .card-text-tag {
        font-size: small;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bold;
        color: crimson;
        margin-bottom: 2px;
        line-height: 1.2;
    }

    .img-fluid {
        max-height: 60%;
        max-width: 100%;
        padding-left: 15%;
        margin-top: 60px;
    }

    /* Contoh Media Query untuk Perangkat Mobile */
    @media screen and (max-width: 768px) {

        /* Atur gaya CSS khusus untuk layar dengan lebar maksimum 768px */
        .img-fluid {
            max-width: 80%;
        }

        .card-title {
            font-size: large;
        }

        /* Atur ulang tata letak atau ukuran font lainnya yang sesuai dengan layar yang lebih kecil */
    }

    /* Contoh Media Query untuk Perangkat Mobile */
    @media screen and (max-width: 768px) {
        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .col {
            padding-right: 15px;
            padding-left: 15px;
        }
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>

    <div class="container mt-5">
        <div class="card text-bg-dark mx-auto" style="max-width: 800px;">
            <img src="<?= base_url('assets/img/kartu/kartu.svg') ?>" class="card-img" alt="..." style="max-height: 50%;">
            <div class="card-img-overlay">
                <div class="row g-0 text-left">
                    <div class="col-6 col-md-4 mt-5">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid">
                        <p class="card-text text-left mt-4"><small>Bergabung sejak <?= date('d F Y', $user['date_created']); ?></small></p>
                    </div>

                    <div class="col-sm-6 col-md-8 mt-5">
                        <h5 class="card-title" style="font-size: xx-large;"><strong><?= $user['name']; ?></strong></h5>
                        <p class="card-text-tag">Nomor Anggota:</p>
                        <p class="card-text"><?= $user['date_created']; ?></p>
                        <p class="card-text-tag">Program Studi:</p>
                        <p class="card-text"><?= $user['prodi']; ?></p>
                        <p class="card-text-tag">Asal Kampus:</p>
                        <p class="card-text"><?= $user['kampus']; ?></p>
                        <p class="card-text-tag">Alamat:</p>
                        <p class="card-text"><?= $user['alamat']; ?></p>
                        <p class="card-text-tag">Nomor Telepon:</p>
                        <p class="card-text"><?= $user['telp']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5 class="text-center" style="font-style: italic;"><small>Tampilan lebih baik saat dilihat di desktop</small></h5>
    <button id="cetakKartu" class="btn btn-primary mt-3 mx-auto" style="display: flex;">Cetak Kartu</button>
    <script>
        document.getElementById('cetakKartu').addEventListener('click', function() {
            window.print(); // Memulai proses pencetakan halaman
        });
    </script>

</div>
</div>