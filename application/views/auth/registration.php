<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="row g-0">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img src="<?= base_url('assets/img/normal/register.jpeg'); ?>" alt="login" class="img-fluid h-100 w-100 rounded-start" style="object-fit:cover;">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900 fw-bold">Bergabung Bersama Kami!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/registration'); ?>" autocomplete="off" onsubmit="return validateCheckboxes();">
                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user-circle"></i></span>
                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
                                    </div>
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control form-control-user" id="email" name="email"
                                            placeholder="Alamat Email" value="<?= set_value('email'); ?>" oninput="this.value = this.value.toLowerCase();">
                                    </div>
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- Gender dan Status Kepegawaian -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                            <select class="form-select" id="gender" name="gender">
                                                <option selected disabled value="">Pilih Jenis Kelamin</option>
                                                <option <?= set_value('gender') == 'laki-laki' ? 'selected' : ''; ?>>laki-laki</option>
                                                <option <?= set_value('gender') == 'perempuan' ? 'selected' : ''; ?>>perempuan</option>
                                            </select>
                                        </div>
                                        <?= form_error('gender', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Status Kepegawaian</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                            <select class="form-select" id="status" name="status">
                                                <option selected disabled value="">Status Kepegawaian</option>
                                                <?php
                                                $opt_status = [
                                                    'Dosen PNS',
                                                    'PPPK',
                                                    'Dosen Tetap Non PNS',
                                                    'Dosen Tidak Tetap/Honorer',
                                                    'Dosen Kontrak',
                                                    'Tendik PNS',
                                                    'Tendik Tetap Non PNS',
                                                    'Tendik Tidak Tetap/Honorer',
                                                    'Tendik Kontrak',
                                                    'Outsourcing'
                                                ];
                                                foreach ($opt_status as $sts) {
                                                    $sel = set_value('status') == $sts ? 'selected' : '';
                                                    echo "<option $sel>$sts</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <!-- Kampus -->
                                <div class="mb-3">
                                    <label for="kampus" class="form-label">Asal Kampus</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                        <input type="text" class="form-control form-control-user" id="kampus" name="kampus" placeholder="Isi Nama Lengkap Kampus sesuai PDDIKTI (tanpa disingkat)" value="<?= set_value('kampus'); ?>">
                                    </div>
                                    <?= form_error('kampus', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- Wilayah -->
                                <div class="mb-3">
                                    <label for="wilayah" class="form-label">Wilayah Provinsi Kampus</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                        <select class="form-select" id="wilayah" name="wilayah">
                                            <option selected disabled value="">Wilayah Provinsi Kampus</option>
                                            <?php
                                            $daftar_prov = [
                                                "Nanggroe Aceh Darussalam",
                                                "Sumatera Utara",
                                                "Sumatera Selatan",
                                                "Sumatera Barat",
                                                "Bengkulu",
                                                "Riau",
                                                "Kepulauan Riau",
                                                "Jambi",
                                                "Lampung",
                                                "Bangka Belitung",
                                                "Kalimantan Barat",
                                                "Kalimantan Timur",
                                                "Kalimantan Selatan",
                                                "Kalimantan Tengah",
                                                "Kalimantan Utara",
                                                "Banten",
                                                "DKI Jakarta",
                                                "Jawa Barat",
                                                "Jawa Tengah",
                                                "Daerah Istimewa Yogyakarta",
                                                "Jawa Timur",
                                                "Bali",
                                                "Nusa Tenggara Timur",
                                                "Nusa Tenggara Barat",
                                                "Gorontalo",
                                                "Sulawesi Barat",
                                                "Sulawesi Tengah",
                                                "Sulawesi Utara",
                                                "Sulawesi Tenggara",
                                                "Sulawesi Selatan",
                                                "Maluku Utara",
                                                "Maluku",
                                                "Papua Barat",
                                                "Papua",
                                                "Papua Tengah",
                                                "Papua Pegunungan",
                                                "Papua Selatan",
                                                "Papua Barat Daya"
                                            ];
                                            foreach ($daftar_prov as $prov) {
                                                $sel = set_value('wilayah') == $prov ? 'selected' : '';
                                                echo "<option $sel>$prov</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?= form_error('wilayah', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- Telp -->
                                <div class="mb-3">
                                    <label for="telp" class="form-label">Nomor Whatsapp</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-tty"></i></span>
                                        <input type="text" class="form-control form-control-user" id="telp" name="telp" placeholder="Nomor Whatsapp" value="<?= set_value('telp'); ?>" oninput="formatPhoneNumber()">
                                    </div>
                                    <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <!-- Password -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password1" class="form-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        </div>
                                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password2" class="form-label">Ulangi Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                </div>
                                <!-- Checkbox Syarat -->
                                <small class="d-block mb-2" style="font-style: italic;">Silakan dibaca dan ceklis dua pernyataan di bawah ini:</small>
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="agree_terms" name="agree_terms" required>
                                    <label class="form-check-label" for="agree_terms">
                                        Dengan mendaftar saya bersedia mematuhi <a href="https://spk.or.id/adart" target="_blank">AD/ART</a> Serikat Pekerja Kampus
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="agree_terms2" name="agree_terms2" required>
                                    <label class="form-check-label" for="agree_terms2">
                                        Setelah registrasi dan aktivasi akun, Pendaftaran wajib dilanjutkan dengan mengisi lengkap formulir pendaftaran (setelah login).
                                    </label>
                                </div>
                                <small id="checkboxWarning" class="text-danger d-block mb-3" style="display: none;">
                                    Anda harus mencentang semua pernyataan di atas untuk melanjutkan registrasi akun.
                                </small>
                                <!-- Tombol -->
                                <button type="submit" class="btn btn-primary btn-user btn-block w-100">Registrasi Akun</button>
                                <div class="text-center mt-3">
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
            return false; // Cegah submit
        }
        warningMessage.style.display = "none";
        return true; // Lanjut submit
    }

    function formatPhoneNumber() {
        const input = document.getElementById("telp");
        let phoneNumber = input.value;
        if (phoneNumber.startsWith("0")) {
            phoneNumber = "62" + phoneNumber.slice(1);
            input.value = phoneNumber;
        }
        input.value = phoneNumber.replace(/[^+\d]/g, '');
    }
</script>