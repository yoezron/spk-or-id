<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-key text-primary"></i> <?= $title; ?>
        </h1>
        <a href="<?= base_url('admin/role'); ?>" class="btn btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Card for Role Access Management -->
            <div class="card shadow mb-4 border-left-primary">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-shield-alt"></i> Pengaturan Akses Menu
                    </h6>
                    <h6 class="m-0">
                        <span class="badge badge-primary badge-pill">
                            <i class="fas fa-user-tag"></i> <?= $role['role']; ?>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>

                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle"></i>
                        <strong>Informasi:</strong> Centang menu yang ingin diberikan akses untuk peran <strong><?= $role['role']; ?></strong>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" width="10%" class="text-center">#</th>
                                    <th scope="col" width="50%">
                                        <i class="fas fa-bars"></i> Nama Menu
                                    </th>
                                    <th scope="col" width="40%" class="text-center">
                                        <i class="fas fa-toggle-on"></i> Status Akses
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <td class="text-center align-middle">
                                            <span class="badge badge-secondary"><?= $i;  ?></span>
                                        </td>
                                        <td class="align-middle">
                                            <strong><i class="fas fa-chevron-right text-primary"></i> <?= $m['menu']; ?></strong>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="custom-control custom-switch custom-switch-lg">
                                                <input type="checkbox"
                                                       class="custom-control-input"
                                                       id="access<?= $m['id']; ?>"
                                                       <?= check_access($role['id'], $m['id']);  ?>
                                                       data-role="<?= $role['id']; ?>"
                                                       data-menu="<?= $m['id']; ?>">
                                                <label class="custom-control-label" for="access<?= $m['id']; ?>">
                                                    <span class="badge badge-success">Aktif</span>
                                                    <span class="badge badge-secondary">Nonaktif</span>
                                                </label>
                                            </div>
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
            <div class="card shadow mb-4 border-left-info">
                <div class="card-body">
                    <div class="text-center">
                        <i class="fas fa-user-shield fa-3x text-info mb-3"></i>
                        <h5 class="font-weight-bold text-info">Peran Terpilih</h5>
                        <h4 class="mb-3">
                            <span class="badge badge-info p-3"><?= $role['role']; ?></span>
                        </h4>
                        <hr>
                        <div class="text-left">
                            <p class="small mb-2">
                                <i class="fas fa-info-circle text-info"></i>
                                <strong>Cara Menggunakan:</strong>
                            </p>
                            <p class="small mb-2 ml-3">
                                1. Aktifkan switch untuk memberikan akses
                            </p>
                            <p class="small mb-2 ml-3">
                                2. Nonaktifkan untuk mencabut akses
                            </p>
                            <p class="small mb-0 ml-3">
                                3. Perubahan disimpan otomatis
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4 border-left-warning">
                <div class="card-body">
                    <div class="text-center">
                        <i class="fas fa-exclamation-triangle fa-2x text-warning mb-2"></i>
                        <h6 class="font-weight-bold text-warning">Perhatian</h6>
                        <p class="small text-gray-700">
                            Berhati-hatilah saat mengubah hak akses. Pastikan pengguna dengan peran ini memiliki akses yang sesuai.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<style>
/* Custom Switch Styling */
.custom-switch-lg .custom-control-label::before {
    width: 3rem;
    height: 1.5rem;
    border-radius: 3rem;
}

.custom-switch-lg .custom-control-label::after {
    width: calc(1.5rem - 4px);
    height: calc(1.5rem - 4px);
    border-radius: calc(1.5rem - 4px);
}

.custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(1.5rem);
}

/* Show/Hide badge based on switch state */
.custom-switch .custom-control-input:checked ~ .custom-control-label .badge-secondary {
    display: none;
}

.custom-switch .custom-control-input:not(:checked) ~ .custom-control-label .badge-success {
    display: none;
}

/* Hover effect for table rows */
.table-hover tbody tr:hover {
    background-color: rgba(0, 123, 255, 0.05);
    transition: background-color 0.3s ease;
}
</style>