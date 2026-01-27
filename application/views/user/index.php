<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div>
            <h1 class="h4 mb-1 text-gray-800 font-weight-bold">
                <i class="fas fa-user-circle text-primary"></i> Profil Saya
            </h1>
            <p class="text-muted mb-0 small">
                <i class="fas fa-hand-sparkles"></i> Salam Perjuangan, <strong><?= $user['name']; ?></strong>!
            </p>
        </div>
        <div class="text-right d-none d-sm-block">
            <span class="text-muted small">
                <i class="fas fa-calendar-alt"></i> <?= date('d F Y'); ?>
            </span>
        </div>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <!-- Main Profile Card -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-3 p-md-4">
            <div class="row">

                <!-- Left Sidebar -->
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <!-- Profile Card -->
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body text-center p-3">
                            <div class="position-relative d-inline-block mb-2">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
                                     alt="Profile"
                                     class="img-thumbnail rounded-circle shadow-sm"
                                     style="width: 100px; height: 100px; object-fit: cover;">
                                <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1 border border-white" style="width: 20px; height: 20px;">
                                    <i class="fas fa-circle text-white" style="font-size: 10px;"></i>
                                </span>
                            </div>

                            <h6 class="mb-0 font-weight-bold"><?= $user['name']; ?></h6>
                            <p class="text-muted mb-2" style="font-size: 0.75rem;">
                                Bergabung <?= date('d M Y', $user['date_created']); ?>
                            </p>

                            <?php foreach ($peran as $peran_pengguna) : ?>
                                <span class="badge badge-success mb-2"><?= $peran_pengguna['role']; ?></span>
                            <?php endforeach; ?>

                            <?php if (!isset($peran_pengguna) || empty($peran_pengguna) || $peran_pengguna['role'] == 'Calon Anggota') { ?>
                                <a href="<?= base_url('user/formulir'); ?>" class="btn btn-danger btn-sm btn-block mb-2">
                                    <i class="fas fa-user-plus"></i> Mendaftar
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url('user/edit'); ?>" class="btn btn-primary btn-sm btn-block mb-2">
                                    <i class="fas fa-edit"></i> Lengkapi Profil
                                </a>
                            <?php } ?>

                            <hr class="my-2">

                            <div class="row text-center no-gutters">
                                <div class="col-6 border-right">
                                    <small class="text-muted d-block" style="font-size: 0.7rem;">Gender</small>
                                    <?php if ($user['gender'] == 'laki-laki'): ?>
                                        <span class="badge badge-info badge-sm">
                                            <i class="fas fa-mars"></i>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-sm" style="background-color: #e83e8c; color: white;">
                                            <i class="fas fa-venus"></i>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted d-block" style="font-size: 0.7rem;">Status</small>
                                    <span class="badge badge-primary badge-sm" style="font-size: 0.65rem;"><?= $user['status']; ?></span>
                                </div>
                            </div>

                            <hr class="my-2">

                            <div class="social-links">
                                <small class="text-muted d-block mb-2" style="font-size: 0.75rem;">Media Sosial</small>
                                <div class="d-flex justify-content-center">
                                    <?php if (!empty($user['facebook'])): ?>
                                        <a href="<?= $user['facebook']; ?>" target="_blank" class="btn btn-primary btn-sm rounded-circle mx-1 p-1" title="Facebook" style="width: 30px; height: 30px; line-height: 18px;">
                                            <i class="fab fa-facebook-f" style="font-size: 0.75rem;"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($user['twitter'])): ?>
                                        <a href="<?= $user['twitter']; ?>" target="_blank" class="btn btn-info btn-sm rounded-circle mx-1 p-1" title="Twitter" style="width: 30px; height: 30px; line-height: 18px;">
                                            <i class="fab fa-twitter" style="font-size: 0.75rem;"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($user['linkedin'])): ?>
                                        <a href="<?= $user['linkedin']; ?>" target="_blank" class="btn btn-primary btn-sm rounded-circle mx-1 p-1" title="LinkedIn" style="width: 30px; height: 30px; line-height: 18px;">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($user['instagram'])): ?>
                                        <a href="<?= $user['instagram']; ?>" target="_blank" class="btn btn-danger btn-sm rounded-circle mx-1 p-1" title="Instagram" style="width: 30px; height: 30px; line-height: 18px;">
                                            <i class="fab fa-instagram" style="font-size: 0.75rem;"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Info Card -->
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body p-3">
                            <h6 class="font-weight-bold mb-2" style="font-size: 0.85rem;">
                                <i class="fas fa-quote-left text-primary"></i> Bio
                            </h6>
                            <p class="text-muted font-italic mb-2" style="font-size: 0.75rem;">"<?= $user['personal']; ?>"</p>

                            <hr class="my-2">

                            <div class="mb-2">
                                <small class="text-muted d-block" style="font-size: 0.7rem;">Kampus</small>
                                <h6 class="mb-0" style="font-size: 0.8rem;"><?= $user['kampus']; ?></h6>
                                <small style="font-size: 0.7rem;"><?= $user['prodi']; ?></small>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted d-block" style="font-size: 0.7rem;">Email</small>
                                <h6 class="mb-0" style="font-size: 0.75rem; word-break: break-all;"><?= $user['email']; ?></h6>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted d-block" style="font-size: 0.7rem;">Telepon</small>
                                <h6 class="mb-0" style="font-size: 0.8rem;"><?= $user['telp']; ?></h6>
                            </div>

                            <div>
                                <small class="text-muted d-block" style="font-size: 0.7rem;">Alamat</small>
                                <p class="mb-0" style="font-size: 0.75rem;"><?= $user['alamat']; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Skills Card -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-3">
                            <h6 class="font-weight-bold mb-2" style="font-size: 0.85rem;">
                                <i class="fas fa-tools text-primary"></i> Keahlian
                            </h6>
                            <div class="d-flex flex-wrap">
                                <?php
                                if (isset($user['keahlian']) && !empty($user['keahlian'])) {
                                    $keahlian_array = explode(';', $user['keahlian']);
                                    foreach ($keahlian_array as $keahlian) {
                                        $keahlian = trim($keahlian);
                                        if (!empty($keahlian)) {
                                            echo '<span class="badge badge-primary m-1" style="font-size: 0.7rem;">' . $keahlian . '</span>';
                                        }
                                    }
                                } else {
                                    echo '<p class="text-muted mb-0" style="font-size: 0.75rem;">Belum ada keahlian.</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9">
                    <!-- Statistics Cards -->
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-6 mb-2">
                            <div class="card border-left-primary shadow-sm h-100 hover-shadow">
                                <div class="card-body p-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <i class="fas fa-id-card fa-2x text-primary"></i>
                                        </div>
                                        <div class="col-9 pl-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-0" style="font-size: 0.65rem;">
                                                Nomor Anggota
                                            </div>
                                            <?php if (!isset($peran_pengguna) || empty($peran_pengguna) || $peran_pengguna['role'] == 'Calon Anggota') { ?>
                                                <small class="text-muted" style="font-size: 0.7rem;">Belum terdaftar</small>
                                            <?php } else { ?>
                                                <div class="h6 mb-0 font-weight-bold text-gray-800" style="font-size: 0.9rem;">
                                                    <?= $user['date_created']; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-2">
                            <div class="card border-left-success shadow-sm h-100 hover-shadow">
                                <div class="card-body p-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <i class="fas fa-calendar-check fa-2x text-success"></i>
                                        </div>
                                        <div class="col-9 pl-2">
                                            <div class="font-weight-bold text-success text-uppercase mb-0" style="font-size: 0.65rem;">
                                                Bergabung
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800" style="font-size: 0.8rem;">
                                                <?= date('d M Y', $user['date_created']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-2">
                            <div class="card border-left-info shadow-sm h-100 hover-shadow">
                                <div class="card-body p-2">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-3 text-center">
                                            <i class="fas fa-map-marked-alt fa-2x text-info"></i>
                                        </div>
                                        <div class="col-9 pl-2">
                                            <div class="font-weight-bold text-info text-uppercase mb-0" style="font-size: 0.65rem;">
                                                Wilayah
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800" style="font-size: 0.8rem;">
                                                <?= $user['wilayah']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabs Navigation -->
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white p-2">
                            <ul class="nav nav-tabs card-header-tabs mb-0" id="profileTabs" role="tablist">
                                <li class="nav-item flex-fill" role="presentation">
                                    <a class="nav-link text-center py-2 <?= ($active_tab == 'info') ? 'active' : ''; ?>"
                                       id="info-tab"
                                       data-bs-toggle="tab"
                                       href="#info"
                                       role="tab"
                                       style="font-size: 0.8rem;">
                                        <i class="fas fa-info-circle d-block d-sm-inline"></i>
                                        <span class="d-none d-sm-inline">Informasi</span>
                                        <span class="d-inline d-sm-none" style="font-size: 0.7rem;">Info</span>
                                    </a>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <a class="nav-link text-center py-2 <?= ($active_tab == 'userdetail') ? 'active' : ''; ?>"
                                       id="userdetail-tab"
                                       data-bs-toggle="tab"
                                       href="#userdetail"
                                       role="tab"
                                       style="font-size: 0.8rem;">
                                        <i class="fas fa-user-alt d-block d-sm-inline"></i>
                                        <span class="d-none d-sm-inline">Detail</span>
                                        <span class="d-inline d-sm-none" style="font-size: 0.7rem;">Detail</span>
                                    </a>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <a class="nav-link text-center py-2 <?= ($active_tab == 'benefit') ? 'active' : ''; ?>"
                                       id="benefit-tab"
                                       data-bs-toggle="tab"
                                       href="#benefit"
                                       role="tab"
                                       style="font-size: 0.8rem;">
                                        <i class="fas fa-gift d-block d-sm-inline"></i>
                                        <span class="d-none d-sm-inline">Manfaat</span>
                                        <span class="d-inline d-sm-none" style="font-size: 0.7rem;">Benefit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body p-2 p-md-3">
                            <div class="tab-content" id="profileTabsContent">

                                <!-- Tab Informasi -->
                                <div class="tab-pane fade <?= ($active_tab == 'info') ? 'show active' : ''; ?>"
                                     id="info"
                                     role="tabpanel">

                                    <!-- Pembayaran Iuran Card -->
                                    <div class="card border-primary mb-3">
                                        <div class="card-header bg-primary text-white py-2">
                                            <h6 class="mb-0" style="font-size: 0.9rem;">
                                                <i class="fas fa-money-check-alt"></i> Pembayaran Iuran
                                            </h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4 text-center mb-3 mb-md-0">
                                                    <img src="<?= base_url('assets/img/qr/confirm.png') ?>"
                                                         class="img-fluid rounded shadow-sm"
                                                         style="cursor: pointer; max-width: 150px;"
                                                         data-toggle="modal"
                                                         data-target="#qrModal">
                                                    <p class="text-muted mb-0" style="font-size: 0.7rem;">Klik untuk perbesar</p>
                                                </div>
                                                <div class="col-md-9 col-sm-8">
                                                    <?php if (isset($iuran) && !empty($iuran)) { ?>
                                                        <div class="alert alert-info py-2 mb-2">
                                                            <h6 class="mb-0" style="font-size: 0.9rem;"><i class="fas fa-coins"></i> Iuran: <strong><?= $iuran['iuran']; ?> /bulan</strong></h6>
                                                        </div>
                                                        <p class="mb-2" style="font-size: 0.85rem;">Metode pembayaran:</p>
                                                        <ul class="list-unstyled mb-2" style="font-size: 0.8rem;">
                                                            <li class="mb-1"><i class="fas fa-qrcode text-primary"></i> <strong>QRIS</strong> (Scan QR)</li>
                                                            <li class="mb-1"><i class="fas fa-university text-primary"></i> <strong>Bank BNI</strong></li>
                                                        </ul>
                                                        <div class="card bg-light mb-2">
                                                            <div class="card-body py-2 px-3">
                                                                <p class="mb-0" style="font-size: 0.8rem;"><strong>No. Rek: 19 2726 8812</strong></p>
                                                                <p class="mb-0 text-muted" style="font-size: 0.7rem;">a.n. Dosen Tendik PT</p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $whatsapp_number = '6285222444700';
                                                        $iuran_amount = $iuran['iuran'];
                                                        $user_name = $user['name'];
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-sm-6 mb-2">
                                                                <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp_number ?>&text=<?= urlencode("Salam perjuangan! Saya $user_name, telah melakukan pembayaran Iuran Anggota SPK, sebesar $iuran_amount") ?>"
                                                                   target="_blank"
                                                                   class="btn btn-success btn-sm btn-block">
                                                                    <i class="fab fa-whatsapp"></i> Konfirmasi
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-6 mb-2">
                                                                <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp_number ?>&text=<?= urlencode("Salam perjuangan! Saya $user_name, menyatakan keberatan membayar Iuran Anggota SPK, sebesar $iuran_amount. Mohon kebijaksanaannya!") ?>"
                                                                   target="_blank"
                                                                   class="btn btn-outline-danger btn-sm btn-block">
                                                                    <i class="fas fa-exclamation-circle"></i> Keberatan
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-warning py-2 mb-0">
                                                            <h6 style="font-size: 0.9rem;"><i class="fas fa-info-circle"></i> Data iuran tidak ditemukan</h6>
                                                            <p class="mb-2" style="font-size: 0.8rem;">Isi formulir pendaftaran!</p>
                                                            <a href="<?= base_url('user/formulir'); ?>" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-edit"></i> Isi Formulir
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Informasi Terbaru -->
                                    <?php if ($user['role_id'] != 2) : ?>
                                        <h6 class="font-weight-bold mb-2 mt-3" style="font-size: 0.95rem;">
                                            <i class="fas fa-bullhorn text-primary"></i> Informasi Terbaru
                                        </h6>
                                        <?php foreach ($recent_information as $info) : ?>
                                            <div class="card shadow-sm mb-2 border-0 hover-shadow">
                                                <div class="row g-0">
                                                    <div class="col-md-3 col-4">
                                                        <?php if ($info['gambar']) : ?>
                                                            <img src="<?= base_url('assets/img/info/' . $info['gambar']); ?>"
                                                                 class="img-fluid rounded-left"
                                                                 style="object-fit: cover; height: 100%; min-height: 100px; max-height: 150px;"
                                                                 alt="Info">
                                                        <?php else : ?>
                                                            <div class="bg-light d-flex align-items-center justify-content-center rounded-left" style="height: 100%; min-height: 100px;">
                                                                <i class="fas fa-image fa-2x text-muted"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-9 col-8">
                                                        <div class="card-body p-2">
                                                            <h6 class="card-title mb-1" style="font-size: 0.85rem;">
                                                                <?= $info['judul']; ?>
                                                            </h6>
                                                            <p class="card-text mb-2" style="font-size: 0.75rem;">
                                                                <?= nl2br(substr($info['info'], 0, 100)) . '...'; ?>
                                                            </p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <small class="text-muted" style="font-size: 0.7rem;">
                                                                    <i class="fas fa-clock"></i> <?= date('d M Y', strtotime($info['created_at'] ?? 'now')); ?>
                                                                </small>
                                                                <button type="button"
                                                                        class="btn btn-primary btn-sm"
                                                                        style="font-size: 0.7rem; padding: 0.2rem 0.5rem;"
                                                                        data-toggle="modal"
                                                                        data-target="#infoModal<?= $info['id']; ?>">
                                                                    <i class="fas fa-book-open"></i> Baca Selengkapnya
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal untuk Informasi Lengkap -->
                                            <div class="modal fade" id="infoModal<?= $info['id']; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title">
                                                                <i class="fas fa-bullhorn"></i> <?= $info['judul']; ?>
                                                            </h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php if ($info['gambar']) : ?>
                                                                <div class="text-center mb-3">
                                                                    <img src="<?= base_url('assets/img/info/' . $info['gambar']); ?>"
                                                                         class="img-fluid rounded shadow"
                                                                         style="max-height: 400px; object-fit: contain;"
                                                                         alt="<?= $info['judul']; ?>">
                                                                </div>
                                                            <?php endif; ?>

                                                            <div class="mb-3">
                                                                <small class="text-muted">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                    <?= date('l, d F Y', strtotime($info['created_at'] ?? 'now')); ?>
                                                                </small>
                                                            </div>

                                                            <div class="info-content" style="line-height: 1.8; text-align: justify;">
                                                                <?= nl2br($info['info']); ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                                                <i class="fas fa-times"></i> Tutup
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="alert alert-info text-center">
                                            <i class="fas fa-edit fa-3x mb-3"></i>
                                            <h5>Lengkapi Profil Anda</h5>
                                            <p>Silakan isi formulir pendaftaran untuk mengakses fitur lengkap</p>
                                            <a href="<?= base_url('user/formulir'); ?>" class="btn btn-info">
                                                <i class="fas fa-wpforms"></i> Isi Formulir Pendaftaran
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Tab Detail -->
                                <div class="tab-pane fade <?= ($active_tab == 'userdetail') ? 'show active' : ''; ?>"
                                     id="userdetail"
                                     role="tabpanel">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 text-center mb-3">
                                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
                                                         class="img-thumbnail rounded shadow">
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 class="mb-3"><?= $user['name'] ?></h4>
                                                    <p class="text-muted"><?= $user['email'] ?></p>

                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td width="40%"><strong>Nomor Anggota</strong></td>
                                                                <td>
                                                                    <?php if (!isset($peran_pengguna) || empty($peran_pengguna) || $peran_pengguna['role'] == 'Calon Anggota') { ?>
                                                                        <span class="text-muted">Belum terdaftar</span>
                                                                    <?php } else { ?>
                                                                        <code><?= $user['date_created']; ?></code>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Bergabung Sejak</strong></td>
                                                                <td><?= date('d F Y', $user['date_created']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Jenis Kelamin</strong></td>
                                                                <td><?= ucfirst($user['gender']); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Alamat</strong></td>
                                                                <td><?= $user['alamat'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Nomor Telepon</strong></td>
                                                                <td><?= $user['telp'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Asal Kampus</strong></td>
                                                                <td><?= $user['kampus'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Program Studi</strong></td>
                                                                <td><?= $user['prodi'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Status</strong></td>
                                                                <td><span class="badge badge-primary"><?= $user['status'] ?></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Pemberi Upah</strong></td>
                                                                <td><?= $user['employer'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Rentang Gaji</strong></td>
                                                                <td><?= $user['gaji'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Wilayah</strong></td>
                                                                <td><?= $user['wilayah'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Bidang Keahlian</strong></td>
                                                                <td><?= $user['keahlian'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab Benefit -->
                                <div class="tab-pane fade <?= ($active_tab == 'benefit') ? 'show active' : ''; ?>"
                                     id="benefit"
                                     role="tabpanel">
                                    <div class="card border-success">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="mb-0">
                                                <i class="fas fa-award"></i> Manfaat Keanggotaan SPK
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="lead">Menjadi anggota Serikat Pekerja Kampus (SPK) adalah kontribusi penting pekerja kampus untuk memperjuangkan kesejahteraan yang layak dan membangun kondisi kerja yang baik.</p>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100 border-primary">
                                                        <div class="card-body">
                                                            <h5><i class="fas fa-gavel text-primary"></i> 1. Konsultasi Hukum</h5>
                                                            <p>SPK memberikan bantuan konsultasi hukum dan pendampingan secara pro bono atas sengketa terkait masalah kerja.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100 border-info">
                                                        <div class="card-body">
                                                            <h5><i class="fas fa-building text-info"></i> 2. Perwakilan Kampus</h5>
                                                            <p>SPK memiliki perwakilan di berbagai perguruan tinggi negeri dan swasta untuk mewakili anggota.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100 border-success">
                                                        <div class="card-body">
                                                            <h5><i class="fas fa-users text-success"></i> 3. Aspirasi Kolektif</h5>
                                                            <p>Aspirasi anggota diperjuangkan melalui negosiasi dengan pengelola perguruan tinggi secara kolektif.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <div class="card h-100 border-warning">
                                                        <div class="card-body">
                                                            <h5><i class="fas fa-info-circle text-warning"></i> 4. Informasi Terkini</h5>
                                                            <p>Anggota mendapatkan informasi terkini atas kegiatan dan agenda SPK secara rutin.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <div class="card h-100 border-danger">
                                                        <div class="card-body">
                                                            <h5><i class="fas fa-gift text-danger"></i> 5. Akses Kegiatan & Merchandise</h5>
                                                            <p>Anggota dapat terlibat aktif dalam kegiatan SPK dan mendapatkan discount untuk pembelian merchandise.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel SPK -->
                    <div class="card shadow-sm border-0 mt-4">
                        <div class="card-header bg-white">
                            <h5 class="mb-0">
                                <i class="fas fa-newspaper"></i> Artikel Serikat Pekerja Kampus
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><i class="fas fa-heading"></i> Judul</th>
                                            <th><i class="fas fa-calendar"></i> Tanggal</th>
                                            <th><i class="fas fa-user"></i> Penulis</th>
                                            <th><i class="fas fa-tag"></i> Jenis</th>
                                            <th class="text-center"><i class="fas fa-eye"></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        function compareTime($a, $b) {
                                            return strtotime($b['waktu_posting']) - strtotime($a['waktu_posting']);
                                        }
                                        usort($user_posts, 'compareTime');

                                        if (!empty($user_posts)) :
                                            foreach ($user_posts as $posting) : ?>
                                                <tr>
                                                    <td><strong><?= $posting['judul_tulisan'] ?></strong></td>
                                                    <td><small><?= date('d M Y', strtotime($posting['waktu_posting'])); ?></small></td>
                                                    <td><?= $posting['penulis'] ?></td>
                                                    <td><span class="badge badge-secondary"><?= $posting['jenis_tulisan'] ?></span></td>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('post/view/' . $posting['slug']); ?>"
                                                           target="_blank"
                                                           class="btn btn-primary btn-sm">
                                                            <i class="fas fa-book-open"></i> Baca
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                        else : ?>
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">
                                                    <i class="fas fa-inbox fa-3x mb-2"></i>
                                                    <p>Tidak ada artikel saat ini.</p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- QR Code Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-qrcode"></i> Scan QRIS untuk Pembayaran
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="<?= base_url('assets/img/qr/confirm.png') ?>" class="img-fluid shadow">
                <p class="mt-3 text-muted">Scan QR Code menggunakan aplikasi pembayaran digital Anda</p>
            </div>
        </div>
    </div>
</div>

<style>
/* Hover Effects */
.hover-shadow {
    transition: all 0.3s ease;
}

.hover-shadow:hover {
    transform: translateY(-3px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

/* Card Transitions */
.card {
    transition: all 0.3s ease;
}

/* Social Links Hover */
.social-links a {
    transition: all 0.3s ease;
}

.social-links a:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Tab Navigation */
.nav-tabs .nav-link {
    border: none;
    color: #6c757d;
    transition: all 0.3s ease;
}

.nav-tabs .nav-link:hover {
    background-color: #f8f9fa;
    color: #4e73df;
}

.nav-tabs .nav-link.active {
    background-color: #4e73df;
    color: white !important;
    border-radius: 0.25rem 0.25rem 0 0;
}

/* Responsive Image */
@media (max-width: 768px) {
    .avatar-xl {
        width: 80px !important;
        height: 80px !important;
    }

    .fa-3x {
        font-size: 2em !important;
    }

    .fa-2x {
        font-size: 1.5em !important;
    }
}

/* Button Animations */
.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

.btn:active {
    transform: translateY(0);
}

/* Badge Styling */
.badge {
    transition: all 0.2s ease;
}

.badge:hover {
    transform: scale(1.05);
}

/* Card Info Box */
.card.border-primary,
.card.border-success,
.card.border-info,
.card.border-warning,
.card.border-danger {
    border-width: 0 0 0 4px !important;
}

/* Smooth Scroll */
html {
    scroll-behavior: smooth;
}

/* Loading Animation for Images */
img {
    transition: opacity 0.3s ease;
}

img:not([src]) {
    opacity: 0;
}

/* Compact Table */
.table-hover tbody tr {
    transition: all 0.2s ease;
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa;
    transform: scale(1.01);
}

/* Info Card Hover Effect - minimal to prevent flash */
.hover-shadow {
    transition: box-shadow 0.2s ease;
}

.hover-shadow:hover {
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.15) !important;
}

/* Disable hover on info cards to prevent modal trigger issues */
.hover-shadow:active {
    transform: none !important;
}

/* Modal Styling */
.modal-content {
    border-radius: 0.5rem;
    border: none;
}

.modal-header {
    border-radius: 0.5rem 0.5rem 0 0;
    border-bottom: 2px solid rgba(255, 255, 255, 0.2);
}

.modal-body {
    max-height: calc(100vh - 210px);
}

.info-content {
    font-size: 1rem;
    color: #333;
}

.info-content p {
    margin-bottom: 1rem;
}

/* Disable ALL hover effects inside modal to prevent flash */
.modal * {
    transition: none !important;
    transform: none !important;
}

.modal img,
.modal .card,
.modal .btn,
.modal .badge {
    transition: none !important;
    transform: none !important;
}

.modal img:hover,
.modal .card:hover,
.modal .btn:hover,
.modal .badge:hover {
    transform: none !important;
    box-shadow: none !important;
}

/* Prevent modal backdrop flash */
.modal-backdrop {
    transition: opacity 0.15s linear !important;
}

.modal.fade .modal-dialog {
    transition: transform 0.3s ease-out !important;
}

/* Keep modal stable */
.modal.show {
    display: block !important;
}

.modal.show .modal-dialog {
    transform: none !important;
}

/* Button Hover in Info Card */
.card .btn-primary:hover {
    transform: scale(1.05);
    box-shadow: 0 2px 6px rgba(78, 115, 223, 0.4);
}

/* Mobile Optimizations */
@media (max-width: 576px) {
    .container-fluid {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .card-body {
        padding: 0.75rem !important;
    }

    h1, .h1 {
        font-size: 1.5rem !important;
    }

    h2, .h2 {
        font-size: 1.3rem !important;
    }

    h3, .h3 {
        font-size: 1.1rem !important;
    }

    .btn-block {
        font-size: 0.85rem;
        padding: 0.5rem;
    }

    .modal-dialog {
        margin: 0.5rem;
    }

    .info-content {
        font-size: 0.9rem;
    }
}

.social-links .btn {
    width: 35px;
    height: 35px;
    padding: 0;
    line-height: 35px;
}

.card {
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-2px);
}

.nav-tabs .nav-link {
    color: #6c757d;
}

.nav-tabs .nav-link.active {
    color: #4e73df;
    font-weight: bold;
}
</style>

<script>
// Prevent modal flash issue - simplified and stable
$(document).ready(function() {
    // Remove all previous event handlers to prevent conflicts
    $('[data-toggle="modal"]').off('click');
    $('.modal').off('shown.bs.modal hidden.bs.modal');

    // Simple click handler - let Bootstrap handle the rest
    $('[data-toggle="modal"]').on('click', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        var targetModal = $(this).attr('data-target');
        $(targetModal).modal('show');
        return false;
    });

    // Clean up after modal closes
    $('.modal').on('hidden.bs.modal', function (e) {
        e.stopPropagation();
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open').css('padding-right', '');
    });

    // Prevent mouse events from interfering with modal
    $('.modal').on('mouseenter mouseleave mousemove', function(e) {
        e.stopPropagation();
    });
});
</script>

</div>
<!-- End of Main Content -->
