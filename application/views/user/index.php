<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 mx-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>
    <div class="row">
        <div class="col-lg-6 mx-4">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="col-lg-11 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="main-content">

                    <div class="page-content">

                        <!-- start row -->
                        <div class="row">
                            <div class="col-md-12 col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="profile-widgets py-3">

                                            <div class="text-center">
                                                <div>
                                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="avatar-2" class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                                    <div class="online-circle"><i class="fas fa-circle text-success"></i>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <a href="<?= base_url('user/index'); ?>" class="text-reset fw-medium font-size-16"><?= $user['name']; ?></a>
                                                    <p class="text-body mt-1 mb-1">Bergabung sejak <br><?= date('d F Y', $user['date_created']); ?></br></p>

                                                    <?php foreach ($peran as $peran_pengguna) : ?>
                                                        <span class="badge bg-success"><?= $peran_pengguna['role']; ?></span>
                                                    <?php endforeach; ?>

                                                    <span class="badge bg-danger">
                                                        <?php if (!isset($peran_pengguna) || empty($peran_pengguna) || $peran_pengguna['role'] == 'Calon Anggota') { ?>
                                                            <a href="<?= base_url('user/formulir'); ?>" style="color: aliceblue; text-decoration: none;">Mendaftar</a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url('user/edit'); ?>" style="color: aliceblue; text-decoration: none;">Lengkapi Profil</a>
                                                        <?php } ?>

                                                    </span>
                                                </div>


                                                <div class="row mt-4 border border-start-0 border-end-0 p-3">
                                                    <div class="col-md-6">
                                                        <h6 class="text-muted">
                                                            Jenis Kelamin
                                                        </h6>
                                                        <h6 class="mb-0"><?= $user['gender']; ?></h6>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <h6 class="text-muted">
                                                            Status
                                                        </h6>
                                                        <h6 class="mb-0"><?= $user['status']; ?></h6>
                                                    </div>
                                                </div>

                                                <div class="mt-4">

                                                    <ui class="list-inline social-source-list">
                                                        <li class="list-inline-item">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    <a href="<?= $user['facebook']; ?>" style="color: white;"><i class="fab fa-facebook-f"></i></a>
                                                                </span>
                                                            </div>
                                                        </li>

                                                        <li class="list-inline-item">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-info">
                                                                    <a href="<?= $user['twitter']; ?>" style="color: white;"><i class="fab fa-twitter"></i></a>
                                                                </span>
                                                            </div>
                                                        </li>

                                                        <li class="list-inline-item">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-primary">
                                                                    <a href="<?= $user['linkedin']; ?>" style="color: white;"><i class="fab fa-linkedin"></i></i></a>
                                                                </span>
                                                            </div>
                                                        </li>

                                                        <li class="list-inline-item">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-danger">
                                                                    <a href="<?= $user['instagram']; ?>" style="color: white;"><i class="fab fa-instagram"></i></a>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    </ui>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body mb-3">
                                        <h5 class="card-title mb-3">Deskripsi Personal</h5>

                                        <p class="card-title-desc" style="font-style: italic;">
                                            "<?= $user['personal']; ?>"
                                        </p>

                                        <div class="mt-3">
                                            <p class="font-size-12 text-muted mb-1">Asal Kampus</p>
                                            <h6><?= $user['kampus']; ?>, <?= $user['prodi']; ?></h6>
                                        </div>

                                        <div class="mt-3">
                                            <p class="font-size-12 text-muted mb-1">Alamat Email</p>
                                            <h6><?= $user['email']; ?></h6>
                                        </div>

                                        <div class="mt-3">
                                            <p class="font-size-12 text-muted mb-1">Nomor Telepon</p>
                                            <h6><?= $user['telp']; ?></h6>
                                        </div>

                                        <div class="mt-3">
                                            <p class="font-size-12 text-muted mb-1">Alamat Lengkap</p>
                                            <h6><?= $user['alamat']; ?></h6>
                                        </div>

                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title mb-2">Keahlian Saya</h5>
                                        <p class="text-muted">Keahlian saya berada dalam bidang:</p>
                                        <ul class="list-unstyled list-inline language-skill mb-0">
                                            <?php
                                            // Periksa apakah kunci "keahlian" ada dalam array $user dan nilainya tidak kosong
                                            if (isset($user['keahlian']) && !empty($user['keahlian'])) {
                                                $keahlian_array = explode(';', $user['keahlian']);
                                                foreach ($keahlian_array as $keahlian) {
                                                    $keahlian = trim($keahlian); // Menghilangkan spasi di awal dan akhir keahlian
                                                    if (!empty($keahlian)) { // Memastikan keahlian tidak kosong
                                                        echo '<li class="list-inline-item badge bg-primary"><span>' . $keahlian . '</span></li>';
                                                    }
                                                }
                                            } else {
                                                // Jika data keahlian kosong, tampilkan pesan alternatif atau lakukan tindakan lain
                                                echo '<li class="list-inline-item">Tidak ada keahlian yang ditambahkan.</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 col-xl-9">
                                <div class="row">
                                    <div class="col-md-12 col-xl-4">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <div class="text-center">
                                                            <i class="fas fa-user-graduate fa-4x"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <p class="mb-2">Nomor Anggota</p>

                                                        <?php if (!isset($peran_pengguna) || empty($peran_pengguna) || $peran_pengguna['role'] == 'Calon Anggota') { ?>
                                                            <small>
                                                                <p class="card-text">Anda belum menjadi anggota. Silakan mengisi lengkap Formulir Pendaftaran!</p>
                                                            </small>
                                                        <?php } else { ?>
                                                            <h4><?= $user['date_created']; ?></h4>
                                                        <?php } ?>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-xl-4">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <div class="text-center">
                                                            <i class="fas fa-calendar-check fa-4x"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <p class="mb-2">Tanggal Bergabung</p>
                                                        <h6 class="mb-0"><?= date('d F Y', $user['date_created']); ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-xl-4">
                                        <div class="card ">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <div class="text-center">
                                                            <i class="fas fa-map-marked-alt fa-4x"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <p class="mb-2">Wilayah Keanggotaan</p>
                                                        <h6 class="mb-0"><?= $user['wilayah']; ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-body">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link <?= ($active_tab == 'info') ? 'active' : ''; ?>" id="info-tab" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Informasi Anggota</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link <?= ($active_tab == 'userdetail') ? 'active' : ''; ?>" id="userdetail-tab" data-bs-toggle="tab" href="#userdetail" role="tab" aria-controls="userdetail" aria-selected="false">Detail Anggota</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link <?= ($active_tab == 'benefit') ? 'active' : ''; ?>" id="benefit-tab" data-bs-toggle="tab" href="#benefit" role="tab" aria-controls="benefit" aria-selected="false">Manfaat</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content" id="profileTabsContent">
                                            <div class="tab-pane fade <?= ($active_tab == 'info') ? 'show active' : ''; ?>" id="info" role="tabpanel" aria-labelledby="info-tab">
                                                <!-- Content tab info -->
                                                <div class="col lg">
                                                    <div class="row">
                                                        <div class="card mb-3">
                                                            <div class="row g-0">
                                                                <div class="col-md-5">
                                                                    <img id="gambarModal" src="<?= base_url('assets/img/qr/confirm.png') ?>" class="card-img-top" data-toggle="modal" data-target="#myModal">
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"><b>Pembayaran Iuran Anggota</b></h5>
                                                                        <?php if (isset($iuran) && !empty($iuran)) { ?>
                                                                            <p>Jumlah Iuran: <strong><?= $iuran['iuran']; ?> /bulan</strong></p>
                                                                            <p class="card-text">Pembayaran iuran dapat melalui QRIS di atas atau transfer melalui:</p>
                                                                            <p class="card-text">Bank Negara Indonesia (BNI)</p>
                                                                            <p class="card-text"><b>Rek. 19 2726 8812</b></p>
                                                                            <p class="card-text">a.n. Dosen Tendik Perguruan Tinggi</p>
                                                                            <?php
                                                                            $whatsapp_number = '6285222444700';
                                                                            $iuran_amount = $iuran['iuran'];
                                                                            $user_name = $user['name'];
                                                                            ?>

                                                                            <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp_number ?>&text=<?= urlencode("Salam perjuangan! Saya $user_name, telah melakukan pembayaran Iuran Anggota SPK, sebesar $iuran_amount") ?>" target="_blank" class="btn btn-primary">Konfirmasi Pembayaran</a>
                                                                            <a href="https://api.whatsapp.com/send?phone=<?= $whatsapp_number ?>&text=<?= urlencode("Salam perjuangan! Saya $user_name, menyatakan keberatan membayar Iuran Anggota SPK, sebesar $iuran_amount. Mohon kebijaksanaannya!") ?>" target="_blank" class="btn btn-danger">Ajukan Keberatan</a>

                                                                        <?php } else { ?>
                                                                            <p class="card-text">Data iuran tidak ditemukan. Silakan mengisi formulir pendaftaran terlebih dahulu!</p>
                                                                            <p class="card-text">Pencatatan keanggotaan dilakukan setelah anda mengisi lengkap formulir pendaftaran, dan mengklik tombol 'Mendaftar Serikat' dan dikonfirmasi sebagai anggota</p>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="card mb-3">
                                                            <?php if ($user['role_id'] != 2) : ?> <!-- Cek jika user ID bukan 2 -->
                                                                <?php foreach ($recent_information as $info) : ?>
                                                                    <div class="col-lg">
                                                                        <div class="row g-0">
                                                                            <div class="col-md-6">
                                                                                <!-- Jika ada gambar yang disimpan -->
                                                                                <?php if ($info['gambar']) : ?>
                                                                                    <img src="<?= base_url('assets/img/info/' . $info['gambar']); ?>" class="img-fluid rounded-start mt-4" alt="Info Image">
                                                                                <?php else : ?>
                                                                                    <!-- Jika tidak ada gambar -->
                                                                                    <img src="<?= base_url('assets/img/default_info_image.jpg'); ?>" class="img-fluid rounded-start" alt="Info Image">
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card-body">
                                                                                    <h3 class="card-title-info"><?= $info['judul']; ?></h3>
                                                                                    <p class="paragraph-style"><?= nl2br($info['info']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php else : ?>
                                                                <!-- Jika user ID adalah 2, tampilkan link ini -->
                                                                <a type="button" class="btn btn-info" href="<?= base_url('user/formulir'); ?>" style="color: aliceblue;">
                                                                    <strong><i class="fab fa-wpforms"></i> Isi Formulir Pendaftaran</strong>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tab userdetail -->
                                            <div class="tab-pane fade <?= ($active_tab == 'userdetail') ? 'show active' : ''; ?>" id="userdetail" role="tabpanel" aria-labelledby="userdetail-tab">
                                                <!-- Content tab userdetail -->
                                                <div class="col lg">
                                                    <div class="row">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="card mb-3 mx-auto">
                                                                    <div class="row g-0">
                                                                        <div class="col-md-3 mx-4 mt-4">
                                                                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-fluid rounded-start" alt="...">
                                                                        </div>
                                                                        <div class="col-md-8 shadow">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title"><strong><?= $user['name'] ?></strong></h5>
                                                                                <p class="card-text text-muted"><?= $user['email'] ?></p>

                                                                                <table class="table">
                                                                                    <thead>
                                                                                        <th scope="col"></th>
                                                                                        <th scope="col"></th>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>Nomor Anggota</td>
                                                                                            <td><?php if (!isset($peran_pengguna) || empty($peran_pengguna) || $peran_pengguna['role'] == 'Calon Anggota') { ?>
                                                                                                    <small>
                                                                                                        <p class="card-text">: Silakan Mengisi Formulir Pendaftaran!</p>
                                                                                                    </small>
                                                                                                <?php } else { ?>
                                                                                                    <h6>: <?= $user['date_created']; ?></h6>
                                                                                                <?php } ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Bergabung Sejak</td>
                                                                                            <td>: <?= date('d F Y', $user['date_created']); ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Jenis Kelamin</td>
                                                                                            <td>: <?= $user['gender'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Alamat Lengkap</td>
                                                                                            <td>: <?= $user['alamat'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Nomor Telepon</td>
                                                                                            <td>: <?= $user['telp'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Asal Kampus</td>
                                                                                            <td>: <?= $user['kampus'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Prodi</td>
                                                                                            <td>: <?= $user['prodi'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Status</td>
                                                                                            <td>: <?= $user['status'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Pemberi Upah</td>
                                                                                            <td>: <?= $user['employer'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Rentang Gaji</td>
                                                                                            <td>: <?= $user['gaji'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Wilayah</td>
                                                                                            <td>: <?= $user['wilayah'] ?></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Bidang Keahlian</td>
                                                                                            <td>: <?= $user['keahlian'] ?></td>
                                                                                        </tr>
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
                                            </div>

                                            <!-- Tab benefit -->
                                            <div class="tab-pane fade <?= ($active_tab == 'benefit') ? 'show active' : ''; ?>" id="benefit" role="tabpanel" aria-labelledby="benefit-tab">
                                                <!-- Content tab benefit -->
                                                <div class="col lg">
                                                    <div class="row">
                                                        <div class="card border-success">
                                                            <div class="card-body">
                                                                <h5 class="card-title" style="font-weight:bold">Manfaat Keanggotaan</h5>
                                                                <p class="card-text">Menjadi anggota Serikat Pekerja Kampus (SPK) adalah kontribusi penting pekerja kampus untuk memperjuangkan kesejahteraan yang layak dan membangun kondisi kerja yang baik. SPK adalah ruang perjuangan bersama bagi dosen, peneliti, tenaga kependidikan, seluruh pekerja di institusi perguruan tinggi, apapun posisi Anda, apapun status ketenagakerjaan Anda.</p>
                                                                <ol>
                                                                    <li>Konsultasi hukum dan pendampingan
                                                                        <p>SPK memberikan bantuan konsultasi hukum dan pendampingan secara pro bono atas sengketa terkait masalah kerja yang dialami anggota seperti kenaikan pangkat, pemutusan hubungan kerja, diskriminasi, beban kerja berlebihan, sengketa kontrak, dan lain sebagainya.</p>
                                                                    </li>
                                                                    <li>Perwakilan (pengurus cabang/kantor) di kampus Anda
                                                                        <p>Saat ini, SPK telah memiliki perwakilan di (jumlah) perguruan tinggi negeri dan (jumlah) perguruan tinggi swasta. Jumlah perwakilan ini akan berkembang lebih lanjut seiring dengan keterlibatan Anda sebagai anggota.</p>
                                                                    </li>
                                                                    <li>Aspirasi kolektif
                                                                        <p>Aspirasi anggota akan diperjuangkan melalui negosiasi yang dilakukan SPK dengan pengelola perguruan tinggi maupun advokasi hukum dan kebijakan. Anggota yang memiliki aspirasi dan masalah terkait kondisi kerja di institusinya tidak harus menghadapi pengelola perguruan tinggi secara individual, melainkan secara kolektif oleh institusi serikat.</p>
                                                                    </li>
                                                                    <li>Informasi terkini
                                                                        <p>Anggota mendapatkan informasi terkini secara rutin atas kegiatan dan agenda SPK, perkembangan advokasi yang dilakukan oleh SPK, dan laporan pengelolaan keuangan yang bersumber dari iuran anggota maupun donasi publik.</p>
                                                                    </li>
                                                                    <li>Akses kegiatan dan discount merchandise
                                                                        <p>Anggota dapat terlibat aktif dalam kegiatan-kegiatan SPK, di antaranya pendidikan dasar dan lanjutan, pelatihan teknis berserikat, dan lain sebagainya. Anggota juga mendapatkan discount untuk pembelian merchandise yang hasil penjualannya akan digunakan untuk kegiatan SPK.</p>
                                                                    </li>
                                                                </ol>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Artikel Serikat Pekerja Kampus</h4>

                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Judul</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Penulis</th>
                                                        <th scope="col">Jenis</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Fungsi untuk membandingkan waktu posting
                                                    function compareTime($a, $b)
                                                    {
                                                        return strtotime($b['waktu_posting']) - strtotime($a['waktu_posting']);
                                                    }

                                                    // Mengurutkan $user_posts dari yang terbaru hingga terlama
                                                    usort($user_posts, 'compareTime');
                                                    ?>
                                                    <div>
                                                        <?php if (!empty($user_posts)) : ?>
                                                            <?php foreach ($user_posts as $posting) : ?>
                                                                <tr>
                                                                    <td><strong><?= $posting['judul_tulisan'] ?></strong></td>
                                                                    <td>
                                                                        <?= date('F j, Y, g:i a', strtotime($posting['waktu_posting'])); ?>
                                                                    </td>
                                                                    <td><?= $posting['penulis'] ?></td>
                                                                    <td><?= $posting['jenis_tulisan'] ?></td>
                                                                    <td><a href="<?= base_url('post/view/' . $posting['slug']); ?>" target="_blank" class="btn btn-primary btn-sm">Baca</a></td>
                                                                </tr>
                                                            <?php endforeach; ?> <?php else : ?> <p>Tidak ada postingan saat ini.</p>
                                                        <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- end row -->

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> Silakan Scan Disini Untuk Membayar Iuran
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Gambar yang diperbesar akan ditampilkan di sini -->
                <img src="<?= base_url('assets/img/qr/confirm.png') ?>" class="img-fluid">
            </div>
        </div>
    </div>
</div>



<div class="row">


    <!-- End Page-content -->



</div>
<!-- End of Main Content -->