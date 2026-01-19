<body>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header text-center">
                <h2><?= $title; ?> Layak Pekerja Kampus</h2>
                <p>Mohon isi data berikut dengan lengkap. Serikat Pekerja Kampus menjamin segala kerahasiaan data yang diberikan.</p>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                <?php endif; ?>

                <?= form_open('user/submit_kuisioner', ['id' => 'formSurvei']); ?>

                <input type="hidden" name="lokasi_kerja_provinsi_text" id="lokasi_kerja_provinsi_text">
                <input type="hidden" name="lokasi_kerja_kabupaten_text" id="lokasi_kerja_kabupaten_text">

                <fieldset>
                    <legend>Data Anggota</legend>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nomor_anggota" class="required-field">Nomor Anggota</label>
                            <input type="text" name="nomor_anggota" id="nomor_anggota"
                                class="form-control"
                                value="<?= $user['date_created']; ?>"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nama_lengkap" class="required-field">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                class="form-control"
                                value="<?= $user['name']; ?>"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email_anggota" class="required-field">Email Anggota</label>
                            <input type="email" name="email_anggota" id="email_anggota"
                                class="form-control"
                                value="<?= $user['email']; ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="wilayah" class="required-field">Wilayah Keanggotaan</label>
                            <input type="text" name="wilayah" id="wilayah"
                                class="form-control"
                                value="<?= $user['wilayah']; ?>"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kampus" class="required-field">Asal Kampus</label>
                            <input type="text" name="kampus" id="kampus"
                                class="form-control"
                                value="<?= $user['kampus']; ?>"
                                readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telp" class="required-field">Nomor WhatsApp</label>
                            <input type="text" name="telp" id="telp"
                                class="form-control"
                                value="<?= $user['telp']; ?>"
                                readonly>
                        </div>
                    </div>

                    <small><em>Jika data tidak sesuai, mohon edit di bagian <a href="<?= base_url('user/edit') ?>">edit profile</a>!</em></small>
                </fieldset>

                <fieldset>
                    <legend>Bagian 1: Lokasi & Demografi</legend>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="provinsi">Provinsi Lokasi Bekerja</label>
                            <select name="prov" class="form-control" id="provinsi" required>
                                <option value="" selected disabled>- Pilih Provinsi -</option>
                                <?php
                                foreach ($provinsi as $prov) {
                                    echo '<option value="' . $prov->id . '">' . $prov->nama . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="kabupaten">Kabupaten / Kota</label>
                            <select name="kab" class="form-control" id="kabupaten" required>
                                <option value="" disabled>- Pilih Provinsi Terlebih Dahulu -</option>
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kec" class="form-control" id="kecamatan" required>
                                <option value="" disabled>- Pilih Kecamatan -</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="desa">Desa / Kelurahan</label>
                            <select name="des" class="form-control" id="desa" required>
                                <option value="" disabled>- Pilih Desa / Kelurahan -</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Lainnya/Tidak memberi tahu">Lainnya/Tidak memberi tahu</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="usia">Usia (tahun)</label>
                            <input type="number" name="usia" id="usia" class="form-control" placeholder="Contoh: 35" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="jumlah_tanggungan">Jumlah tanggungan keluarga</label>
                            <input type="number" name="jumlah_tanggungan" id="jumlah_tanggungan" class="form-control" placeholder="Contoh: 2" required>
                            <small style="color: darkgray;">yang tidak bekerja/berpenghasilan sendiri</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="tingkat_pendidikan">Kualifikasi Pendidikan</label>
                            <select name="tingkat_pendidikan" id="tingkat_pendidikan" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Doktoral (S3 atau sub spesialis)">Doktoral (S3 atau sub spesialis)</option>
                                <option value="Magister (S2 atau spesialis)">Magister (S2 atau spesialis)</option>
                                <option value="Sarjana (S1 atau D4)">Sarjana (S1 atau D4)</option>
                                <option value="Diploma (D1 s.d. D3)">Diploma (D1 s.d. D3)</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status_domisili">Status Tempat Tinggal</label>
                            <select name="status_domisili" id="status_domisili" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Rumah Milik Sendiri">Rumah Milik Sendiri</option>
                                <option value="Rumah Kerabat/Saudara">Rumah Kerabat/Saudara</option>
                                <option value="Mengontrak">Mengontrak</option>
                                <option value="Kos">Kos Bulanan/Tahunan</option>
                                <option value="Menumpang">Menumpang</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="komposisi_tinggal">Komposisi Tempat Tinggal</label>
                            <select name="komposisi_tinggal" id="komposisi_tinggal" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Tinggal Bersama Istri/Anak">Tinggal Bersama Istri/Anak</option>
                                <option value="Tinggal Bersama Orang Tua/Mertua">Tinggal Bersama Orang Tua/Mertua</option>
                                <option value="Tinggal Bersama Saudara">Tinggal Bersama Saudara</option>
                                <option value="Tinggal Bersama Keluarga Istri/Suami">Tinggal Bersama Keluarga Istri/Suami</option>
                                <option value="Tinggal Sendiri">Tinggal Sendiri</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="status_pernikahan">Status Pernikahan</label>
                            <select name="status_pernikahan" id="status_pernikahan" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pengurus_spk">Jenis Keanggotaan SPK</label>
                            <select name="pengurus_spk" id="pengurus_spk" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Anggota">Anggota</option>
                                <option value="Pengurus Harian">Pengurus Harian</option>
                                <option value="Dewan Pengawas">Dewan Pengawas</option>
                                <option value="Ketua Wilayah">Ketua Wilayah</option>
                                <option value="Sekretaris Wilayah">Sekretaris Wilayah</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Alamat Email Korespondensi</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="anda@email.com" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Bagian 2: Institusi & Afiliasi</legend>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="id_jenis_pt" class="form-label">Jenis Perguruan Tinggi <span class="text-danger">*</span></label>
                            <select class="form-select" id="id_jenis_pt" name="id_jenis_pt" required>
                                <option value="" selected disabled>-- Pilih Jenis PT --</option>
                                <?php foreach ($jenis_pt_list as $jenis): ?>
                                    <option value="<?= $jenis['id']; ?>" <?= set_select('id_jenis_pt', $jenis['id']); ?>>
                                        <?= html_escape($jenis['jenis_pt']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_jenis_pt', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_kampus" class="form-label">Nama Kampus <span class="text-danger">*</span></label>
                            <select class="form-select" id="id_kampus" name="id_kampus" required disabled>
                                <option value="" selected disabled>-- Pilih Jenis PT Dahulu --</option>
                                <?php
                                // Jika form reload karena error, pertahankan pilihan kampus sebelumnya
                                $selected_kampus_id_on_fail = set_value('id_kampus');
                                // Misalnya controller mengirim nama kampus terpilih via flashdata $nama_kampus_repopulate
                                $selected_kampus_name_on_fail = isset($nama_kampus_repopulate) ? $nama_kampus_repopulate : '';
                                if (!empty($selected_kampus_id_on_fail)):
                                    $campusDisplay = $selected_kampus_name_on_fail
                                        ? $selected_kampus_name_on_fail
                                        : 'Kampus Terpilih (ID: ' . html_escape($selected_kampus_id_on_fail) . ')';
                                    // Tambahkan option terpilih dengan teks nama kampus agar Select2 dapat menampilkannya
                                    echo '<option value="' . html_escape($selected_kampus_id_on_fail) . '" selected>' . html_escape($campusDisplay) . '</option>';
                                endif;
                                ?>
                            </select>
                            <?= form_error('id_kampus', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status_kampus">Program Studi</label>
                            <input type="text" name="program_studi" id="program_studi" class="form-control" placeholder="Contoh: Teknik Informatika/Universitas jika tidak terafiliasi program studi" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="akreditasi">Akreditasi Kampus</label>
                            <select name="akreditasi" id="akreditasi" class="form-control" required>
                                <option value="" selected disabled>-- Pilih Akreditasi --</option>
                                <option value="Unggul">Unggul</option>
                                <option value="Baik Sekali">Baik Sekali</option>
                                <option value="Baik">Baik</option>
                                <option value="Belum Terakreditasi">Belum Terakreditasi</option>
                            </select>
                </fieldset>

                <fieldset>
                    <legend>Bagian 3: Status Kepegawaian</legend>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status_kepegawaian">Status hubungan kerja/Kepegawaian</label>
                            <select name="status_kepegawaian" id="status_kepegawaian" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                                <option value="Pegawai Non-ASN">Pegawai Non-ASN (Pekerja yayasan PTS, PTNBH, dll)</option>
                                <option value="Pegawai Pemerintah dengan Perjanjian Kerja (PPPK)">Pegawai Pemerintah dengan Perjanjian Kerja (PPPK)</option>
                                <option value="Tenaga Honorer">Tenaga Honorer/LB</option>
                                <option value="Tenaga Outsourcing">Tenaga Outsourcing</option>
                                <option value="Sudah Tidak Bekerja">Sudah Tidak Bekerja/Diberhentikan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jenis_pekerjaan">Jenis Pekerjaan/Profesi</label>
                            <select name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Dosen Tetap">Dosen Tetap (termasuk Guru Besar)</option>
                                <option value="Dosen Tidak Tetap">Dosen Tidak Tetap</option>
                                <option value="Dosen LB">Dosen LB</option>
                                <option value="Tenaga Kependidikan Tetap">Tenaga Kependidikan Tetap</option>
                                <option value="Tenaga Kependidikan Tidak Tetap">Tenaga Kependidikan Tidak Tetap</option>
                                <option value="Pustakawan">Pustakawan</option>
                                <option value="Laboran dan Teknisi">Laboran dan Teknisi</option>
                                <option value="Pranata Teknik Informasi">Pranata Teknik Informasi</option>
                                <option value="Tenaga Keamanan">Tenaga Keamanan</option>
                                <option value="Tenaga Kebersihan">Tenaga Kebersihan</option>
                                <option value="Pekerja Kampus Lainnya">Pekerja Kampus Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="jenis_waktu_kerja">Jenis Waktu Kerja</label>
                            <select name="jenis_waktu_kerja" id="jenis_waktu_kerja" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Purna Waktu">Purna Waktu</option>
                                <option value="Paruh Waktu">Paruh Waktu</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tahun_mulai_bekerja">Tahun Mulai Bekerja</label>
                            <input type="number" name="tahun_mulai_bekerja" id="tahun_mulai_bekerja" class="form-control" placeholder="Contoh: 2010" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status_keaktifan">Status Keaktifan anda dalam Pekerjaan</label>
                            <select name="status_keaktifan" id="status_keaktifan" class="form-control wrap-option" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Aktif melaksanakan pekerjaan/kewajiban tridarma tanpa dibarengi studi lanjut">Aktif melaksanakan pekerjaan/kewajiban tridarma tanpa dibarengi studi lanjut</option>
                                <option value="Sedang dalam masa tugas/izin belajar/studi lanjut namun tetap melaksanakan sebagian pekerjaan/kewajiban tridarma">Sedang dalam masa tugas/izin belajar/studi lanjut namun tetap melaksanakan sebagian pekerjaan/kewajiban tridarma (mis. hanya wajib mengajar tanpa diwajibkan penelitian dan pengabdian)</option>
                                <option value="Sedang dalam masa tugas/izin belajar/studi lanjut namun tetap melaksanakan seluruh pekerjaan/kewajiban tridarma">Sedang dalam masa tugas/izin belajar/studi lanjut namun tetap melaksanakan seluruh pekerjaan/kewajiban tridarma</option>
                                <option value="Sedang dijatuhkan sanksi, skorsing, dan/atau menjalani perselisihan pemutusan hubungan kerja sehingga tidak diperkenankan untuk melaksanakan pekerjaan">Sedang dijatuhkan sanksi, skorsing, dan/atau menjalani perselisihan pemutusan hubungan kerja sehingga tidak diperkenankan untuk melaksanakan pekerjaan</option>
                                <option value="Sedang menjalani masa tugas/izin belajar/studi lanjut tanpa diwajibkan melaksanakan pekerjaan/kewajiban tridarma">Sedang menjalani masa tugas/izin belajar/studi lanjut tanpa diwajibkan melaksanakan pekerjaan/kewajiban tridarma</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jabatan_struktural">Jabatan Struktural yang Ditempati</label>
                            <select name="jabatan_struktural" id="jabatan_struktural" class="form-control wrap-option" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Tidak menempati jabatan struktural apapun">Tidak menempati jabatan struktural apapun</option>
                                <option value="Ketua jurusan/program studi, sekretaris program studi, kepala lab, kepala staff/admin fakultas, supervisor, atau jabatan 1 tingkat di bawah dekan atau kepala lembaga penelitian/pengabdian/penjaminan mutu">Ketua jurusan/program studi, sekretaris program studi, kepala lab, kepala staff/admin fakultas, supervisor, atau jabatan 1 tingkat di bawah dekan atau kepala lembaga penelitian/pengabdian/penjaminan mutu</option>
                                <option value="Wakil Dekan, kepala biro, kepala bagian, atau jabatan 1 tingkat di bawah dekan atau kepala lembaga penelitian/pengabdian/penjaminan mutu">Wakil Dekan, kepala biro, kepala bagian, atau jabatan 1 tingkat di bawah dekan atau kepala lembaga penelitian/pengabdian/penjaminan mutu</option>
                                <option value="Wakil Rektor, Kepala/Direktur Lembaga Penelitian/Pengabdian/Penjaminan Mutu, atau jabatan 1 tingkat di bawah Pimpinan Tertinggi (Rektor Universitas, Direktur Institut/Politeknik/Akademi, Ketua Sekolah Tinggi)">Wakil Rektor, Kepala/Direktur Lembaga Penelitian/Pengabdian/Penjaminan Mutu, atau jabatan 1 tingkat di bawah Pimpinan Tertinggi (Rektor Universitas, Direktur Institut/Politeknik/Akademi, Ketua Sekolah Tinggi)</option>
                                <option value="Pimpinan Tertinggi Perguruan Tertinggi (Rektor Universitas, Direktur Institut/Politeknik/Akademi, Ketua Sekolah Tinggi)">Pimpinan Tertinggi Perguruan Tertinggi (Rektor Universitas, Direktur Institut/Politeknik/Akademi, Ketua Sekolah Tinggi)</option>
                                <option value="Jabatan struktural lainnya">Jabatan struktural lainnya</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="golongan_jabatan">Golongan jabatan/penyetaraan inpassing</label>
                            <select name="golongan_jabatan" id="golongan_jabatan" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Tidak ada golongan/belum inpassing">Tidak ada golongan/belum inpassing</option>
                                <option value="Ia">Ia</option>
                                <option value="Ib">Ib</option>
                                <option value="Ic">Ic</option>
                                <option value="Ic">Ic</option>
                                <option value="Id">Id</option>
                                <option value="IIa">IIa</option>
                                <option value="IIb">IIb</option>
                                <option value="IIc">IIc</option>
                                <option value="IId">IId</option>
                                <option value="IIIa">IIIa</option>
                                <option value="IIIb">IIIb</option>
                                <option value="IIIc">IIIc</option>
                                <option value="IIId">IIId</option>
                                <option value="IVa">IVa</option>
                                <option value="IVb">IVb</option>
                                <option value="IVc">IVc</option>
                                <option value="IVd">IVd</option>
                                <option value="IVe">IVe</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="jabatan_fungsional">Jabatan Fungsional Saat ini</label>
                            <select name="jabatan_fungsional" id="jabatan_fungsional" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Tidak Ada/Tenaga Pengajar Biasa">Tidak Ada/Tenaga Pengajar Biasa</option>
                                <option value="Asisten Ahli">Asisten Ahli</option>
                                <option value="Lektor">Lektor</option>
                                <option value="Lektor Kepala">Lektor Kepala</option>
                                <option value="Guru Besar">Guru Besar</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sertifikat_pendidik">Memperoleh Sertifikat Pendidik?</label>
                            <select name="sertifikat_pendidik" id="sertifikat_pendidik" class="form-control" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Tidak">Tidak</option>
                                <option value="Ya">Ya</option>
                                <option value="Dalam Proses">Dalam Proses</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pihak_perekrut">Pihak yang merekrut, mengangkat sebagai pegawai, atau mengadakan perjanjian kerja</label>
                        <select name="pihak_perekrut" id="pihak_perekrut" class="form-control wrap-option" required>
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="Saya direkrut langsung, diangkat sebagai pegawai, atau membuat perjanjian kerja dengan pemerintah atau yayasan yang mengelola perguruan tinggi">Saya direkrut langsung, diangkat sebagai pegawai, atau membuat perjanjian kerja dengan pemerintah atau yayasan yang mengelola perguruan tinggi</option>
                            <option value="Saya direkrut, diangkat, atau membuat perjanjian kerja dengan perusahaan penyedia jasa tenaga kerja (outsourcing)">Saya direkrut, diangkat, atau membuat perjanjian kerja dengan perusahaan penyedia jasa tenaga kerja (outsourcing)</option>
                            <option value="Saya direkrut, dipekerjakan, dan diberi upah/honor oleh pekerja/pegawai lain di perguruan tinggi tempat saya bekerja saat ini">Saya direkrut, dipekerjakan, dan diberi upah/honor oleh pekerja/pegawai lain di perguruan tinggi tempat saya bekerja saat ini</option>
                        </select>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Bagian 5: Upah & Tunjangan</legend>
                    <div class="row">
                        <small>Mohon mengisi pendapatan/potongan dalam satuan per bulan, jika setiap bulannya berbeda, isi dengan rata-rata 3 bulan terakhir</small>
                        <div class="col-md-6">
                            <h4 class="mt-4 mb-3">Komponen Upah</h4>

                            <div class="form-group mb-3">
                                <label for="gaji_pokok" class="form-label">Gaji Pokok per Bulan<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="gaji_pokok" name="gaji_pokok" value="<?= set_value('gaji_pokok', $survey['gaji_pokok'] ?? '') ?>" placeholder="Contoh: 5000000" required>
                                </div>
                                <?= form_error('gaji_pokok', '<small class="text-danger">', '</small>'); ?>
                            </div>


                            <div class="form-group mb-3">
                                <label for="tunjangan_jabatan" class="form-label">Tunjangan Jabatan per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_jabatan" name="tunjangan_jabatan" value="<?= set_value('tunjangan_jabatan', $survey['tunjangan_jabatan'] ?? '') ?>" placeholder="Contoh: 1000000">
                                    <?= form_error('tunjangan_jabatan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tunjangan_fungsional" class="form-label">Tunjangan Fungsional per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_fungsional" name="tunjangan_fungsional" value="<?= set_value('tunjangan_fungsional', $survey['tunjangan_fungsional'] ?? '') ?>" placeholder="Contoh: 750000">
                                    <?= form_error('tunjangan_fungsional', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tunjangan_makan" class="form-label">Tunjangan Makan per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_makan" name="tunjangan_makan" value="<?= set_value('tunjangan_makan', $survey['tunjangan_makan'] ?? '') ?>" placeholder="Contoh: 500000">
                                    <?= form_error('tunjangan_makan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tunjangan_transport" class="form-label">Tunjangan Transport per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_transport" name="tunjangan_transport" value="<?= set_value('tunjangan_transport', $survey['tunjangan_transport'] ?? '') ?>" placeholder="Contoh: 300000">
                                    <?= form_error('tunjangan_transport', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="tunjangan_lainnya" class="form-label">Tunjangan Lainnya per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_lainnya" name="tunjangan_lainnya" value="<?= set_value('tunjangan_lainnya', $survey['tunjangan_lainnya'] ?? '') ?>" placeholder="Contoh: 200000">
                                    <?= form_error('tunjangan_lainnya', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="total_penghasilan_bruto" class="form-label">Total Penghasilan Bruto per Bulan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="total_penghasilan_bruto" name="total_penghasilan_bruto" value="<?= set_value('total_penghasilan_bruto', $survey['total_penghasilan_bruto'] ?? '') ?>" placeholder="Otomatis terisi" required readonly>
                                    <?= form_error('total_penghasilan_bruto', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4 class="mt-4 mb-3">Komponen Potongan</h4>

                            <div class="form-group mb-3">
                                <label for="pot_pph" class="form-label">Pot. PPh per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="pot_pph" name="pot_pph" value="<?= set_value('pot_pph', $survey['pot_pph'] ?? '') ?>" placeholder="Contoh: 250000">
                                    <?= form_error('pot_pph', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="pot_ppn" class="form-label">Pot. PPN per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="pot_ppn" name="pot_ppn" value="<?= set_value('pot_ppn', $survey['pot_ppn'] ?? '') ?>" placeholder="Contoh: 250000">
                                    <?= form_error('pot_ppn', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="pot_bpjs_tk" class="form-label">Pot. BPJS TK per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="pot_bpjs_tk" name="pot_bpjs_tk" value="<?= set_value('pot_bpjs_tk', $survey['pot_bpjs_tk'] ?? '') ?>" placeholder="Contoh: 150000">
                                    <?= form_error('pot_bpjs_tk', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="pot_bpjs_kesehatan" class="form-label">Pot. BPJS Kesehatan per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="pot_bpjs_kesehatan" name="pot_bpjs_kesehatan" value="<?= set_value('pot_bpjs_kesehatan', $survey['pot_bpjs_kesehatan'] ?? '') ?>" placeholder="Contoh: 100000">
                                    <?= form_error('pot_bpjs_kesehatan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="potongan_lainnya" class="form-label">Potongan Lainnya per Bulan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control numeric-input" id="potongan_lainnya" name="potongan_lainnya" value="<?= set_value('potongan_lainnya', $survey['potongan_lainnya'] ?? '') ?>" placeholder="Contoh: 50000">
                                    <?= form_error('potongan_lainnya', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="total_potongan" class="form-label">Total Potongan per Bulan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="total_potongan" name="total_potongan" value="<?= set_value('total_potongan', $survey['total_potongan'] ?? '') ?>" placeholder="Otomatis terisi" required readonly>
                                    <?= form_error('total_potongan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <h4 class="mt-4 mb-3">Penghasilan Bersih per Bulan</h4>
                            <div class="form-group mb-3">
                                <label for="thp" class="form-label">THP / Take-Home Pay per Bulan<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="thp" name="thp" value="<?= set_value('thp', $survey['thp'] ?? '') ?>" placeholder="Otomatis terisi" required readonly>
                                    <?= form_error('thp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Bagian 6: Kalkulasi Upah</legend>
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="take_home_pay">Rata-rata Take Home Pay (Upah Bersih) dalam 3 bulan terakhir (tanpa THR & Gaji 13)</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="take_home_pay" name="take_home_pay"
                                        value="<?= set_value('take_home_pay', $survey['take_home_pay'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tunjangan_kinerja">Tunjangan Kinerja bulanan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="tunjangan_kinerja" name="tunjangan_kinerja"
                                        value="<?= set_value('tunjangan_kinerja', $survey['tunjangan_kinerja'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tunjangan_pendidikan">Tunjangan berdasarkan kualifikasi pendidikan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="tunjangan_pendidikan" name="tunjangan_pendidikan"
                                        value="<?= set_value('tunjangan_pendidikan', $survey['tunjangan_pendidikan'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tunjangan_tanggungan">Tunjangan berdasarkan jumlah tanggungan keluarga</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="tunjangan_tanggungan" name="tunjangan_tanggungan"
                                        value="<?= set_value('tunjangan_tanggungan', $survey['tunjangan_tanggungan'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tunjangan_kehadiran_perhari">Tunjangan kehadiran per hari</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="tunjangan_kehadiran_perhari" name="tunjangan_kehadiran_perhari"
                                        value="<?= set_value('tunjangan_kehadiran_perhari', $survey['tunjangan_kehadiran_perhari'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rata2_tunjangan_kehadiran">Rata-rata tunjangan kehadiran 3 bulan terakhir</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="rata2_tunjangan_kehadiran" name="rata2_tunjangan_kehadiran"
                                        value="<?= set_value('rata2_tunjangan_kehadiran', $survey['rata2_tunjangan_kehadiran'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="upah_lembur_perjam">Upah lembur per jam</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="upah_lembur_perjam" name="upah_lembur_perjam"
                                        value="<?= set_value('upah_lembur_perjam', $survey['upah_lembur_perjam'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rata2_upah_lembur">Rata-rata upah lembur 3 bulan terakhir</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="rata2_upah_lembur" name="rata2_upah_lembur"
                                        value="<?= set_value('rata2_upah_lembur', $survey['rata2_upah_lembur'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="honor_sks">[Dosen] Honor mengajar/kelebihan per SKS</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="honor_sks" name="honor_sks"
                                        value="<?= set_value('honor_sks', $survey['honor_sks'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rata2_honor_mengajar">[Dosen] Rata-rata honor mengajar 3 bulan terakhir</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="rata2_honor_mengajar" name="rata2_honor_mengajar"
                                        value="<?= set_value('rata2_honor_mengajar', $survey['rata2_honor_mengajar'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tunjangan_profesi">[Dosen] Tunjangan profesi sertifikasi dosen</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="tunjangan_profesi" name="tunjangan_profesi"
                                        value="<?= set_value('tunjangan_profesi', $survey['tunjangan_profesi'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tunjangan_lainnya">Rata-rata tunjangan tidak tetap lainnya</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input
                                        type="text" inputmode="numeric"
                                        class="form-control numeric-input"
                                        id="tunjangan_lainnya" name="tunjangan_lainnya"
                                        value="<?= set_value('tunjangan_lainnya', $survey['tunjangan_lainnya'] ?? '') ?>"
                                        placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>


                <button type="submit" class="btn btn-primary btn-lg">Kirim Survei</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>