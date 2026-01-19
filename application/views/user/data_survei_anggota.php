<div class="container mt-4">
    <h2 class="mb-4"><?= $title; ?></h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabelSurveiAnggota" class="table table-bordered table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Nomor Anggota</th>
                            <th>Nama Lengkap</th>
                            <th>Email Anggota</th>
                            <th>Wilayah</th>
                            <th>Kampus</th>
                            <th>Telp</th>
                            <th>Provinsi</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Tingkat Pendidikan</th>
                            <th>Status Domisili</th>
                            <th>Komposisi Tinggal</th>
                            <th>Status Pernikahan</th>
                            <th>Pengurus SPK</th>
                            <th>Email Korespondensi</th>
                            <th>Jenis PT</th>
                            <th>Nama Kampus</th>
                            <th>Program Studi</th>
                            <th>Akreditasi</th>
                            <th>Status Kepegawaian</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Jenis Waktu Kerja</th>
                            <th>Tahun Mulai Bekerja</th>
                            <th>Status Keaktifan</th>
                            <th>Jabatan Struktural</th>
                            <th>Golongan Jabatan</th>
                            <th>Jabatan Fungsional</th>
                            <th>Sertifikat Pendidik</th>
                            <th>Pihak Perekrut</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan Jabatan</th>
                            <th>Tunjangan Fungsional</th>
                            <th>Tunjangan Makan</th>
                            <th>Tunjangan Transport</th>
                            <th>Tunjangan Lainnya</th>
                            <th>Total Penghasilan Bruto</th>
                            <th>Potongan PPh</th>
                            <th>Potongan PPn</th>
                            <th>Potongan BPJS TK</th>
                            <th>Potongan BPJS Kesehatan</th>
                            <th>Potongan Lainnya</th>
                            <th>Total Potongan</th>
                            <th>THP</th>
                            <th>Take Home Pay</th>
                            <th>Tunjangan Kinerja</th>
                            <th>Tunjangan Pendidikan</th>
                            <th>Tunjangan Tanggungan</th>
                            <th>Tunjangan Kehadiran Perhari</th>
                            <th>Rata-rata Tunjangan Kehadiran</th>
                            <th>Upah Lembur Perjam</th>
                            <th>Rata-rata Upah Lembur</th>
                            <th>Honor SKS</th>
                            <th>Rata-rata Honor Mengajar</th>
                            <th>Tunjangan Profesi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($survei as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['nomor_anggota']) ?></td>
                                <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                                <td><?= htmlspecialchars($row['email_anggota']) ?></td>
                                <td><?= htmlspecialchars($row['wilayah']) ?></td>
                                <td><?= htmlspecialchars($row['kampus']) ?></td>
                                <td><a href="https://wa.me/<?= $row['telp']; ?>?text=Salam%20perjuangan!" target="_blank" class="btn btn-success btn-sm">
                                        <?= $row['telp']; ?>
                                    </a></td>
                                <td><?= strtoupper(get_nama_provinsi($row['prov'])) ?></td>
                                <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                                <td><?= htmlspecialchars($row['usia']) ?></td>
                                <td><?= htmlspecialchars($row['jumlah_tanggungan']) ?></td>
                                <td><?= htmlspecialchars($row['tingkat_pendidikan']) ?></td>
                                <td><?= htmlspecialchars($row['status_domisili']) ?></td>
                                <td><?= htmlspecialchars($row['komposisi_tinggal']) ?></td>
                                <td><?= htmlspecialchars($row['status_pernikahan']) ?></td>
                                <td><?= htmlspecialchars($row['pengurus_spk']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= strtoupper(get_jenis_pt_name_by_id($row['id_jenis_pt'])) ?></td>
                                <td><?= strtoupper(get_kampus_name_by_id($row['id_kampus'])) ?></td>
                                <td><?= htmlspecialchars($row['program_studi']) ?></td>
                                <td><?= htmlspecialchars($row['akreditasi']) ?></td>
                                <td><?= htmlspecialchars($row['status_kepegawaian']) ?></td>
                                <td><?= htmlspecialchars($row['jenis_pekerjaan']) ?></td>
                                <td><?= htmlspecialchars($row['jenis_waktu_kerja']) ?></td>
                                <td><?= htmlspecialchars($row['tahun_mulai_bekerja']) ?></td>
                                <td><?= htmlspecialchars($row['status_keaktifan']) ?></td>
                                <td><?= htmlspecialchars($row['jabatan_struktural']) ?></td>
                                <td><?= htmlspecialchars($row['golongan_jabatan']) ?></td>
                                <td><?= htmlspecialchars($row['jabatan_fungsional']) ?></td>
                                <td><?= htmlspecialchars($row['sertifikat_pendidik']) ?></td>
                                <td><?= htmlspecialchars($row['pihak_perekrut']) ?></td>
                                <td><?= number_format($row['gaji_pokok'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_jabatan'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_fungsional'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_makan'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_transport'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_lainnya'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['total_penghasilan_bruto'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['pot_pph'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['pot_ppn'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['pot_bpjs_tk'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['pot_bpjs_kesehatan'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['potongan_lainnya'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['total_potongan'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['thp'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['take_home_pay'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_kinerja'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_pendidikan'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_tanggungan'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_kehadiran_perhari'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['rata2_tunjangan_kehadiran'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['upah_lembur_perjam'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['rata2_upah_lembur'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['honor_sks'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['rata2_honor_mengajar'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['tunjangan_profesi'], 0, ',', '.') ?></td>
                                <td>
                                    <a href="<?= base_url('user/edit_survei/' . $row['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?= base_url('user/delete_survei/' . $row['id']) ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Hapus data ini? Data tidak dapat dikembalikan!');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <style>
        #tabelSurveiAnggota tbody tr {
            height: 48px;
            vertical-align: middle;
        }

        #tabelSurveiAnggota td,
        #tabelSurveiAnggota th {
            vertical-align: middle !important;
        }

        /* Optional: Batasi lebar & potong teks */
        #tabelSurveiAnggota td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
    </style>
</div>
</div>