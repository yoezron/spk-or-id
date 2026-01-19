<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>


    <div class="row">
        <div class="col-lg-10">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <button href="" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newBayar">
                Tambah Pembayaran
            </button>

            <h1><strong>Jumlah Saldo: Rp.<?= number_format($total_bayar, 2, ',', '.');   ?></strong></h1>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Jumlah Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pembayaran as $pb) : ?>
                            <tr>
                                <th scope="row"><?= $i;  ?></th>
                                <td><?= date('d F Y', $pb['date_created']); ?></td>
                                <td><?= $pb['name']; ?></td>
                                <td>Rp.<?= number_format($pb['jumlah'], 2, ',', '.'); ?></td>
                                <td>
                                    <button href="" type="button" class="btn btn-warning">edit</button>

                                </td>
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
<div class="modal fade" id="newBayar" tabindex="-1" aria-labelledby="newBayar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="newBayar">Tambah Pembayaran</h2>
                <button type="button" class="btn btn-close btn-danger " data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('user/bayar'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-select form-select-sm" id="bulan" name="bulan" aria-label="Bulan">
                            <option selected>Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="name" id="name" class="form-control">
                            <option value="">Nama Anggota</option>
                            <?php foreach ($member as $me) : ?>
                                <option value="<?= $me['name'] ?>"><?= $me['name'] ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" aria-describedby="jumlah" Placeholder="Jumlah Pembayaran">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>