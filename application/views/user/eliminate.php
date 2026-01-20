<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-users text-primary"></i> <?= $title; ?>
            </h1>
            <p class="text-muted mb-0">Salam Perjuangan, <?= $user['name']; ?>!</p>
        </div>
        <div class="text-right">
            <span class="text-muted small">
                <i class="fas fa-calendar-alt"></i> <?= date('d F Y'); ?>
            </span>
        </div>
    </div>

    <!-- Statistics Cards Row -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Anggota
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= count($member); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Akun Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $active = array_filter($member, function($m) {
                                    return $m['is_active'] == 1;
                                });
                                echo count($active);
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Belum Aktivasi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $inactive = array_filter($member, function($m) {
                                    return $m['is_active'] == 0;
                                });
                                echo count($inactive);
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Bergabung Hari Ini
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $today = strtotime(date('Y-m-d 00:00:00'));
                                $today_members = array_filter($member, function($m) use ($today) {
                                    return $m['date_created'] >= $today;
                                });
                                echo count($today_members);
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <?= validation_errors(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-table"></i> Daftar Anggota Serikat Pekerja Kampus
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Opsi Tabel:</div>
                            <a class="dropdown-item" href="#" onclick="$('#eliminate').DataTable().buttons('.buttons-excel').trigger(); return false;">
                                <i class="fas fa-file-excel fa-sm fa-fw mr-2 text-success"></i> Export Excel
                            </a>
                            <a class="dropdown-item" href="#" onclick="$('#eliminate').DataTable().buttons('.buttons-pdf').trigger(); return false;">
                                <i class="fas fa-file-pdf fa-sm fa-fw mr-2 text-danger"></i> Export PDF
                            </a>
                            <a class="dropdown-item" href="#" onclick="$('#eliminate').DataTable().buttons('.buttons-print').trigger(); return false;">
                                <i class="fas fa-print fa-sm fa-fw mr-2 text-gray-400"></i> Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        <i class="fas fa-info-circle"></i>
                        <strong>Info:</strong> Klik tombol <strong>Hapus</strong> untuk menghapus anggota dari sistem.
                        Gunakan fitur pencarian dan filter untuk menemukan anggota tertentu.
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="eliminate" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th width="3%" class="text-center">#</th>
                                    <th width="8%"><i class="fas fa-id-card"></i> No. Anggota</th>
                                    <th width="8%"><i class="fas fa-calendar"></i> Tgl Bergabung</th>
                                    <th width="10%"><i class="fas fa-envelope"></i> Email</th>
                                    <th width="10%"><i class="fas fa-user"></i> Nama</th>
                                    <th width="5%"><i class="fas fa-venus-mars"></i> Gender</th>
                                    <th width="6%"><i class="fas fa-toggle-on"></i> Status Akun</th>
                                    <th width="6%"><i class="fas fa-user-tag"></i> Peran</th>
                                    <th width="10%"><i class="fas fa-university"></i> Kampus</th>
                                    <th width="8%"><i class="fas fa-graduation-cap"></i> Prodi</th>
                                    <th width="10%"><i class="fas fa-map-marker-alt"></i> Alamat</th>
                                    <th width="8%"><i class="fas fa-phone"></i> Kontak</th>
                                    <th width="7%"><i class="fas fa-briefcase"></i> Status</th>
                                    <th width="10%"><i class="fas fa-building"></i> Pemberi Gaji</th>
                                    <th width="7%"><i class="fas fa-money-bill-wave"></i> Gaji</th>
                                    <th width="8%"><i class="fas fa-map"></i> Wilayah</th>
                                    <th width="10%"><i class="fas fa-tools"></i> Keahlian</th>
                                    <th width="10%"><i class="fas fa-comment"></i> Motivasi</th>
                                    <th width="6%" class="text-center"><i class="fas fa-cog"></i> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($member as $me) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <span class="badge badge-secondary"><?= $i; ?></span>
                                        </td>
                                        <td><code><?= $me['date_created']; ?></code></td>
                                        <td>
                                            <small><?= date('d M Y', $me['date_created']); ?></small>
                                        </td>
                                        <td>
                                            <small><?= $me['email']; ?></small>
                                        </td>
                                        <td><strong><?= $me['name']; ?></strong></td>
                                        <td>
                                            <?php if ($me['gender'] == 'laki-laki'): ?>
                                                <span class="badge badge-info">
                                                    <i class="fas fa-mars"></i> L
                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-pink" style="background-color: #e83e8c; color: white;">
                                                    <i class="fas fa-venus"></i> P
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($me['is_active'] == 1): ?>
                                                <span class="badge badge-success">
                                                    <i class="fas fa-check-circle"></i> Aktif
                                                </span>
                                            <?php else: ?>
                                                <span class="badge badge-warning">
                                                    <i class="fas fa-clock"></i> Pending
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary">
                                                <?= $me['role']; ?>
                                            </span>
                                        </td>
                                        <td><small><?= $me['kampus']; ?></small></td>
                                        <td><small><?= $me['prodi']; ?></small></td>
                                        <td><small><?= substr($me['alamat'], 0, 30) . (strlen($me['alamat']) > 30 ? '...' : ''); ?></small></td>
                                        <td>
                                            <?php if (!empty($me['telp'])): ?>
                                                <a href="https://wa.me/<?= $me['telp']; ?>"
                                                   target="_blank"
                                                   class="btn btn-success btn-sm"
                                                   title="Chat via WhatsApp">
                                                    <i class="fab fa-whatsapp"></i> <?= $me['telp']; ?>
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><small><?= $me['status']; ?></small></td>
                                        <td><small><?= $me['employer']; ?></small></td>
                                        <td>
                                            <?php if (!empty($me['gaji'])): ?>
                                                <span class="badge badge-secondary">
                                                    Rp <?= number_format($me['gaji'], 0, ',', '.'); ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><small><?= $me['wilayah']; ?></small></td>
                                        <td><small><?= substr($me['keahlian'], 0, 30) . (strlen($me['keahlian']) > 30 ? '...' : ''); ?></small></td>
                                        <td><small><?= substr($me['personal'], 0, 30) . (strlen($me['personal']) > 30 ? '...' : ''); ?></small></td>
                                        <td class="text-center">
                                            <button type="button"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete('<?= $me['id']; ?>', '<?= htmlspecialchars($me['name']); ?>')"
                                                    title="Hapus Anggota">
                                                <i class="fas fa-trash-alt"></i>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="fas fa-user-times fa-4x text-danger"></i>
                </div>
                <p class="text-center">
                    Apakah Anda yakin ingin menghapus anggota <strong id="memberName"></strong> dari sistem?
                </p>
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <strong>Perhatian:</strong> Tindakan ini tidak dapat dibatalkan!
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Batal
                </button>
                <a id="deleteBtn" href="#" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Ya, Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, name) {
    $('#memberName').text(name);
    $('#deleteBtn').attr('href', '<?= base_url('admin/hapus/'); ?>' + id);
    $('#deleteModal').modal('show');
}
</script>