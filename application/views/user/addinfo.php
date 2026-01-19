<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>

    <div class="card shadow mx-auto p-3" style="max-width:90%">
        <div class="card-header bg-success text-white">
            Kirim Informasi ke Anggota
        </div>

        <div class="card shadow mb-3">
            <div class="col-lg-10">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <form action="<?= base_url('user/addinfo'); ?>" method="post" class="was-validated" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroup-sizing-default">Judul Info</span>
                                <input type="text" name="info_title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="info_message" class="form-label">Informasi Untuk Anggota Serikat:</label>
                            <textarea name="info_message" class="form-control" id="info_message" placeholder="Kirim pesan untuk anggota" ></textarea>
                            <div class="invalid-feedback">
                                Silakan tulis pesan untuk anggota.
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="info_file" class="form-control" aria-label="file example">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->
        <div class="card shadow mb-3 p-3">
            <h3>Subscriber</h3>
            <textarea name="subscriber" id="subscriber" rows="5" cols="50"><?= $subscriber; ?></textarea>
        </div>

        <div>
            <div class="card shadow mx-auto p-3" style="max-width:100%">
                <div>
                    <!-- Menampilkan Recent Information sebagai Card -->
                    <div class="row mt-4">
                        <div class="col-lg">
                            <h2>Informasi Terakhir</h2>
                            <?php foreach ($recent_information as $info) : ?>
                                <div class="card mb-3 p-3 shadow" style="max-width: 100%;">
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
        <h5 class="card-title"><?= htmlspecialchars($info['judul']); ?></h5>
        <p class="card-text"><?= $info['info']; ?></p>
        <form action="<?= base_url('user/deleteinfo'); ?>" method="post">
            <input type="hidden" name="info_id" value="<?= $info['id']; ?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus informasi ini?')">Delete</button>
        </form>
    </div>
</div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->