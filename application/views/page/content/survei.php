<body>
    <section class="survey-section section-padding" style="padding-top: 2rem; padding-bottom: 2rem;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 col-12 mx-auto">
                <h2 class="text-center mb-4">Survei Penghasilan Pekerja Kampus</h2>

                <?php if ($this->session->flashdata('success')):?>
                    <div class="alert alert-success" role="alert">
                        <?= html_escape($this->session->flashdata('success'));?>
                    </div>
                <?php endif;?>
                <?php if ($this->session->flashdata('error')):?>
                    <div class="alert alert-danger" role="alert">
                        <?= html_escape($this->session->flashdata('error'));?>
                    </div>
                <?php endif;?>
                <?php if ($this->session->flashdata('error_validation')):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('error_validation');?> {/* validation_errors() sudah di-escape secara default oleh CI jika tidak diubah konfigurasinya */}
                    </div>
                <?php endif;?>

                <div class="median-nasional-chart-container card p-4 mb-5">
                    <h3 class="mb-3 text-center">Median THP Nasional (Seluruh Data Survei)</h3>
                    <div class="chart-container">
                        <canvas id="medianNasionalChart"></canvas>
                    </div>
                </div>

                <div class="survey-form-container card p-4 mb-5">
                    <h3 class="mb-3">Formulir Partisipasi Survei</h3>
                    <?= form_open('welcome/proses_survei', ['class' => 'survey-form']);?>
                   
                        <div class="form-group mb-3">
    <label for="id_jenis_pt" class="form-label">Jenis Perguruan Tinggi <span class="text-danger">*</span></label>
    <select class="form-select" id="id_jenis_pt" name="id_jenis_pt" required>
        <option value="">-- Pilih Jenis PT --</option>
        <?php foreach($jenis_pt_list as $jenis): ?>
            <option value="<?= $jenis['id']; ?>" <?= set_select('id_jenis_pt', $jenis['id']); ?>>
                <?= html_escape($jenis['jenis_pt']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?= form_error('id_jenis_pt', '<small class="text-danger">', '</small>'); ?>
</div>

<div class="form-group mb-3">
    <label for="id_kampus" class="form-label">Nama Kampus <span class="text-danger">*</span></label>
    <select class="form-select" id="id_kampus" name="id_kampus" style="width: 100%;" required disabled>
        <option value="">-- Pilih Jenis PT Dahulu --</option>
        <?php 
        // Jika form reload karena error, pertahankan pilihan kampus sebelumnya
        $selected_kampus_id_on_fail = set_value('id_kampus');
        // Misalnya controller mengirim nama kampus terpilih via flashdata $nama_kampus_repopulate
        $selected_kampus_name_on_fail = isset($nama_kampus_repopulate) ? $nama_kampus_repopulate : '';
        if (!empty($selected_kampus_id_on_fail)): 
            $campusDisplay = $selected_kampus_name_on_fail 
                             ? $selected_kampus_name_on_fail 
                             : 'Kampus Terpilih (ID: '.html_escape($selected_kampus_id_on_fail).')';
            // Tambahkan option terpilih dengan teks nama kampus agar Select2 dapat menampilkannya
            echo '<option value="'.html_escape($selected_kampus_id_on_fail).'" selected>'.html_escape($campusDisplay).'</option>';
        endif; 
        ?>
    </select>
    <?= form_error('id_kampus', '<small class="text-danger">', '</small>'); ?>
</div>

                        <div class="form-group mb-3">
                            <label for="nama_pekerja" class="form-label">Nama Pekerja <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_pekerja" name="nama_pekerja" value="<?= set_value('nama_pekerja');?>" required>
                            <small class="form-text text-muted">Data pribadi anda tidak akan dimunculkan ke publik dan dijaga kerahasiaannya.</small>
                            <?= form_error('nama_pekerja', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nip_nik" class="form-label">NIP / NIK</label>
                            <input type="text" class="form-control" id="nip_nik" name="nip_nik" value="<?= set_value('nip_nik');?>">
                            <?= form_error('nip_nik', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= set_value('jabatan');?>">
                            <?= form_error('jabatan', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis_pekerja" class="form-label">Jenis Pekerja <span class="text-danger">*</span></label>
                            <select class="form-select" id="jenis_pekerja" name="jenis_pekerja" required>
                                <option value="">-- Pilih Jenis Pekerja --</option>
                                <option value="Dosen" <?= set_select('jenis_pekerja', 'Dosen');?>>Dosen</option>
                                <option value="Tenaga Kependidikan" <?= set_select('jenis_pekerja', 'Tenaga Kependidikan');?>>Tenaga Kependidikan</option>
                                <option value="Pekerja Kampus Lainnya" <?= set_select('jenis_pekerja', 'Pekerja Kampus Lainnya');?>>Pekerja Kampus Lainnya</option>
                            </select>
                            <?= form_error('jenis_pekerja', '<small class="text-danger">', '</small>');?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status_pekerja" class="form-label">Status Pekerja</label>
                            <select class="form-select" id="status_pekerja" name="status_pekerja">
                                <option value="">-- Pilih Status --</option>
                                <option value="Tetap" <?= set_select('status_pekerja', 'Tetap');?>>Tetap</option>
                                <option value="Kontrak" <?= set_select('status_pekerja', 'Kontrak');?>>Kontrak</option>
                                <option value="PNS" <?= set_select('status_pekerja', 'PNS');?>>PNS</option>
                                <option value="Tenaga Kerja Non-PNS" <?= set_select('status_pekerja', 'Tenaga Kerja Non-PNS');?>>Tenaga Kerja Non-PNS</option>
                                <option value="Lainnya" <?= set_select('status_pekerja', 'Lainnya');?>>Lainnya</option>
                            </select>
                            <?= form_error('status_pekerja', '<small class="text-danger">', '</small>');?>
                        </div>

                        <h4 class="mt-4 mb-3">Komponen Penghasilan (Rp)</h4>
                        <p class="text-muted small">Masukkan angka saja tanpa titik pemisah ribuan. Gunakan koma untuk desimal jika perlu (contoh: 5000000 atau 5000000,75). Total akan dihitung otomatis.</p>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gaji_pokok" class="form-label">Gaji Pokok (Rp) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control numeric-input" id="gaji_pokok" name="gaji_pokok" value="<?= set_value('gaji_pokok', '0');?>" placeholder="Contoh: 5000000" required>
                                    <?= form_error('gaji_pokok', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tunjangan_jabatan" class="form-label">Tunjangan Jabatan (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_jabatan" name="tunjangan_jabatan" value="<?= set_value('tunjangan_jabatan', '0');?>" placeholder="Contoh: 1000000">
                                     <?= form_error('tunjangan_jabatan', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tunjangan_fungsional" class="form-label">Tunjangan Fungsional (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_fungsional" name="tunjangan_fungsional" value="<?= set_value('tunjangan_fungsional', '0');?>" placeholder="Contoh: 750000">
                                    <?= form_error('tunjangan_fungsional', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tunjangan_makan" class="form-label">Tunjangan Makan (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_makan" name="tunjangan_makan" value="<?= set_value('tunjangan_makan', '0');?>" placeholder="Contoh: 500000">
                                    <?= form_error('tunjangan_makan', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tunjangan_transport" class="form-label">Tunjangan Transport (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_transport" name="tunjangan_transport" value="<?= set_value('tunjangan_transport', '0');?>" placeholder="Contoh: 300000">
                                    <?= form_error('tunjangan_transport', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tunjangan_lainnya" class="form-label">Tunjangan Lainnya (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="tunjangan_lainnya" name="tunjangan_lainnya" value="<?= set_value('tunjangan_lainnya', '0');?>" placeholder="Contoh: 200000">
                                    <?= form_error('tunjangan_lainnya', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="total_penghasilan_bruto" class="form-label">Total Penghasilan Bruto (Rp) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="total_penghasilan_bruto" name="total_penghasilan_bruto" value="<?= set_value('total_penghasilan_bruto', '0');?>" placeholder="Otomatis terisi" required readonly>
                                    <?= form_error('total_penghasilan_bruto', '<small class="text-danger">', '</small>');?>
                                </div>
                                <h4 class="mt-4 mb-3">Komponen Potongan (Rp)</h4>
                                <div class="form-group mb-3">
                                    <label for="pot_pph21" class="form-label">Pot. PPh 21 (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="pot_pph21" name="pot_pph21" value="<?= set_value('pot_pph21', '0');?>" placeholder="Contoh: 250000">
                                     <?= form_error('pot_pph21', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pot_bpjs_tk" class="form-label">Pot. BPJS TK (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="pot_bpjs_tk" name="pot_bpjs_tk" value="<?= set_value('pot_bpjs_tk', '0');?>" placeholder="Contoh: 150000">
                                     <?= form_error('pot_bpjs_tk', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pot_bpjs_kesehatan" class="form-label">Pot. BPJS Kesehatan (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="pot_bpjs_kesehatan" name="pot_bpjs_kesehatan" value="<?= set_value('pot_bpjs_kesehatan', '0');?>" placeholder="Contoh: 100000">
                                     <?= form_error('pot_bpjs_kesehatan', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="potongan_lainnya" class="form-label">Potongan Lainnya (Rp)</label>
                                    <input type="text" class="form-control numeric-input" id="potongan_lainnya" name="potongan_lainnya" value="<?= set_value('potongan_lainnya', '0');?>" placeholder="Contoh: 50000">
                                     <?= form_error('potongan_lainnya', '<small class="text-danger">', '</small>');?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="total_potongan" class="form-label">Total Potongan (Rp) <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="total_potongan" name="total_potongan" value="<?= set_value('total_potongan', '0');?>" placeholder="Otomatis terisi" required readonly>
                                    <?= form_error('total_potongan', '<small class="text-danger">', '</small>');?>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-4 mb-3">Penghasilan Bersih</h4>
                        <div class="form-group mb-3">
                            <label for="thp" class="form-label">THP / Take-Home Pay (Angka Saja, Rp) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="thp" name="thp" value="<?= set_value('thp', '0');?>" placeholder="Otomatis terisi" required readonly>
                            <small class="form-text text-muted">Ini adalah nilai yang akan digunakan untuk perhitungan median (server-side).</small>
                            <?= form_error('thp', '<small class="text-danger">', '</small>');?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="thp_display" class="form-label">THP / Take-Home Pay (Format Tampilan, jika berbeda)</label>
                            <input type="text" class="form-control" id="thp_display" name="thp_display" value="<?= set_value('thp_display');?>" placeholder="Contoh: Rp 7.200.000">
                            <small class="form-text text-muted">Opsional. Jika kosong, akan sama dengan THP di atas (setelah diformat).</small>
                            <?= form_error('thp_display', '<small class="text-danger">', '</small>');?>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Kirim Data Survei</button>
                    <?= form_close();?>
                </div>

                <?php if(isset($hasil_median_kampus)):?>
                <div class="median-results-container mt-5">
                    <h3 class="mb-4 text-center">Median Penghasilan per Kampus</h3>
                    <?php if (!empty($hasil_median_kampus)):?>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <?php foreach ($hasil_median_kampus as $hasil):?>
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-header">
                                            <h5 class="my-0 fw-normal"><?= html_escape($hasil['nama_kampus']);?></h5>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title pricing-card-title">
                                                Rp <?= number_format($hasil['median_thp'], 0, ',', '.');?>
                                            </h3>
                                            <p class="text-muted">Median Take-Home Pay</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    <?php else:?>
                        <p class="text-center text-muted">Belum ada data survei yang cukup untuk menampilkan hasil median per kampus.</p>
                    <?php endif;?>
                </div>
                <?php endif;?>
                
                <?php if(isset($hasil_median_jenis_pekerja)):?>
                <div class="median-results-container mt-5">
                    <h3 class="mb-4 text-center">Median Penghasilan per Jenis Pekerja</h3>
                    <?php if (!empty($hasil_median_jenis_pekerja)):?>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <?php foreach ($hasil_median_jenis_pekerja as $hasil):?>
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-header">
                                            <h5 class="my-0 fw-normal"><?= html_escape($hasil['jenis_pekerja']);?></h5>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title pricing-card-title">
                                                Rp <?= number_format($hasil['median_thp'], 0, ',', '.');?>
                                            </h3>
                                            <p class="text-muted">Median Take-Home Pay</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    <?php else:?>
                        <p class="text-center text-muted">Belum ada data survei yang cukup untuk menampilkan hasil median per jenis pekerja.</p>
                    <?php endif;?>
                </div>
                <?php endif;?>

            </div>
        </div>
    </div>
</section>

</body>
