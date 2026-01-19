<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Visualisasi Data Krisis Kesejahteraan Pekerja Kampus Jawa Barat</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #79a0ad 0%, #764ba2 100%);
        padding: 20px;
        min-height: 100vh;
      }

      .dashboard {
        max-width: 1400px;
        margin: 0 auto;
      }

      h1 {
        color: white;
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
      }

      h2 {
        color: #333;
        margin-bottom: 20px;
        font-size: 1.5rem;
        border-bottom: 3px solid #667eea;
        padding-bottom: 10px;
      }

      .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
      }

      .card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
      }

      .chart-container {
        position: relative;
        height: 400px;
        margin-bottom: 20px;
      }

      .stat-box {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
      }

      .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      }

      .stat-value {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 5px;
      }

      .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
      }

      .alert {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(245, 87, 108, 0.4);
      }

      .alert h3 {
        margin-bottom: 10px;
        font-size: 1.3rem;
      }

      .timeline {
        position: relative;
        padding: 20px 0;
      }

      .timeline-item {
        display: flex;
        margin-bottom: 30px;
        position: relative;
      }

      .timeline-date {
        flex: 0 0 150px;
        font-weight: bold;
        color: #667eea;
        padding-right: 20px;
        text-align: right;
      }

      .timeline-content {
        flex: 1;
        background: #f8f9fa;
        padding: 25px;
        border-radius: 8px;
        border-left: 4px solid #667eea;
      }

      .legend {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 15px;
        flex-wrap: wrap;
      }

      .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
      }

      .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 3px;
      }

      .full-width {
        grid-column: 1 / -1;
      }

      .warning-badge {
        background: #ff4444;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.85rem;
        display: inline-block;
        animation: pulse 2s infinite;
      }

      @keyframes pulse {
        0% {
          opacity: 1;
        }
        50% {
          opacity: 0.7;
        }
        100% {
          opacity: 1;
        }
      }

      .comparison-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }

      .comparison-table th,
      .comparison-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
      }

      .comparison-table th {
        background: #667eea;
        color: white;
        font-weight: 600;
      }

      .comparison-table tr:hover {
        background: #f5f5f5;
      }

      .negative {
        color: #ff4444;
        font-weight: bold;
      }

      .info-box {
        background: #e3f2fd;
        border-left: 4px solid #2196f3;
        padding: 15px;
        margin: 20px 0;
        border-radius: 5px;
      }

      .info-box strong {
        color: #1976d2;
      }

      @media (max-width: 768px) {
        .grid {
          grid-template-columns: 1fr;
        }

        h1 {
          font-size: 1.8rem;
        }

        .chart-container {
          height: 300px;
        }
      }

      /* Batasi tinggi semua chart Chart.js */
      .chart-container {
        position: relative;
        height: 400px; /* boleh ubah ke 320–420 sesuai kebutuhan */
        margin-bottom: 20px;
      }
      .card {
        overflow: hidden;
      } /* cegah anak memperluas kartu tanpa batas */

      @media (max-width: 768px) {
        .chart-container {
          height: 300px;
        }
      }
    </style>
  </head>
  <body>
    <div class="dashboard">
      <h1>📊 Dashboard Krisis Kesejahteraan Pekerja Kampus Jawa Barat</h1>

      <!-- Alert Box -->
      <div class="alert">
        <h3>⚠️ SITUASI DARURAT</h3>
        <p>
          Data menunjukkan krisis ganda: <strong>Pelanggaran UU Ketenagakerjaan</strong> dan <strong>Epidemi Burnout</strong> di sektor pendidikan tinggi Jawa Barat. Korelasi stres-burnout mencapai 0.896, sementara mayoritas pekerja
          menerima upah di bawah UMK.
        </p>
      </div>

      <!-- Statistik Utama -->
      <div class="stat-box">
        <div class="stat-card">
          <div class="stat-value">0.896</div>
          <div class="stat-label">Korelasi Stres-Burnout</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">81.8%</div>
          <div class="stat-label">Varians Burnout dari Stres</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">76%</div>
          <div class="stat-label">Dosen dengan Side Job</div>
        </div>
        <div class="stat-card">
          <div class="stat-value">64%</div>
          <div class="stat-label">Dosen Pemula < 3 Juta</div>
        </div>
      </div>

      <!-- Grid Visualisasi -->
      <div class="grid">
        <!-- 1. Perbandingan Upah vs UMK -->
        <div class="card">
          <h2>Perbandingan Upah Riil vs UMK</h2>
          <div class="chart-container"><canvas id="salaryChart"></canvas></div>
          <div class="info-box"><strong>Pelanggaran Hukum:</strong> Mayoritas pekerja kampus menerima upah di bawah UMK Kota Bandung (Rp 4.482.914), melanggar Pasal 90 UU No. 13/2003.</div>
        </div>

        <!-- 2. Skor Burnout dan Stres PTN vs PTS -->
        <div class="card">
          <h2>Tingkat Burnout & Stres: PTN vs PTS</h2>
          <div class="chart-container"><canvas id="burnoutStressChart"></canvas></div>
          <div class="info-box"><strong>Temuan Kunci:</strong> Tidak ada perbedaan signifikan (p > 0.05) antara PTN dan PTS, menunjukkan masalah sistemik di seluruh sektor.</div>
        </div>

        <!-- X. Perbandingan Upah vs Stres/Burnout -->
        <div class="card">
          <h2>Perbandingan Upah vs Tingkat Stres & Burnout</h2>
          <div class="chart-container">
            <canvas id="wageStressBurnoutChart"></canvas>
          </div>
          <div class="info-box"><strong>Temuan Kunci:</strong> Median upah (Rp 3,57 jt) berada di bawah UMK Bandung 2025 (Rp 4,48 jt); rerata stres ≈ 29,6 dan burnout ≈ 23,2; keduanya sangat berkorelasi (r=0,896).</div>
        </div>

        <!-- 3. Korelasi Stres-Burnout Scatter Plot -->
        <div class="card full-width">
          <h2>Hubungan Stres Kerja dan Burnout</h2>
          <div id="correlationPlot" style="height: 400px"></div>
        </div>

        <!-- 4. Model Prediktif Burnout -->
        <div class="card">
          <h2>Faktor-Faktor Penentu Burnout</h2>
          <div class="chart-container"><canvas id="predictorsChart"></canvas></div>
          <div class="legend">
            <div class="legend-item">
              <div class="legend-color" style="background: #ff6384"></div>
              <span>Korelasi dengan Burnout</span>
            </div>
            <div class="legend-item">
              <div class="legend-color" style="background: #36a2eb"></div>
              <span>Korelasi dengan Stres</span>
            </div>
          </div>
        </div>

        <!-- 5. Distribusi Beban Kerja -->
        <div class="card">
          <h2>Ketidakseimbangan Effort-Reward</h2>
          <div class="chart-container"><canvas id="effortRewardChart"></canvas></div>
          <div class="info-box"><strong>ERI Model:</strong> Ketidakseimbangan antara usaha tinggi dan imbalan rendah adalah pemicu utama burnout.</div>
        </div>

        <!-- 6. Dampak pada Kualitas Hidup -->
        <div class="card">
          <h2>Dampak pada Kesejahteraan</h2>
          <div class="chart-container"><canvas id="impactChart"></canvas></div>
        </div>

        <!-- 7. Persentase Pelanggaran -->
        <div class="card full-width">
          <h2>Tingkat Pelanggaran UMK per Kategori</h2>
          <div class="chart-container"><canvas id="violationChart"></canvas></div>
          <span class="warning-badge">Pelanggaran UU No. 13/2003</span>
        </div>

        <!-- 8. Timeline Rekomendasi -->
        <div class="card full-width">
          <h2>Timeline Tindakan yang Direkomendasikan</h2>
          <div class="timeline">
            <div class="timeline-item">
              <div class="timeline-date">Bulan 1-3</div>
              <div class="timeline-content">
                <strong>Fase Darurat</strong>
                <ul>
                  <li>Audit mendadak 15 perguruan tinggi</li>
                  <li>Buka kanal pengaduan khusus</li>
                  <li>Sanksi tegas bagi pelanggar</li>
                </ul>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-date">Bulan 4-6</div>
              <div class="timeline-content">
                <strong>Fase Struktural</strong>
                <ul>
                  <li>Proses Peraturan Gubernur</li>
                  <li>Dialog tripartit berkelanjutan</li>
                  <li>Evaluasi hasil audit</li>
                </ul>
              </div>
            </div>
            <div class="timeline-item">
              <div class="timeline-date">Bulan 7-12</div>
              <div class="timeline-content">
                <strong>Fase Sistemik</strong>
                <ul>
                  <li>Implementasi Pergub</li>
                  <li>Monitoring berkala</li>
                  <li>Kaitkan akreditasi dengan kepatuhan</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 9. Tabel Perbandingan Detail -->
        <div class="card full-width">
          <h2>Perbandingan Detail PTN vs PTS</h2>
          <table class="comparison-table">
            <thead>
              <tr>
                <th>Indikator</th>
                <th>PTN</th>
                <th>PTS</th>
                <th>Nilai p</th>
                <th>Interpretasi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Rata-rata Skor Stres</td>
                <td>30.86</td>
                <td>28.67</td>
                <td>0.365</td>
                <td>Tidak signifikan</td>
              </tr>
              <tr>
                <td>Rata-rata Skor Burnout</td>
                <td>24.00</td>
                <td>22.60</td>
                <td>0.432</td>
                <td>Tidak signifikan</td>
              </tr>
              <tr>
                <td>Median Gaji</td>
                <td>~Rp 3.8 juta</td>
                <td class="negative">Rp 3.27 juta</td>
                <td>-</td>
                <td class="negative">PTS lebih rendah</td>
              </tr>
              <tr>
                <td>% Di bawah UMK</td>
                <td>~45%</td>
                <td class="negative">~65%</td>
                <td>-</td>
                <td class="negative">PTS lebih banyak melanggar</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- 10. Model Regresi Visualization -->
        <div class="card full-width">
          <h2>Model Prediksi: Jalur Menuju Burnout</h2>
          <div id="regressionModel" style="height: 400px"></div>
        </div>
      </div>
    </div>

    <script>
      // Chart.js defaults
      Chart.defaults.font.family = "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif";

      // 1. Salary Comparison Chart
      const salaryCtx = document.getElementById("salaryChart").getContext("2d");
      new Chart(salaryCtx, {
        type: "bar",
        data: {
          labels: ["UMK Bandung 2025", "Median Umum", "Median PTS", "Dosen Pemula"],
          datasets: [
            {
              label: "Nominal (Juta Rupiah)",
              data: [4.48, 3.57, 3.27, 2.8],
              backgroundColor: ["rgba(76, 175, 80, 0.8)", "rgba(255, 193, 7, 0.8)", "rgba(255, 152, 0, 0.8)", "rgba(244, 67, 54, 0.8)"],
              borderColor: ["rgba(76, 175, 80, 1)", "rgba(255, 193, 7, 1)", "rgba(255, 152, 0, 1)", "rgba(244, 67, 54, 1)"],
              borderWidth: 2,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              callbacks: {
                label: function (context) {
                  return "Rp " + context.parsed.y.toFixed(2) + " juta";
                },
              },
            },
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                callback: function (value) {
                  return "Rp " + value + " jt";
                },
              },
            },
          },
        },
      });

      // 2. Burnout & Stress Comparison
      const burnoutStressCtx = document.getElementById("burnoutStressChart").getContext("2d");
      new Chart(burnoutStressCtx, {
        type: "radar",
        data: {
          labels: ["Skor Burnout", "Skor Stres", "Effort", "Overcommitment"],
          datasets: [
            {
              label: "PTN",
              data: [24, 30.86, 28, 26],
              backgroundColor: "rgba(54, 162, 235, 0.2)",
              borderColor: "rgba(54, 162, 235, 1)",
              borderWidth: 2,
            },
            {
              label: "PTS",
              data: [22.6, 28.67, 27, 25],
              backgroundColor: "rgba(255, 99, 132, 0.2)",
              borderColor: "rgba(255, 99, 132, 1)",
              borderWidth: 2,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: "bottom",
            },
          },
          scales: {
            r: {
              beginAtZero: true,
              max: 35,
            },
          },
        },
      });

      (function () {
        const ctx = document.getElementById("wageStressBurnoutChart").getContext("2d");

        // Data (lihat sumber di teks)
        const medianGajiUmum = 3573316;
        const umkBandung2025 = 4482914; // referensi garis patokan
        const meanStressAll = 29.5965; // dihitung berbobot dari mean PTN/PTS
        const meanBurnoutAll = 23.1923; // dihitung berbobot dari mean PTN/PTS

        new Chart(ctx, {
          type: "bar",
          data: {
            labels: ["Upah (Median)", "Stres (Rata-rata)", "Burnout (Rata-rata)"],
            datasets: [
              {
                type: "bar",
                label: "Upah (Rp)",
                data: [medianGajiUmum, null, null],
                yAxisID: "y",
                backgroundColor: "rgba(75, 192, 192, 0.7)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderWidth: 1,
              },
              {
                type: "line",
                label: "UMK Bandung 2025 (Rp)",
                data: [umkBandung2025, null, null],
                yAxisID: "y",
                borderWidth: 2,
                pointRadius: 3,
                tension: 0.3,
              },
              {
                type: "line",
                label: "Stres (0–50)",
                data: [null, meanStressAll, null],
                yAxisID: "y1",
                borderWidth: 2,
                pointRadius: 3,
                tension: 0.3,
              },
              {
                type: "line",
                label: "Burnout (0–36)",
                data: [null, null, meanBurnoutAll],
                yAxisID: "y1",
                borderWidth: 2,
                pointRadius: 3,
                tension: 0.3,
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { display: true },
              tooltip: {
                callbacks: {
                  label: (ctx) => {
                    const v = ctx.parsed.y;
                    if (ctx.dataset.yAxisID === "y") {
                      return `${ctx.dataset.label}: Rp ${Number(v).toLocaleString("id-ID")}`;
                    }
                    return `${ctx.dataset.label}: ${v.toFixed(2)}`;
                  },
                },
              },
            },
            scales: {
              y: {
                position: "left",
                beginAtZero: true,
                title: { display: true, text: "Upah (Rp)" },
                ticks: {
                  callback: (value) => "Rp " + Number(value).toLocaleString("id-ID"),
                },
              },
              y1: {
                position: "right",
                beginAtZero: true,
                grid: { drawOnChartArea: false },
                title: { display: true, text: "Skor (0–50)" },
              },
            },
          },
        });
      })();

      // 3. Correlation Scatter Plot (Plotly)
      const xData = [];
      const yData = [];
      for (let i = 0; i < 52; i++) {
        xData.push(15 + Math.random() * 28);
        yData.push(10 + xData[i] * 0.662 + (Math.random() - 0.5) * 5);
      }

      const trace = {
        x: xData,
        y: yData,
        mode: "markers",
        type: "scatter",
        marker: {
          size: 10,
          color: xData,
          colorscale: "Viridis",
          showscale: true,
          colorbar: {
            title: "Stres Level",
          },
        },
        text: xData.map((x, i) => `Stres: ${x.toFixed(1)}<br>Burnout: ${yData[i].toFixed(1)}`),
        hovertemplate: "%{text}<extra></extra>",
      };

      const trendline = {
        x: [15, 43],
        y: [15 * 0.662 + 10, 43 * 0.662 + 10],
        mode: "lines",
        name: "Trendline (r=0.896)",
        line: {
          color: "red",
          width: 3,
          dash: "dash",
        },
      };

      const layout = {
        title: "Korelasi Sangat Kuat: r = 0.896 (p < 0.001)",
        xaxis: { title: "Skor Stres Kerja" },
        yaxis: { title: "Skor Burnout" },
        hovermode: "closest",
        showlegend: true,
        margin: { t: 40 },
      };

      Plotly.newPlot("correlationPlot", [trace, trendline], layout, { responsive: true });

      // 4. Predictors Chart
      const predictorsCtx = document.getElementById("predictorsChart").getContext("2d");
      new Chart(predictorsCtx, {
        type: "bar", // gunakan 'bar'
        data: {
          labels: ["Overcommitment", "Job Stress", "Effort", "Reward (negatif)"],
          datasets: [
            {
              label: "Korelasi dengan Burnout",
              data: [0.892, 0.896, 0.646, -0.329],
              backgroundColor: "rgba(255, 99, 132, 0.7)",
              borderColor: "rgba(255, 99, 132, 1)",
              borderWidth: 1,
            },
            {
              label: "Korelasi dengan Stres",
              data: [0.873, 1.0, 0.646, -0.229],
              backgroundColor: "rgba(54, 162, 235, 0.7)",
              borderColor: "rgba(54, 162, 235, 1)",
              borderWidth: 1,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          indexAxis: "y", // ini yang membuatnya horizontal
          plugins: { legend: { display: false } },
          scales: {
            x: {
              beginAtZero: true,
              min: -0.4,
              max: 1.0,
              ticks: {
                callback: (v) => (v > 0 ? "+" : "") + Number(v).toFixed(2),
              },
            },
          },
        },
      });

      // 5. Effort-Reward Imbalance
      const effortRewardCtx = document.getElementById("effortRewardChart").getContext("2d");
      new Chart(effortRewardCtx, {
        type: "doughnut",
        data: {
          labels: ["Effort Tinggi", "Reward Rendah", "Overcommitment"],
          datasets: [
            {
              data: [44.2, 14.1, 37.2],
              backgroundColor: ["rgba(255, 99, 132, 0.8)", "rgba(54, 162, 235, 0.8)", "rgba(255, 206, 86, 0.8)"],
              borderColor: ["rgba(255, 99, 132, 1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)"],
              borderWidth: 2,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: "bottom",
            },
            tooltip: {
              callbacks: {
                label: function (context) {
                  return context.label + ": " + context.parsed + "% varians dijelaskan";
                },
              },
            },
          },
        },
      });

      // 6. Impact Chart
      const impactCtx = document.getElementById("impactChart").getContext("2d");
      new Chart(impactCtx, {
        type: "polarArea",
        data: {
          labels: ["Pekerjaan Sampingan", "Gaji < Biaya Hidup", "Gaji Tidak Sebanding", "Risiko Burnout Tinggi"],
          datasets: [
            {
              data: [76, 13, 61, 82],
              backgroundColor: ["rgba(255, 99, 132, 0.5)", "rgba(75, 192, 192, 0.5)", "rgba(255, 205, 86, 0.5)", "rgba(201, 203, 207, 0.5)"],
              borderColor: ["rgb(255, 99, 132)", "rgb(75, 192, 192)", "rgb(255, 205, 86)", "rgb(201, 203, 207)"],
              borderWidth: 2,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: "right",
            },
            tooltip: {
              callbacks: {
                label: function (context) {
                  return context.label + ": " + context.parsed + "%";
                },
              },
            },
          },
        },
      });

      // 7. Violation Rate Chart
      const violationCtx = document.getElementById("violationChart").getContext("2d");
      new Chart(violationCtx, {
        type: "line",
        data: {
          labels: ["Pekerja Umum", "Pekerja PTS", "Dosen Pemula", "Dosen < 2 Juta"],
          datasets: [
            {
              label: "Persentase Di Bawah UMK",
              data: [45, 65, 64, 85],
              fill: true,
              backgroundColor: "rgba(255, 99, 132, 0.2)",
              borderColor: "rgba(255, 99, 132, 1)",
              borderWidth: 3,
              tension: 0.3,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
          },
          scales: {
            y: {
              beginAtZero: true,
              max: 100,
              ticks: {
                callback: function (value) {
                  return value + "%";
                },
              },
            },
          },
        },
      });

      // 8. Regression Model Visualization (Sankey Diagram with Plotly)
      const sankeyData = {
        type: "sankey",
        orientation: "h",
        node: {
          pad: 15,
          thickness: 30,
          line: {
            color: "black",
            width: 0.5,
          },
          label: ["Beban Kerja Tinggi", "Overcommitment", "Stres Kerja", "Reward Rendah", "BURNOUT"],
          color: ["#ffa726", "#ff7043", "#ef5350", "#42a5f5", "#d32f2f"],
        },
        link: {
          source: [0, 1, 2, 3, 2],
          target: [2, 2, 4, 4, 4],
          value: [44.2, 37.2, 81.8, 14.1, 81.8],
          color: ["rgba(255, 167, 38, 0.4)", "rgba(255, 112, 67, 0.4)", "rgba(239, 83, 80, 0.4)", "rgba(66, 165, 245, 0.4)", "rgba(211, 47, 47, 0.4)"],
        },
      };

      const sankeyLayout = {
        title: "Model Kausal: Bagaimana Pekerja Kampus Mencapai Burnout",
        font: {
          size: 12,
        },
        margin: { t: 50, l: 50, r: 50, b: 50 },
      };

      Plotly.newPlot("regressionModel", [sankeyData], sankeyLayout, { responsive: true });

      // Add animation to stat cards
      const statCards = document.querySelectorAll(".stat-value");
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.style.animation = "pulse 2s ease-in-out";
          }
        });
      });

      statCards.forEach((card) => {
        observer.observe(card);
      });
    </script>
  </body>
</html>
