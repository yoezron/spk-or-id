<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manajemen Sub Menu</h1>

    <div class="row">
        <div class="col-lg-12">
            <!-- Alert Messages -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> <?= validation_errors(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <!-- Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Sub Menu</h6>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newSubMenuModal">
                        <i class="fas fa-plus"></i> Tambah Sub Menu Baru
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col">Nama Sub Menu</th>
                                    <th scope="col">Menu Induk</th>
                                    <th scope="col">URL</th>
                                    <th scope="col" width="10%">Icon</th>
                                    <th scope="col" width="10%">Status</th>
                                    <th scope="col" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($SubMenu as $sm) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><strong><?= $sm['title']; ?></strong></td>
                                    <td><span class="badge badge-info"><?= $sm['menu']; ?></span></td>
                                    <td><code><?= $sm['url']; ?></code></td>
                                    <td><i class="<?= $sm['icon']; ?>"></i> <small><?= $sm['icon']; ?></small></td>
                                    <td>
                                        <?php if ($sm['is_active'] == 1) : ?>
                                            <span class="badge badge-success">Aktif</span>
                                        <?php else : ?>
                                            <span class="badge badge-secondary">Tidak Aktif</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
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

<!-- Modal Tambah Sub Menu -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="newSubMenuModalLabel">
                    <i class="fas fa-plus-circle"></i> Tambah Sub Menu Baru
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title"><strong>Nama Sub Menu</strong></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan nama sub menu" required>
                        <small class="form-text text-muted">Contoh: Role, User Management, Settings</small>
                    </div>

                    <div class="form-group">
                        <label for="menu_id"><strong>Menu Induk</strong></label>
                        <select name="menu_id" id="menu_id" class="form-control" required>
                            <option value="">-- Pilih Menu Induk --</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="url"><strong>URL Sub Menu</strong></label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Contoh: admin/role" required>
                        <small class="form-text text-muted">URL relatif tanpa slash di depan</small>
                    </div>

                    <div class="form-group">
                        <label for="icon"><strong>Icon Class</strong></label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Contoh: fas fa-fw fa-user" required>
                        <small class="form-text text-muted">
                            Lihat icon di <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a>
                        </small>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="1" name="is_active" class="custom-control-input" id="is_active" checked>
                            <label class="custom-control-label" for="is_active">
                                <strong>Aktifkan sub menu ini</strong>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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