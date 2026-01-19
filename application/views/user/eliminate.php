<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Salam Perjuangan <?= $user['name']; ?>!</h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <h5 class="card-title">Hapus Keanggotaan Serikat Pekerja Kampus</h5>
                    <div class="table-responsive"> <!-- Tambahkan class table-responsive untuk membuat tabel dapat di-scroll jika diperlukan -->
                        <table class="display" id="eliminate"> <!-- Tambahkan id="eliminate" pada tabel -->
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nomor Anggota</th>
                                    <th scope="col">Tanggal Bergabung</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama Member</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Status Akun</th>
                                    <th scope="col">Peran</th>
                                    <th scope="col">Asal Kampus</th>
                                    <th scope="col">Prodi</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Kontak</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Pemberi Gaji</th>
                                    <th scope="col">Range Gaji</th>
                                    <th scope="col">Wilayah</th>
                                    <th scope="col">Keahlian</th>
                                    <th scope="col">Motivasi</th>
                                    <th scope="col">Aksi</th> <!-- Tambahkan kolom aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($member as $me) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $me['date_created']; ?></td>
                                        <td><?= date('d F Y', $me['date_created']); ?></td>
                                        <td><?= $me['email']; ?></td>
                                        <td><?= $me['name']; ?></td>
                                        <td><?= $me['gender']; ?></td>
                                        <td><?= ($me['is_active'] == 1) ? 'Aktif' : 'Belum Aktivasi Akun'; ?></td>
                                        <td><?= $me['role']; ?></td>
                                        <td><?= $me['kampus']; ?></td>
                                        <td><?= $me['prodi']; ?></td>
                                        <td><?= $me['alamat']; ?></td>
                                        <td><a href="https://wa.me/<?= $me['telp']; ?>" target="_blank" class="btn btn-success btn-sm">
                                                <?= $me['telp']; ?>
                                            </a></td>
                                        <td><?= $me['status']; ?></td>
                                        <td><?= $me['employer']; ?></td>
                                        <td><?= $me['gaji']; ?></td>
                                        <td><?= $me['wilayah']; ?></td>
                                        <td><?= $me['keahlian']; ?></td>
                                        <td><?= $me['personal']; ?></td>
                                        <td>
                                            <?= anchor(base_url('user/hapus/' . $me['id']), '<button type="button" class="btn btn-danger">Hapus/Tolak</button>') ?> <!-- Gunakan anchor untuk membuat tombol hapus -->
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->