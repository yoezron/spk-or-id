<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image ">
                    <img src="<?= base_url('assets\img\normal\register.jpeg'); ?>" alt="login" style="height: 100%; width: 100%;">
                </div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Bergabung Bersama Kami!</h1>
                        </div>
                        <div>
                            <form class="user" method="post" action="<?= base_url('auth'); ?>/registration">
                                <div class="form-group row">
                                    <div class="col-lg-1 d-flex align-items-center">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <div class="col-lg-11">
                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-1 d-flex align-items-center">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="col-lg-11">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-1 d-flex align-items-center">
                                        <i class="fas fa-venus-mars"></i>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="gender" name="gender" value="<?= set_value('gender'); ?>">
                                            <option selected disabled>Jenis Kelamin</option>
                                            <option>laki-laki</option>
                                            <option>perempuan</option>
                                        </select>
                                        <?= form_error('gender', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="col-sm-1 d-flex align-items-center">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" id="status" name="status" value="<?= set_value('status'); ?>">
                                            <option selected disabled>Status Kepegawaian</option>
                                            <option>Dosen PNS</option>
                                            <option>PPPK</option>
                                            <option>Dosen Tetap Non PNS</option>
                                            <option>Dosen Tidak Tetap/Honorer</option>
                                            <option>Dosen Kontrak</option>
                                            <option>Tendik PNS</option>
                                            <option>Tendik Tetap Non PNS</option>
                                            <option>Tendik Tidak Tetap/Honorer</option>
                                            <option>Tendik Kontrak</option>
                                            <option>Outsourcing</option>
                                        </select>
                                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-1 d-flex align-items-center">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div class="col-lg-11">
                                        <input type="text" class="form-control form-control-user" id="kampus" name="kampus" placeholder="Asal Kampus" value="<?= set_value('kampus'); ?>">
                                        <?= form_error('kampus', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-1 d-flex align-items-center">
                                        <i class="fas fa-globe-americas"></i>
                                    </div>
                                    <div class="col-lg-11">
                                        <select class="form-select" id="wilayah" name="wilayah" value="<?= set_value('wilayah'); ?>">
                                            <option selected disabled>Wilayah Provinsi Kampus</option>
                                            <option> Nanggroe Aceh Darussalam </option>
                                            <option> Sumatera Utara </option>
                                            <option> Sumatera Selatan </option>
                                            <option> Sumatera Barat </option>
                                            <option> Bengkulu </option>
                                            <option> Riau </option>
                                            <option> Kepulauan Riau </option>
                                            <option> Jambi </option>
                                            <option> Lampung </option>
                                            <option> Bangka Belitung </option>
                                            <option> Kalimantan Barat </option>
                                            <option> Kalimantan Timur </option>
                                            <option> Kalimantan Selatan </option>
                                            <option> Kalimantan Tengah </option>
                                            <option> Kalimantan Utara </option>
                                            <option> Banten </option>
                                            <option> DKI Jakarta </option>
                                            <option> Jawa Barat </option>
                                            <option> Jawa Tengah </option>
                                            <option> Daerah Istimewa Yogyakarta </option>
                                            <option> Jawa Timur </option>
                                            <option> Bali </option>
                                            <option> Nusa Tenggara Timur </option>
                                            <option> Nusa Tenggara Barat </option>
                                            <option> Gorontalo </option>
                                            <option> Sulawesi Barat </option>
                                            <option> Sulawesi Tengah </option>
                                            <option> Sulawesi Utara </option>
                                            <option> Sulawesi Tenggara </option>
                                            <option> Sulawesi Selatan </option>
                                            <option> Maluku Utara </option>
                                            <option> Maluku </option>
                                            <option> Papua Barat </option>
                                            <option> Papua </option>
                                            <option> Papua Tengah </option>
                                            <option> Papua Pegunungan </option>
                                            <option> Papua Selatan </option>
                                            <option> Papua Barat Daya </option>
                                        </select>
                                        <?= form_error('wilayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-1 d-flex align-items-center">
                                        <i class="fas fa-tty"></i>
                                    </div>
                                    <div class="col-lg-11">
                                        <input type="text" class="form-control form-control-user" id="telp" name="telp" placeholder="Nomor Whatsapp" value="<?= set_value('telp'); ?>" oninput="formatPhoneNumber()">
                                        <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-1 d-flex align-items-center">
                                        <i class="fas fa-unlock-alt"></i>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                    </div>
                                </div>


                                <!-- Checkbox Term and Condition -->
                                <small style="font-style: italic;">Silakan dibaca dan ceklis dua pernyataan dibawah ini:</small>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="agree_terms" name="agree_terms" required>
                                        <label class="custom-control-label" for="agree_terms">Dengan mendaftar saya bersedia mematuhi <a href="https://spk.or.id/adart">AD/ART</a> Serikat Pekerja Kampus</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="agree_terms2" name="agree_terms2" required>
                                        <label class="custom-control-label" for="agree_terms2">Setelah registrasi dan aktivasi akun, Pendaftaran dilanjutkan dengan mengisi lengkap formulir pendaftaran (setelah login).</label>
                                    </div>
                                </div>

                                <!-- Peringatan untuk checklist -->
                                <small id="checkboxWarning" style="color: red; display: none;">
                                    Anda harus mencentang semua pernyataan di atas untuk melanjutkan registrasi akun.
                                </small>

                                <!-- Tombol registrasi -->
                                <button type="submit" onclick="validateCheckboxes()" class="btn btn-primary btn-user btn-block">Registrasi Akun</button>

                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword') ?>">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth')  ?>">Sudah punya akun? Login!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function validateCheckboxes() {
        const checkbox1 = document.getElementById("agree_terms");
        const checkbox2 = document.getElementById("agree_terms2");
        const warningMessage = document.getElementById("checkboxWarning");

        if (!checkbox1.checked || !checkbox2.checked) {
            warningMessage.style.display = "block";
        } else {
            warningMessage.style.display = "none";
            document.querySelector("form").submit(); // Submit form jika semua checkbox dicentang
        }
    }
</script>

<script>
    function formatPhoneNumber() {
        const input = document.getElementById("telp");
        let phoneNumber = input.value;

        // Jika nomor dimulai dengan "0", gantikan dengan "+62"
        if (phoneNumber.startsWith("0")) {
            phoneNumber = "62" + phoneNumber.slice(1);
            input.value = phoneNumber;
        }
        // Menghapus karakter non-numerik, kecuali tanda "+"
        input.value = phoneNumber.replace(/[^+\d]/g, '');
    }
</script>