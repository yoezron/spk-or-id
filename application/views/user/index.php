<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">
                <i class="fas fa-user-circle text-primary"></i> Profil Saya
            </h1>
            <p class="text-muted mb-0">
                <i class="fas fa-hand-sparkles"></i> Salam Perjuangan, <strong><?= $user['name']; ?></strong>!
            </p>
        </div>
        <div class="text-right">
            <span class="text-muted small">
                <i class="fas fa-calendar-alt"></i> <?= date('d F Y'); ?>
            </span>
        </div>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <!-- Main Profile Card -->
    <div class="card shadow mb-4">
        <div class="card-body p-4">
            <div class="row">

                <!-- Left Sidebar -->
                <div class="col-lg-3">
                    <!-- Profile Card -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body text-center">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
                                     alt="Profile"
                                     class="avatar-xl img-thumbnail rounded-circle shadow">
                                <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-white">
                                    <i class="fas fa-circle text-white fa-xs"></i>
                                </span>
                            </div>

                            <h5 class="mb-1 font-weight-bold"><?= $user['name']; ?></h5>
                            <p class="text-muted mb-2">
                                <small>Bergabung sejak<br><?= date('d F Y', $user['date_created']); ?></small>
                            </p>

                            <?php foreach ($peran as $peran_pengguna) : ?>
                                <span class="badge badge-success mb-2"><?= $peran_pengguna['role']; ?></span>
                            <?php endforeach; ?>

                            <?php if (!isset($peran_pengguna) || empty($peran_pengguna) || $peran_pengguna['role'] == 'Calon Anggota') { ?>
                                <a href="<?= base_url('user/formulir'); ?>" class="btn btn-danger btn-sm btn-block">
                                    <i class="fas fa-user-plus"></i> Mendaftar
                                </a>
                            <?php } else { ?>
                                <a href="<?= base_url('user/edit'); ?>" class="btn btn-primary btn-sm btn-block">
                                    <i class="fas fa-edit"></i> Lengkapi Profil
                                </a>
                            <?php } ?>

                            <hr>

                            <div class="row text-center">
                                <div class="col-6">
                                    <h6 class="text-muted small">Jenis Kelamin</h6>
                                    <?php if ($user['gender'] == 'laki-laki'): ?>
                                        <span class="badge badge-info">
                                            <i class="fas fa-mars"></i> Laki-laki
                                        </span>
                                    <?php else: ?>
                                        <span class="badge" style="background-color: #e83e8c; color: white;">
                                            <i class="fas fa-venus"></i> Perempuan
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-muted small">Status</h6>
                                    <span class="badge badge-primary"><?= $user['status']; ?></span>
                                </div>
                            </div>

                            <hr>

                            <div class="social-links">
                                <h6 class="text-muted mb-3">Media Sosial</h6>
                                <div class="d-flex justify-content-center">
                                    <?php if (!empty($user['facebook'])): ?>
                                        <a href="<?= $user['facebook']; ?>" target="_blank" class="btn btn-primary btn-sm rounded-circle mx-1" title="Facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($user['twitter'])): ?>
                                        <a href="<?= $user['twitter']; ?>" target="_blank" class="btn btn-info btn-sm rounded-circle mx-1" title="Twitter">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($user['linkedin'])): ?>
                                        <a href="<?= $user['linkedin']; ?>" target="_blank" class="btn btn-primary btn-sm rounded-circle mx-1" title="LinkedIn">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($user['instagram'])): ?>
                                        <a href="<?= $user['instagram']; ?>" target="_blank" class="btn btn-danger btn-sm rounded-circle mx-1" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Description Card -->
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <h6 class="font-weight-bold mb-3">
                                <i class="fas fa-quote-left text-primary"></i> Deskripsi Personal
                            </h6>
                            <p class="text-muted small font-italic">"<?= $user['personal']; ?>"</p>

                            <hr>

                            <div class="mb-3">
                                <small class="text-muted">Asal Kampus</small>
                                <h6 class="mb-0"><?= $user['kampus']; ?></h6>
                                <small><?= $user['prodi']; ?></small>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">Email</small>
                                <h6 class="mb-0 small"><?= $user['email']; ?></h6>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">Telepon</small>
                                <h6 class="mb-0"><?= $user['telp']; ?></h6>
                            </div>

                            <div>
                                <small class="text-muted">Alamat</small>
                                <p class="mb-0 small"><?= $user['alamat']; ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Skills Card -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h6 class="font-weight-bold mb-3">
                                <i class="fas fa-tools text-primary"></i> Keahlian Saya
                            </h6>
                            <div class="d-flex flex-wrap">
                                <?php
                                if (isset($user['keahlian']) && !empty($user['keahlian'])) {
                                    $keahlian_array = explode(';', $user['keahlian']);
                                    foreach ($keahlian_array as $keahlian) {
                                        $keahlian = trim($keahlian);
                                        if (!empty($keahlian)) {
                                            echo '<span class="badge badge-primary m-1">' . $keahlian . '</span>';
                                        }
                                    }
                                } else {
                                    echo '<p class="text-muted small">Belum ada keahlian yang ditambahkan.</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9">
                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <div class="card border-left-primary shadow-sm h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <i class="fas fa-id-card fa-3x text-primary"></i>
                                        </div>
                                        <div class="col-9">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nomor Anggota
                                            </div>
                                            <?php if (!isset($peran_pengguna) || empty($peran_pengguna) || $peran_pengguna['role'] == 'Calon Anggota') { ?>
                                                <small class="text-muted">Belum terdaftar</small>
                                            <?php } else { ?>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= $user['date_created']; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card border-left-success shadow-sm h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <i class="fas fa-calendar-check fa-3x text-success"></i>
                                        </div>
                                        <div class="col-9">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tanggal Bergabung
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <?= date('d M Y', $user['date_created']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="card border-left-info shadow-sm h-100">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <i class="fas fa-map-marked-alt fa-3x text-info"></i>
                                        </div>
                                        <div class="col-9">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Wilayah
                                            </div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
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
                        <div class="card-header bg-white">
                            <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link <?= ($active_tab == 'info') ? 'active' : ''; ?>"
                                       id="info-tab"
                                       data-bs-toggle="tab"
                                       href="#info"
                                       role="tab">
                                        <i class="fas fa-info-circle"></i> Informasi
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link <?= ($active_tab == 'userdetail') ? 'active' : ''; ?>"
                                       id="userdetail-tab"
                                       data-bs-toggle="tab"
                                       href="#userdetail"
                                       role="tab">
                                        <i class="fas fa-user-alt"></i> Detail
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link <?= ($active_tab == 'benefit') ? 'active' : ''; ?>"
                                       id="benefit-tab"
                                       data-bs-toggle="tab"
                                       href="#benefit"
                                       role="tab">
                                        <i class="fas fa-gift"></i> Manfaat
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content" id="profileTabsContent">

                                <!-- Tab Informasi -->
                                <div class="tab-pane fade <?= ($active_tab == 'info') ? 'show active' : ''; ?>"
                                     id="info"
                                     role="tabpanel">

                                    <!-- Pembayaran Iuran Card -->
                                    <div class="card border-primary mb-4">
                                        <div class="card-header bg-primary text-white">
                                            <h6 class="mb-0">
                                                <i class="fas fa-money-check-alt"></i> Pembayaran Iuran Anggota
                                            </h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 text-center">
                                                    <img src="<?= base_url('assets/img/qr/confirm.png') ?>"
                                                         class="img-fluid rounded shadow-sm mb-3"
                                                         style="cursor: pointer;"
                                                         data-toggle="modal"
                                                         data-target="#qrModal">
                                                    <p class="small text-muted">Klik untuk memperbesar</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php if (isset($iuran) && !empty($iuran)) { ?>
                                                        <div class="alert alert-info">
                                                            <h5><i class="fas fa-coins"></i> Jumlah Iuran: <strong><?= $iuran['iuran']; ?> /bulan</strong></h5>
                                                        </div>
                                                        <p>Pembayaran iuran dapat melalui:</p>
                                                        <ul class="list-unstyled">
                                                            <li class="mb-2"><i class="fas fa-qrcode text-primary"></i> <strong>QRIS</strong> (Scan QR di samping)</li>
                                                            <li class="mb-2"><i class="fas fa-university text-primary"></i> <strong>Bank BNI</strong></li>
                                                        </ul>
                                                        <div class="card bg-light">
                                                            <div class="card-body">
                                                                <p class="mb-1"><strong>No. Rekening: 19 2726 8812</strong></p>
                                                                <p class="mb-0 text-muted">a.n. Dosen Tendik Perguruan Tinggi</p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $whatsapp_number = '6285222444700';
                                                        $iuran_amount = $iuran['iuran'];
                                                        $user_name = $user['name'];
                                                        ?>
                                                        <div class="mt-3">
                                                            <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp_number ?>&text=<?= urlencode("Salam perjuangan! Saya $user_name, telah melakukan pembayaran Iuran Anggota SPK, sebesar $iuran_amount") ?>"
                                                               target="_blank"
                                                               class="btn btn-success btn-block mb-2">
                                                                <i class="fab fa-whatsapp"></i> Konfirmasi Pembayaran
                                                            </a>
                                                            <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp_number ?>&text=<?= urlencode("Salam perjuangan! Saya $user_name, menyatakan keberatan membayar Iuran Anggota SPK, sebesar $iuran_amount. Mohon kebijaksanaannya!") ?>"
                                                               target="_blank"
                                                               class="btn btn-outline-danger btn-block">
                                                                <i class="fas fa-exclamation-circle"></i> Ajukan Keberatan
                                                            </a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="alert alert-warning">
                                                            <h5><i class="fas fa-info-circle"></i> Data iuran tidak ditemukan</h5>
                                                            <p>Silakan mengisi formulir pendaftaran terlebih dahulu!</p>
                                                            <a href="<?= base_url('user/formulir'); ?>" class="btn btn-primary">
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
                                        <h5 class="font-weight-bold mb-3">Informasi Terbaru</h5>
                                        <?php foreach ($recent_information as $info) : ?>
                                            <div class="card shadow-sm mb-3">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <?php if ($info['gambar']) : ?>
                                                            <img src="<?= base_url('assets/img/info/' . $info['gambar']); ?>"
                                                                 class="img-fluid rounded-start h-100"
                                                                 style="object-fit: cover;"
                                                                 alt="Info Image">
                                                        <?php else : ?>
                                                            <div class="bg-light h-100 d-flex align-items-center justify-content-center">
                                                                <i class="fas fa-image fa-3x text-muted"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $info['judul']; ?></h5>
                                                            <p class="card-text"><?= nl2br(substr($info['info'], 0, 200)) . '...'; ?></p>
                                                            <p class="card-text">
                                                                <small class="text-muted">
                                                                    <i class="fas fa-clock"></i> <?= date('d F Y', strtotime($info['created_at'] ?? 'now')); ?>
                                                                </small>
                                                            </p>
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
.avatar-xl {
    width: 120px;
    height: 120px;
    object-fit: cover;
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

</div>
<!-- End of Main Content -->
