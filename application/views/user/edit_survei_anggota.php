<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4 class="mb-0 fw-bold">Edit Data Survei Anggota</h4>
                </div>
                <div class="card-body p-4">
                    <form method="post" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?= htmlspecialchars($survei['nama_lengkap']) ?>" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Anggota</label>
                                <input type="email" name="email_anggota" class="form-control" value="<?= htmlspecialchars($survei['email_anggota']) ?>" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Provinsi</label>
                                <input type="text" name="prov" class="form-control" value="<?= strtoupper(get_nama_provinsi($survei['prov'])) ?>" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kampus</label>
                                <input type="text" name="kampus" class="form-control"
                                    value="<?= strtoupper(htmlspecialchars($nama_kampus ?? '-')) ?>" disabled>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gaji Pokok</label>
                                <input type="number" name="gaji_pokok" class="form-control" value="<?= htmlspecialchars($survei['gaji_pokok']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tunjangan Jabatan</label>
                                <input type="number" name="tunjangan_jabatan" class="form-control" value="<?= htmlspecialchars($survei['tunjangan_jabatan']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tunjangan Fungsional</label>
                                <input type="number" name="tunjangan_fungsional" class="form-control" value="<?= htmlspecialchars($survei['tunjangan_fungsional']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tunjangan Makan</label>
                                <input type="number" name="tunjangan_makan" class="form-control" value="<?= htmlspecialchars($survei['tunjangan_makan']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tunjangan Transport</label>
                                <input type="number" name="tunjangan_transport" class="form-control" value="<?= htmlspecialchars($survei['tunjangan_transport']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tunjangan Lainnya</label>
                                <input type="number" name="tunjangan_lainnya" class="form-control" value="<?= htmlspecialchars($survei['tunjangan_lainnya']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Total Penghasilan Bruto</label>
                                <input type="number" name="total_penghasilan_bruto" class="form-control" value="<?= htmlspecialchars($survei['total_penghasilan_bruto']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Potongan PPh</label>
                                <input type="number" name="pot_pph" class="form-control" value="<?= htmlspecialchars($survei['pot_pph']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Potongan PPn</label>
                                <input type="number" name="pot_ppn" class="form-control" value="<?= htmlspecialchars($survei['pot_ppn']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Potongan BPJS Ketenagakerjaan</label>
                                <input type="number" name="pot_bpjs_tk" class="form-control" value="<?= htmlspecialchars($survei['pot_bpjs_tk']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Potongan BPJS Kesehatan</label>
                                <input type="number" name="pot_bpjs_kesehatan" class="form-control" value="<?= htmlspecialchars($survei['pot_bpjs_kesehatan']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Potongan Lainnya</label>
                                <input type="number" name="potongan_lainnya" class="form-control" value="<?= htmlspecialchars($survei['potongan_lainnya']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Total Potongan</label>
                                <input type="number" name="total_potongan" class="form-control" value="<?= htmlspecialchars($survei['total_potongan']) ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Take Home Pay (THP)</label>
                                <input type="number" name="thp" class="form-control" value="<?= htmlspecialchars($survei['thp']) ?>" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-3">
                            <button type="submit" class="btn btn-success px-4"><i class="fas fa-save me-2"></i> Simpan Perubahan</button>
                            <a href="<?= base_url('user/view_datasurvei') ?>" class="btn btn-secondary px-4"><i class="fas fa-arrow-left me-2"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>