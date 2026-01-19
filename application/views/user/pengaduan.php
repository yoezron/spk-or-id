<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>

    <div class="card shadow p-4">
        <h2>Pesan Pengaduan Masyarakat</h2>
        <!-- Looping melalui semua pengaduan yang diterima -->
        <?php foreach ($pengaduan as $p) : ?>
            <div class="card mb-4 shadow" style="max-width: 100%;">
                <h5 class="card-header">Pesan <?= $p['subject']; ?> #<?= $p['id']; ?></h5>
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom 1 -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?= $p['nama']; ?>" disabled>
                                <label for="floatingInputValue">Nama Pengirim</label>
                            </div>
                        </div>

                        <!-- Kolom 2 -->
                        <div class="col-md-6">
                            <div class="form-floating mt-3 mt-md-0">
                                <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?= $p['email']; ?>" disabled>
                                <label for="floatingInputValue">Email Pengirim</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <!-- Kolom 1 -->
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?= $p['nomor_hp']; ?>" disabled>
                                <label for="floatingInputValue">Nomor WA/HP</label>
                            </div>
                        </div>

                        <!-- Kolom 2 -->
                        <div class="col-md-6">
                            <div class="form-floating mt-3 mt-md-0">
                                <input type="datetime" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?= $p['tanggal_pengaduan']; ?>" disabled>
                                <label for="floatingInputValue">Tanggal Pengaduan</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <textarea class="form-control" id="floatingInputValue" placeholder="name@example.com" disabled><?= $p['pesan']; ?></textarea>
                        <label for="floatingInputValue">Pesan Pengaduan</label>
                    </div>

                    <a href="https://api.whatsapp.com/send?phone=<?= $p['nomor_hp']; ?>&text=Salam%20perjuangan!" class="btn btn-primary" target="_blank">Tanggapi Pengaduan</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->