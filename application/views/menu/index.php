<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>


<div class="row">
    <div class="col-lg-6">
        <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>

        <?= $this->session->flashdata('message'); ?>
        <button href="" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">
            Tambah Menu
        </button>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($menu as $m) : ?>
            <tr>
                <th scope="row"><?= $i;  ?></th>
                <td><?= $m['menu']; ?></td>
                <td>
                <button href="" type="button" class="btn btn-success">edit</button>
                <button href="" type="button" class="btn btn-danger">delete</button>

                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
</table>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newMenuModalLabel">Tambah Menu</h1>
        <button type="button" class="btn btn-close btn-danger" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <input type="text" class="form-control" id="menu" name="menu" aria-describedby="menu" placeholder="Nama Menu">
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


