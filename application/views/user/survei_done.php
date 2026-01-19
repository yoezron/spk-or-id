 <div class="container mt-5 mb-5">
     <div class="card">
         <div class="card-header text-center">
             <h2><?= $title; ?> Layak Pekerja Kampus</h2>
             <p>Terima kasih telah berpartisipasi dalam survei upah layak Serikat Pekerja Kampus!</p>
         </div>
         <div class="card-body">
             <div class="d-flex align-items-center">
                 <i class="fas fa-check-circle fa-2x text-success me-3"></i>

                 <div>
                     <h5 class="card-title mb-1">Terima kasih, survei Anda telah tersimpan!</h5>
                     <p class="card-text text-muted small mb-0">
                         Terakhir diperbarui: <b><?= date('d M Y H:i', strtotime($survey['updated_at'])) ?></b>
                     </p>
                 </div>
             </div>

             <div class="text-end mt-3">
                 <a href="<?= base_url('user/update_survei_upah') ?>" class="btn btn-outline-primary btn-sm">
                     <i class="fas fa-edit me-1"></i> Update Survei
                 </a>
             </div>
             
             <!-- Tombol Statistik -->
             <a href="<?= base_url('statistik') ?>" class="btn btn-success btn-sm ms-2" target="_blank">
                 <i class="fas fa-chart-bar me-1"></i> Lihat Hasil Statistik Survei
             </a>
             
         </div>
     </div>
 </div>
 </div>