<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>


    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomor Anggota</th>
                            <th scope="col">Nama Member</th>
                            <th scope="col">Email</th>
                            <th scope="col">Asal Kampus</th>
                            <th scope="col">Peran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($member as $me) : ?>
                            <tr>
                                <th scope="row"><?= $i;  ?></th>
                                <td><?= $me['date_created']; ?></td>
                                <td><?= $me['name']; ?></td>
                                <td><?= $me['email']; ?></td>
                                <td><?= $me['kampus']; ?></td>
                                <td><?= $me['role_id']; ?></td>
                                <td><?= anchor(base_url('admin/hapus/' . $me['id']), '<button type="button" class="btn btn-danger">hapus</button>') ?></td>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                            </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMemberModal" tabindex="-1" aria-labelledby="newMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="newMemberModalLabel">Tambah Member</h2>
                <button type="button" class="btn btn-close btn-danger " data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="title" Placeholder="Nama Sub Menu">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" aria-describedby="title" Placeholder="Sub Menu Url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" aria-describedby="title" Placeholder="Sub Menu Icon">
                    </div>
                    <div class="form-group">
                        <div class="mb-3 form-check">
                            <input type="checkbox" value="1" name="is_active" class="form-check-input" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Aktifkan?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
            </form>
        </div>
    </div>
</div>