<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">

            <div class="card-body">
                <div id="peta-responden" style="height: 430px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt-4 mb-5">
    <h2 class="text-center mb-5">Dashboard Statistik Survei Upah Pekerja Kampus</h2>

    <!-- METRIC CARDS -->
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <div class="card card-metric text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Median Upah Nasional</h5>
                    <h3 class="card-text text-success">Rp<?= number_format($median_nasional, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card card-metric text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Rata-rata Upah Nasional</h5>
                    <h3 class="card-text text-primary">Rp<?= number_format($mean_nasional, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="card card-metric text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Responden</h5>
                    <h3 class="card-text"><?= $jumlah_responden ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW: Gender Pie & Pendidikan Pie -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Komposisi Gender Responden</h6>
                </div>
                <div class="card-body">
                    <div id="chart-komposisi-gender" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Komposisi Pendidikan Responden</h6>
                </div>
                <div class="card-body">
                    <div id="chart-komposisi-pendidikan" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW: Histogram Upah + Distribusi Lama Bekerja -->
    <div class="row">
        <div class="col-md-7 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Distribusi Upah Nasional</h6>
                </div>
                <div class="card-body">
                    <div id="chart-distribusi-upah" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Distribusi Lama Bekerja Responden</h6>
                </div>
                <div class="card-body">
                    <div id="chart-distribusi-lama-bekerja" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW: Upah Per Gender & Per Pendidikan -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Median Upah Berdasarkan Gender</h6>
                </div>
                <div class="card-body">
                    <div id="chart-upah-gender" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Median Upah Berdasarkan Pendidikan</h6>
                </div>
                <div class="card-body">
                    <div id="chart-upah-pendidikan" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW: Dosen vs Tendik & Status Kepegawaian -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Perbandingan Median Upah Dosen vs Tenaga Kependidikan</h6>
                </div>
                <div class="card-body">
                    <div id="chart-dosen-tendik" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Median Upah Berdasarkan Status Kepegawaian</h6>
                </div>
                <div class="card-body">
                    <div id="chart-upah-kepegawaian" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- ROW: Median Upah Berdasarkan Jenis Perguruan Tinggi -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Median Upah Berdasarkan Jenis Perguruan Tinggi</h6>
                </div>
                <div class="card-body">
                    <div id="chart-upah-jenis-pt" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Distribusi Median Upah Berdasarkan Lama Bekerja</h6>
                </div>
                <div class="card-body">
                    <div id="chart-upah-lama-bekerja" style="min-height: 340px;"></div>
                </div>
            </div>
        </div>
    </div>



    <!-- ROW: Provinsi Chart -->
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Perbandingan Median Upah per Provinsi</h6>
                </div>
                <div class="card-body">
                    <div id="chart-median-provinsi" style="min-height: 420px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW: Stacked Bar Provinsi x Gender -->
    <div class="row">
        <div class="col-12 mb-3">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Perbandingan Median Upah: Provinsi x Gender</h6>
                </div>
                <div class="card-body">
                    <div id="chart-prov-gender" style="min-height: 460px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLE: Statistik Ringkasan per Provinsi -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Statistik Ringkasan per Provinsi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Provinsi</th>
                                    <th>Median Upah</th>
                                    <th>Rata-rata Upah</th>
                                    <th>Jumlah Responden</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($per_provinsi as $prov): ?>
                                    <tr>
                                        <td><?= strtoupper($prov['provinsi']) ?></td>
                                        <td>Rp<?= number_format($prov['median_upah'], 0, ',', '.') ?></td>
                                        <td>Rp<?= number_format($prov['mean_upah'], 0, ',', '.') ?></td>
                                        <td><?= $prov['jumlah'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLE: Statistik Ringkasan per Kampus -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <h6 class="mb-0">Statistik Ringkasan per Kampus</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm mb-0" id="tabel-statistik-kampus">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama Kampus</th>
                                    <th>Median Upah</th>
                                    <th>Rata-rata Upah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($per_kampus as $kampus): ?>
                                    <tr>
                                        <td><?= strtoupper(htmlspecialchars($kampus['nama_kampus'])) ?></td>
                                        <td>Rp<?= number_format($kampus['median_upah'], 0, ',', '.') ?></td>
                                        <td>Rp<?= number_format($kampus['mean_upah'], 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>