<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading dengan Welcome Message -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-tachometer-alt text-dark"></i> Dashboard Admin
        </h1>
        <div class="text-muted">
            <i class="fas fa-clock"></i> <?= date('l, d F Y'); ?>
        </div>
    </div>

    <!-- Welcome Alert -->
    <div class="alert alert-light border alert-dismissible fade show" role="alert">
        <i class="fas fa-user-shield text-dark"></i>
        <strong>Salam Perjuangan, <?= $user['name']; ?>!</strong>
        Selamat datang di dashboard administrasi SPK.
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>

    <!-- Statistics Cards Row -->
    <div class="row">

        <!-- Total Members Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2 card-hover">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Anggota
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $total_users; ?>">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Members Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2 card-hover">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Anggota Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $active_members; ?>">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Members This Month -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2 card-hover">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Anggota Baru (30 Hari)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $new_members_month; ?>">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inactive Members Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2 card-hover">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Belum Aktif
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $inactive_members; ?>">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-times fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Gender Distribution Row -->
    <div class="row">

        <!-- Laki-Laki Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2 card-hover">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Anggota Laki-Laki
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $male_count; ?>">0</div>
                            <div class="text-xs text-muted">
                                <?php
                                $total_gender = $male_count + $female_count;
                                $male_percentage = $total_gender > 0 ? round(($male_count / $total_gender) * 100, 1) : 0;
                                echo $male_percentage . '%';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Perempuan Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2 card-hover">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Anggota Perempuan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 counter" data-target="<?= $female_count; ?>">0</div>
                            <div class="text-xs text-muted">
                                <?php
                                $female_percentage = $total_gender > 0 ? round(($female_count / $total_gender) * 100, 1) : 0;
                                echo $female_percentage . '%';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-female fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gender Chart Card -->
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3 bg-dark text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-chart-pie"></i> Distribusi Gender
                    </h6>
                </div>
                <div class="card-body">
                    <canvas id="genderChart"></canvas>
                </div>
            </div>
        </div>

    </div>

    <!-- Charts Row -->
    <div class="row">

        <!-- Member Growth Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark text-white d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-chart-line"></i> Pertumbuhan Anggota (6 Bulan Terakhir)
                    </h6>
                </div>
                <div class="card-body">
                    <canvas id="memberGrowthChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Top Kampus Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-university"></i> Top 5 Kampus
                    </h6>
                </div>
                <div class="card-body">
                    <canvas id="topKampusChart"></canvas>
                </div>
            </div>
        </div>

    </div>

    <!-- Status Kepegawaian & Recent Members Row -->
    <div class="row">

        <!-- Status Kepegawaian Breakdown -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-briefcase"></i> Status Kepegawaian
                    </h6>
                </div>
                <div class="card-body">
                    <?php if (!empty($status_breakdown)): ?>
                        <?php foreach ($status_breakdown as $status): ?>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <small class="text-muted"><?= $status['status'] ?: 'Tidak Diisi'; ?></small>
                                    <strong><?= $status['count']; ?> orang</strong>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <?php
                                    $percentage = ($status['count'] / $total_users) * 100;
                                    ?>
                                    <div class="progress-bar bg-dark" role="progressbar"
                                        style="width: <?= $percentage; ?>%"
                                        aria-valuenow="<?= $percentage; ?>" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted text-center">Belum ada data status kepegawaian.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Recent Members -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-dark text-white">
                    <h6 class="m-0 font-weight-bold">
                        <i class="fas fa-clock"></i> Anggota Terbaru
                    </h6>
                </div>
                <div class="card-body" style="max-height: 350px; overflow-y: auto;">
                    <?php if (!empty($recent_members)): ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($recent_members as $member): ?>
                                <div class="list-group-item list-group-item-action px-0">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1"><?= $member['name']; ?></h6>
                                        <small class="text-muted">
                                            <?= date('d M Y', strtotime($member['date_created'])); ?>
                                        </small>
                                    </div>
                                    <p class="mb-1 text-sm"><?= $member['email']; ?></p>
                                    <small class="text-muted">
                                        <i class="fas fa-university"></i> <?= $member['kampus'] ?: 'Belum diisi'; ?>
                                    </small>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted text-center">Belum ada anggota terbaru.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Chart.js Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        const duration = 2000;
        const increment = target / (duration / 16);

        let current = 0;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.textContent = target;
                clearInterval(timer);
            } else {
                counter.textContent = Math.ceil(current);
            }
        }, 16);
    });

    // Gender Pie Chart - BLACK & WHITE THEME
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'doughnut',
        data: {
            labels: ['Laki-Laki', 'Perempuan'],
            datasets: [{
                data: [<?= $male_count; ?>, <?= $female_count; ?>],
                backgroundColor: ['#2d3436', '#636e72'],
                hoverBackgroundColor: ['#000000', '#b2bec3'],
                hoverBorderColor: "#dfe6e9",
            }],
        },
        options: {
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            cutout: '70%'
        }
    });

    // Member Growth Line Chart - BLACK & WHITE THEME
    const growthCtx = document.getElementById('memberGrowthChart').getContext('2d');
    new Chart(growthCtx, {
        type: 'line',
        data: {
            labels: [<?php echo '"' . implode('","', array_column($monthly_trend, 'month')) . '"'; ?>],
            datasets: [{
                label: 'Jumlah Pendaftaran',
                data: [<?php echo implode(',', array_column($monthly_trend, 'count')); ?>],
                borderColor: '#2d3436',
                backgroundColor: 'rgba(45, 52, 54, 0.1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointRadius: 5,
                pointHoverRadius: 7,
                pointBackgroundColor: '#2d3436',
                pointBorderColor: '#fff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    // Top Kampus Bar Chart - BLACK & WHITE THEME
    const kampusCtx = document.getElementById('topKampusChart').getContext('2d');
    new Chart(kampusCtx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                if (!empty($top_kampus)) {
                    foreach ($top_kampus as $kampus) {
                        $kampus_name = strlen($kampus['kampus']) > 20 ?
                            substr($kampus['kampus'], 0, 20) . '...' : $kampus['kampus'];
                        echo '"' . $kampus_name . '",';
                    }
                }
                ?>
            ],
            datasets: [{
                label: 'Jumlah Anggota',
                data: [<?php
                        if (!empty($top_kampus)) {
                            echo implode(',', array_column($top_kampus, 'count'));
                        }
                        ?>],
                backgroundColor: ['#2d3436', '#636e72', '#95a5a6', '#b2bec3', '#dfe6e9'],
                borderColor: '#2d3436',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
});
</script>

<style>
/* Black & White Theme */
.card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25) !important;
}

.progress-bar {
    transition: width 1s ease;
}

.list-group-item-action:hover {
    background-color: #f8f9fa;
}

.card-body::-webkit-scrollbar {
    width: 6px;
}

.card-body::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.card-body::-webkit-scrollbar-thumb {
    background: #2d3436;
    border-radius: 3px;
}

.card-body::-webkit-scrollbar-thumb:hover {
    background: #000;
}

/* Border colors for cards */
.border-left-dark {
    border-left: 0.25rem solid #2d3436 !important;
}

.border-left-secondary {
    border-left: 0.25rem solid #636e72 !important;
}
</style>
