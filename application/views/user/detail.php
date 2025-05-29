<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Detail Anggota <strong><?= $active['name'] ?></strong></h5>
        <div class="card-body">

            <div class="card mb-3 border-success mx-auto" style="max-width: 1080px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $active['image']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><strong><?= $active['name'] ?></strong></h5>
                            <p class="card-text text-muted"><?= $active['email'] ?></p>

                            <table class="table">
                                <thead>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nomor Anggota</td>
                                        <td>: <?= $active['date_created'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bergabung Sejak</td>
                                        <td>: <?= date('d F Y', $active['date_created']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>: <?= $active['gender'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Lengkap</td>
                                        <td>: <?= $active['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>: <?= $active['telp'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Asal Kampus</td>
                                        <td>: <?= $active['kampus'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Prodi</td>
                                        <td>: <?= $active['prodi'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>: <?= $active['status'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pemberi Upah</td>
                                        <td>: <?= $active['employer'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Rentang Gaji</td>
                                        <td>: <?= $active['gaji'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Wilayah Kerja</td>
                                        <td>: <?= $active['wilayah'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Bidang Keahlian</td>
                                        <td>: <?= $active['keahlian'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Motivasi Berserikat</td>
                                        <td>: <?= $active['personal'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Facebook</td>
                                        <td>: <?= $active['facebook'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Twitter</td>
                                        <td>: <?= $active['twitter'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Linked In</td>
                                        <td>: <?= $active['linkedin'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Instagram</td>
                                        <td>: <?= $active['instagram'] ?></td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url(); ?>user/confirm" class="btn btn-primary">Kembali</a>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->