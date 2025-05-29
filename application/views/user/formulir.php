<div class="card shadow mx-auto" style="width: 65rem;">
    <img src="<?= base_url('assets/img/breadcrumb/') . 'breadcrumb-bg.png' ?>" class="card-img-top" alt="...">

    <div class="card-body">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-center" style="font-weight:bold"> <?= $title; ?> Anggota Serikat Pekerja Kampus</h1>

            <div class="row">
                <div class="col-lg-10">

                    <?= form_open_multipart('user/formulir') ?>

                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8 form-check">
                            <label class="form-check-label">
                                <input type="radio" class="radio mx-1" id="gender" name="gender" value="laki-laki" <?php if ($user['gender'] === 'laki-laki') echo 'checked'; ?>>Laki-laki
                            </label>
                            <label class="form-check-label">
                                <input type="radio" class="radio mx-1" id="gender" name="gender" value="perempuan" <?php if ($user['gender'] === 'perempuan') echo 'checked'; ?>>Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                        <div class="col-sm-8">
                            <textarea rows="2" type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>"></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-4 col-form-label">Nomor Telepon/WA</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $user['telp']; ?>" required>
                            <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kampus" class="col-sm-4 col-form-label">Asal Kampus</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kampus" name="kampus" value="<?= $user['kampus']; ?>" required>
                            <?= form_error('kampus', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prodi" class="col-sm-4 col-form-label">Asal Prodi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $user['prodi']; ?>">
                            <?= form_error('prodi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status Kepegawaian</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="status" name="status" style="width: fit-content;" value="<?= $user['status']; ?>" required>
                                <option><?= $user['status']; ?></option>
                                <option>Dosen PNS</option>
                                <option>PPPK</option>
                                <option>Dosen Tetap Non PNS</option>
                                <option>Dosen Tidak Tetap/Honorer</option>
                                <option>Dosen Kontrak</option>
                                <option>Tendik PNS</option>
                                <option>Tendik Tetap Non PNS</option>
                                <option>Tendik Tidak Tetap/Honorer</option>
                                <option>Tendik Kontrak</option>
                                <option>Outsourcing</option>
                            </select>
                        </div>
                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <label for="employer" class="col-sm-4 col-form-label">Pemberi Gaji/Upah</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="employer" name="employer" value="<?= $user['employer']; ?>" required>
                                <option><?= $user['employer']; ?></option>
                                <option>Kementerian Pendidikan/APBN</option>
                                <option>Kementerian Agama/APBN</option>
                                <option>APBD/PEMDA</option>
                                <option>YAYASAN</option>
                                <option>KAMPUS</option>
                                <option>PENYEDIA JASA/OUTSOURCING</option>
                                <option>Lainnya</option>
                            </select>
                            <?= form_error('employer', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gaji" class="col-sm-4 col-form-label">Range Gaji Per Bulan</label>
                        <div class="col-sm-8">
                            <select class="form-select col-sm-8" id="gaji" name="gaji" value="<?= $user['gaji']; ?>" required>
                                <option><?= $user['gaji']; ?></option>
                                <optgroup label="Pegawai Negeri Sipil">
                                    <option>Golongan I (Ia, Ib, Ic, Id)</option>
                                    <option>Golongan II (IIa, IIb, IIc, IId)</option>
                                    <option>Golongan III (IIIa, IIIb, IIIc, Id)</option>
                                    <option>Golongan IV (IVa, IVb, IVc, IVd, IVe)</option>
                                </optgroup>
                                <optgroup label="Non-Pegawai Negeri Sipil">
                                    <option>Rp0 - Rp1,500,000</option>
                                    <option>Rp1,500,000 - Rp3,000,000</option>
                                    <option>Rp3,000,001 - Rp6,000,000</option>
                                    <option>Diatas Rp.6,000,000</option>
                                </optgroup>
                            </select>
                            <?= form_error('gaji', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wilayah" class="col-sm-4 col-form-label">Wilayah Provinsi Kampus</label>
                        <div class="col-sm-8">
                            <select class="form-select" id="wilayah" name="wilayah" value="<?= $user['wilayah']; ?>" required>
                                <option><?= $user['wilayah']; ?></option>
                                <option> Nanggroe Aceh Darussalam </option>
                                <option> Sumatera Utara </option>
                                <option> Sumatera Selatan </option>
                                <option> Sumatera Barat </option>
                                <option> Bengkulu </option>
                                <option> Riau </option>
                                <option> Kepulauan Riau </option>
                                <option> Jambi </option>
                                <option> Lampung </option>
                                <option> Bangka Belitung </option>
                                <option> Kalimantan Barat </option>
                                <option> Kalimantan Timur </option>
                                <option> Kalimantan Selatan </option>
                                <option> Kalimantan Tengah </option>
                                <option> Kalimantan Utara </option>
                                <option> Banten </option>
                                <option> DKI Jakarta </option>
                                <option> Jawa Barat </option>
                                <option> Jawa Tengah </option>
                                <option> Daerah Istimewa Yogyakarta </option>
                                <option> Jawa Timur </option>
                                <option> Bali </option>
                                <option> Nusa Tenggara Timur </option>
                                <option> Nusa Tenggara Barat </option>
                                <option> Gorontalo </option>
                                <option> Sulawesi Barat </option>
                                <option> Sulawesi Tengah </option>
                                <option> Sulawesi Utara </option>
                                <option> Sulawesi Tenggara </option>
                                <option> Sulawesi Selatan </option>
                                <option> Maluku Utara </option>
                                <option> Maluku </option>
                                <option> Papua Barat </option>
                                <option> Papua </option>
                                <option> Papua Tengah </option>
                                <option> Papua Pegunungan </option>
                                <option> Papua Selatan </option>
                                <option> Papua Barat Daya </option>
                            </select>
                            <?= form_error('wilayah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="personal" class="col-sm-4 col-form-label">Motivasi Mendaftar Serikat</label>
                        <div class="col-sm-8">
                            <textarea type="text" class="form-control" id="personal" name="personal" placeholder="Saya tertarik mendaftar SPK karena..." required></textarea>
                            <?= form_error('personal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keahlian" class="col-sm-4 col-form-label">Bidang Keahlian</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="keahlian" name="keahlian" placeholder="Misal: Hukum; Politik; Sosial (pisahkan dengan semicolon ';')">
                            <?= form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <h5>Alamat Media Sosial</h5>
                        <label for="facebook" class="col-sm-4 col-form-label mb-3">Facebook</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="facebook" name="facebook" value="<?= $user['facebook']; ?>">
                        </div>
                        <label for="twitter" class="col-sm-4 col-form-label mb-3">Twitter</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $user['twitter']; ?>">
                        </div>
                        <label for="instagram" class="col-sm-4 col-form-label mb-3">Instagram</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="instagram" name="instagram" value="<?= $user['instagram']; ?>">
                        </div>
                        <label for="linkedin" class="col-sm-4 col-form-label mb-3">Linked In</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?= $user['linkedin']; ?>">
                        </div>
                    </div>



                    <div class="form-group row">
                        <div class="col-sm-2 mt-5">Foto</div>
                        <div class="col-sm-10">
                            <div class="row mt-5">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image"><?= $user['image']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-lg-6 mx-10">
                            <button type="submit" class="btn btn-success"><i class="fas fa-fist-raised"></i> Mendaftar Serikat</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <div class="card border-success">
            <div class="card-header bg-success text-white" style="font-weight:bold">
                Manfaat
            </div>
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
    <!-- End of Main Content -->

</div>

</div>