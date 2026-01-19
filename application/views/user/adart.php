<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>

    <!-- Memasukkan PDF Viewer -->
    <div class="card mt-5">
        <div class="card-header border-left-primary">
            AD-ART Serikat Pekerja Kampus
        </div>
        <div class="card-body">
            <iframe src="<?= base_url('user/pdf_viewer'); ?>" style="width: 100%; height: 800px; border: none;"></iframe>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->