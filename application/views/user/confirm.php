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
                    <h4 class="h4 mb-5 mt-5 text-gray-800">Daftar Calon Anggota Serikat Pekerja Kampus</h4>
                    <div class="table-responsive">

                        <table class="display" id="calonAnggota">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal Bergabung</th>
                                    <th scope="col">Nama Calon Anggota</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Asal Kampus</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Nomor Kontak</th>
                                    <th scope="col">Detail Calon</th>
                                    <th scope="col">Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($member as $me) : ?>
                                    <!-- Hanya tampilkan jika is_active = 1 -->
                                    <?php if ($me['is_active'] == 1) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= date('d F Y', $me['date_created']); ?></td>
                                            <td><?= $me['name']; ?></td>
                                            <td><?= $me['email']; ?></td>
                                            <td><?= $me['kampus']; ?></td>
                                            <td><?= $me['status']; ?></td>
                                            <td><a href="https://wa.me/<?= $me['telp']; ?>?text=Salam%20perjuangan!%20Terimakasih%20telah%20mendaftar%20di%20Serikat%20Pekerja%20Kampus!" target="_blank" class="btn btn-success btn-sm">
                                                    <?= $me['telp']; ?>
                                                </a></td>
                                            <td><a href="<?= base_url(); ?>user/detail/<?= $me['id']; ?>" class="badge badge-primary float-right">Rincian</a></td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input-2" type="checkbox" id="checkbox<?= $me['id'] ?>" name="konfirmasi" value="6" <?= check_role($me['role_id']); ?> data-role="<?= $me['role_id'] ?>" data-id="<?= $me['id'] ?>">
                                                    <label class="form-check-label mx-1" for="inlineCheckbox1"><i class="fas fa-user-check"></i></label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="h4 mb-5 mt-5 text-gray-800">Daftar Anggota Serikat Pekerja Kampus</h4>
                    <a href="<?= base_url('user/download'); ?>" class="btn btn-success mb-3"><i class="fas fa-database"></i> Unduh Seluruh Data Anggota</a>
                    <div class="table-responsive">

                        <table class="display" id="anggota">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nomor Anggota</th>
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Asal Kampus</th>
                                    <th scope="col">Wilayah</th>
                                    <th scope="col">No Kontak</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Rincian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($active as $ac) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $ac['date_created']; ?></td>
                                        <td><?= $ac['name']; ?></td>
                                        <td><?= $ac['email']; ?></td>
                                        <td><?= $ac['kampus']; ?></td>
                                        <td><?= $ac['wilayah']; ?></td>
                                        <td><a href="https://wa.me/<?= $ac['telp']; ?>?text=Salam%20Perjuangan%20Anggota%20Serikat%20Pekerja%20Kampus!" target="_blank" class="btn btn-success btn-sm">
                                                    <?= $ac['telp']; ?>
                                                </a></td>
                                        <td><?= $ac['role']; ?></td>
                                        <td><a href="<?= base_url(); ?>user/detail/<?= $ac['id']; ?>" class="badge badge-primary float-right">Rincian</a></td>
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