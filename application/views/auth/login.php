<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 mx-auto d-none d-lg-block bg-login-image">
                            <img src="<?= base_url('assets\img\normal\login.png'); ?>" alt="login" style="height: 100%; width: 100%;">
                        </div>
                        <div class="col-lg-6">
                            <div>
                                <img class="mt-3 mx-auto d-block" src="<?= base_url('assets/') ?>/img/logo/logo-2.png" alt="" />
                            </div>
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Mari Berjuang Bersama!</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan alamat email..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword') ?>">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration')  ?>">Bikin Akun!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    
    <!--==============================
Modal Area  
==============================-->
    <!-- Modal Pop-Up -->
    <div class="modal-overlay" id="popupModal">
        <div class="modal-content">
            <span class="modal-close" id="closeModal"><i class="fas fa-times-circle"></i></span>
            <img src="https://ik.imagekit.io/spk170823/bayar_iuran.png?updatedAt=1747067811557" alt="Iuran SPK" border="0">
            <a href="https://spk.or.id/user" target="_blank">Bayar Iuran Sekarang</a>
        </div>
    </div>

</div>