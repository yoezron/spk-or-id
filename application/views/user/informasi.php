<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>

    <div class="card shadow p-3">
        <div class="card-header bg-success text-white">
            Informasi Serikat
        </div>
        <div class="card-body">
            <h5 class="card-title"><strong><i class="fas fa-info-circle"></i> Informasi Anggota Serikat Pekerja Kampus</strong></h5>
            <p class="card-text">Selamat datang anggota serikat! Ini adalah halaman untuk informasi terkini mengenai kegiatan dan agenda Serikat Pekerja Kampus.</p>

            <div class="card">
                <div class="card-header">
                    <h2>Informasi Terkini</h2>
                </div>
                <div class="card-body">
                    <div class="col-lg">
                        <?php foreach ($recent_information as $info) : ?>
                            <div class="card mb-4 mx-auto shadow p-3" style="max-width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <!-- Jika ada gambar yang disimpan -->
                                        <?php if ($info['gambar']) : ?>
                                            <img src="<?= base_url('assets/img/info/' . $info['gambar']); ?>" class="img-fluid rounded-start" alt="Info Image">
                                        <?php else : ?>
                                            <!-- Jika tidak ada gambar -->
                                            <img src="<?= base_url('assets/img/default_info_image.jpg'); ?>" class="img-fluid rounded-start" alt="Info Image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h3 class="card-title-info"><?= $info['judul']; ?></h3>
                                            <p class="paragraph-style"><?= nl2br($info['info']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div>
                <!-- Menampilkan Recent Information sebagai Card -->
                <div class="row mt-4">

                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->