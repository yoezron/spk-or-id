<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message'); ?>

            <h5>Peran : <?= $role['role']; ?> </h5>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Akses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i;  ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <div class="form_check">
                                    <input type="checkbox" class="form-check-input" id="btncheck1" <?= check_access($role['id'], $m['id']);  ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>>
                                    <label class=" form-check-label" for="btncheck1">Aktifkan</label>
                                </div>

                            </td>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->