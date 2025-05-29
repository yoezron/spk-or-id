<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Salam Perjuangan <?= $user['name']; ?> !</h1>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                <div class="form-group">
                    <div class="col-auto">
                        <label for="current_password" class="col-form-label">Password Lama</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" id="current_password" name="current_password" class="form-control">
                    </div>
                    <div class="col-auto">
                        <span id="passwordHelpInline" class="form-text text-danger">
                            Harus lebih dari 8 karakter.
                        </span>
                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <div class="col-auto">
                            <label for="new_password1" class="col-form-label">Password Baru</label>
                        </div>
                        <div class="col-auto">
                            <input type="password" id="new_password1" name="new_password1" class="form-control">
                        </div>
                        <div class="col-auto">
                            <span id="passwordHelpInline" class="form-text text-danger">
                                Harus lebih dari 8 karakter.
                            </span>
                            <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="col-auto">
                                <label for="new_password2" class="col-form-label">Ulangi Password Baru</label>
                            </div>
                            <div class="col-auto">
                                <input type="password" id="new_password2" name="new_password2" class="form-control">
                            </div>
                            <div class="col-auto">
                                <span id="passwordHelpInline" class="form-text text-danger">
                                    Password Harus sama.
                                </span>
                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="row mt-3 mx-3">
                                    <button type="submit" class="btn btn-primary">
                                        Ubah Password
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->