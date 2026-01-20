<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-tag text-primary"></i> <?= $title; ?>
        </h1>
        <button type="button" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#newRoleModal">
            <i class="fas fa-plus fa-sm"></i> Tambah Peran Baru
        </button>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Card for Role Management -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list"></i> Daftar Peran Pengguna
                    </h6>
                    <span class="badge badge-primary badge-pill"><?= count($role); ?> Peran</span>
                </div>
                <div class="card-body">
                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="10%" class="text-center">#</th>
                                    <th scope="col" width="60%">
                                        <i class="fas fa-user-shield"></i> Nama Peran
                                    </th>
                                    <th scope="col" width="30%" class="text-center">
                                        <i class="fas fa-cog"></i> Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge badge-secondary"><?= $i;  ?></span>
                                        </td>
                                        <td>
                                            <strong><?= $r['role']; ?></strong>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>"
                                               class="btn btn-sm btn-info shadow-sm">
                                                <i class="fas fa-key"></i> Kelola Akses
                                            </a>
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

        <!-- Info Card -->
        <div class="col-lg-4">
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-body">
                    <div class="text-center">
                        <i class="fas fa-info-circle fa-3x text-primary mb-3"></i>
                        <h5 class="font-weight-bold text-primary">Informasi</h5>
                        <p class="text-gray-700 small">
                            Kelola peran pengguna dan hak akses mereka. Setiap peran memiliki akses menu yang berbeda.
                        </p>
                        <hr>
                        <div class="text-left">
                            <p class="small mb-2">
                                <i class="fas fa-check-circle text-success"></i> Tambah peran baru
                            </p>
                            <p class="small mb-2">
                                <i class="fas fa-check-circle text-success"></i> Kelola hak akses menu
                            </p>
                            <p class="small mb-0">
                                <i class="fas fa-check-circle text-success"></i> Kontrol akses sistem
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="newRoleModalLabel">
                    <i class="fas fa-plus-circle"></i> Tambah Peran Baru
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role" class="font-weight-bold">
                            <i class="fas fa-user-tag text-primary"></i> Nama Peran
                        </label>
                        <input type="text"
                               class="form-control form-control-lg"
                               id="role"
                               name="role"
                               placeholder="Contoh: Editor, Moderator, dll"
                               required
                               autocomplete="off">
                        <small class="form-text text-muted">
                            <i class="fas fa-info-circle"></i> Masukkan nama peran yang akan ditambahkan
                        </small>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>