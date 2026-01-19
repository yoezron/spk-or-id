<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mx-5"> <?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <?= form_open_multipart('user/edit') ?>

            <div class="card shadow mb-4 col-lg mx-4">
                <div class="card-body">
                    <h1 class="h3 mb-4 text-gray-800"> <?= $title; ?> <?= $user['name']; ?></h1>
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
                            <textarea rows="2" type="text" class="form-control" id="alamat" name="alamat"><?= $user['alamat']; ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-4 col-form-label">Nomor Telepon/WA</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $user['telp']; ?>">
                            <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kampus" class="col-sm-4 col-form-label">Asal Kampus</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="kampus" name="kampus" value="<?= $user['kampus']; ?>">
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
                            <select class="form-select" id="status" name="status" style="width: fit-content;" value="<?= $user['status']; ?>">
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
                            <select class="form-select" id="employer" name="employer" value="<?= $user['employer']; ?>">
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
                            <select class="form-select col-sm-8" id="gaji" name="gaji" value="<?= $user['gaji']; ?>">
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
                            <select class="form-select" id="wilayah" name="wilayah" value="<?= $user['wilayah']; ?>">
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
                            <textarea type="text" class="form-control" id="personal" name="personal"><?= $user['personal']; ?></textarea>
                            <?= form_error('personal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keahlian" class="col-sm-4 col-form-label">Bidang Keahlian</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="keahlian" name="keahlian" placeholder="Pisahkan keahlian dengan semicolon = Hukum; Politik; Keamanan" value="<?= $user['keahlian']; ?>">
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
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Kirim Perubahan Profil</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->