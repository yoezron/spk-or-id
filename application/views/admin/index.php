<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <img src="<?= base_url('assets/img/dashboard/') . 'members.png' ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Jumlah Anggota</h5>
                    <h1 class="card-text text-center"><strong><?= $total_users - 1; ?></strong></h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="<?= base_url('assets/img/dashboard/') . 'members-man.png' ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Laki-Laki</h5>
                    <h1 class="card-text text-center"><?= $male_count; ?></h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="<?= base_url('assets/img/dashboard/') . 'members-woman.png' ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">Perempuan</h5>
                    <h1 class="card-text text-center"><?= $female_count; ?></h1>
                </div>
            </div>
        </div>

    </div>
</div>



</div>
<!-- End of Main Content -->