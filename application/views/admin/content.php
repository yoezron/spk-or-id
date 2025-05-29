<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Salam Perjuangan <?= $user['name']; ?>!</h1>

    <div class="col-lg-11 mx-auto">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow mb-4">
            <div class="card-body">
                <h1>Kostumisasi Halaman</h1>
                <div class="mb-3">
                    <!-- About Card -->
                    <div class="card">
                        <div class="card-header">
                            About
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/update_about'); ?>" method="POST">
                                <label for="about_title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="about_title" name="about_title" value="<?= $content['about_title']; ?>" required>
                                <br>
                                <label for="about_content" class="form-label">Isi Tulisan</label>
                                <textarea class="form-control" id="about_content" name="about_content" rows="3" required><?= $content['about_content']; ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                    <!-- Sejarah Card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            Sejarah
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/update_sejarah'); ?>" method="POST">
                                <label for="sej_title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="sej_title" name="sej_title" value="<?= $content['sej_title']; ?>" required>
                                <br>
                                <label for="sej_content" class="form-label">Isi Tulisan</label>
                                <textarea class="form-control" id="sej_content" name="sej_content" rows="3" required><?= $content['sej_content']; ?></textarea>
                                <br>
                                <label for="sej_quotes" class="form-label">Kutipan</label>
                                <textarea class="form-control" id="sej_quotes" name="sej_quotes" rows="3" required><?= $content['sej_quotes']; ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Manifesto Card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            Manifesto
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/update_manifesto'); ?>" method="POST">
                                <label for="manif_title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="manif_title" name="manif_title" value="<?= $content['manif_title']; ?>">
                                <br>
                                <label for="manif_content" class="form-label">Isi Tulisan</label>
                                <textarea class="form-control" id="manif_content" name="manif_content" rows="3"><?= $content['manif_content']; ?></textarea>
                                <br>
                                <label for="manif_quotes" class="form-label">Kutipan</label>
                                <textarea class="form-control" id="manif_quotes" name="manif_quotes" rows="3"><?= $content['manif_quotes']; ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Visi Misi Card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            Visi Misi
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/update_vm'); ?>" method="POST">
                                <label for="vm_title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="vm_title" name="vm_title" value="<?= $content['vm_title']; ?>">
                                <br>
                                <label for="vm_content" class="form-label">Isi Tulisan</label>
                                <textarea class="form-control" id="vm_content" name="vm_content" rows="3"><?= $content['vm_content']; ?></textarea>
                                <br>
                                <label for="vm_quotes" class="form-label">Kutipan</label>
                                <textarea class="form-control" id="vm_quotes" name="vm_quotes" rows="3"><?= $content['vm_quotes']; ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Pengurus Card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            Pengurus
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/update_pengurus'); ?>" method="POST">
                                <label for="urus_title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="urus_title" name="urus_title" value="<?= $content['urus_title']; ?>">
                                <br>
                                <label for="urus_content" class="form-label">Isi Tulisan</label>
                                <textarea class="form-control" id="urus_content" name="urus_content" rows="3"><?= $content['urus_content']; ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- Link Dokumen Card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            Link Dokumen
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/update_link'); ?>" method="POST">
                                <label for="link_title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="link_title" name="link_title" value="<?= $content['link_title']; ?>">
                                <br>
                                <label for="link" class="form-label">Isi Tulisan</label>
                                <textarea class="form-control" id="link" name="link" rows="3"><?= $content['link']; ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                    <!-- Publikasi Card -->
                    <div class="card mt-3">
                        <div class="card-header">
                            Publikasi
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/update_publikasi'); ?>" method="POST">
                                <label for="publikasi_title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="publikasi_title" name="publikasi_title" value="<?= $content['publikasi_title']; ?>">
                                <br>
                                <label for="publikasi" class="form-label">Isi Tulisan</label>
                                <textarea class="form-control" id="publikasi" name="publikasi" rows="3"><?= $content['publikasi']; ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->