<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
    }


    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['active_tab'] = 'info';

        // Ambil nilai gaji dari pengguna yang sedang login
        $gaji = $data['user']['gaji'];

        // Ambil data iuran sesuai dengan nilai gaji dari tabel "user_iuran"
        $data['iuran'] = $this->db->get_where('user_iuran', ['gaji' => $gaji])->row_array();
        // Ambil peran pengguna yang sedang login
        // Ambil id pengguna
        $user_id = $data['user']['id'];
        $data['peran'] = $this->User_model->getMemberRole($user_id);
        $data['recent_information'] = $this->db->order_by('id', 'DESC')->get('info')->result_array();
        $data['user_posts'] = $this->db->get('posting')->result_array();

        // Tentukan tab aktif

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    // Method untuk menangani tab 'info'
    public function info()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['active_tab'] = 'info';

        // Ambil nilai gaji dari pengguna yang sedang login
        $gaji = $data['user']['gaji'];

        // Ambil data iuran sesuai dengan nilai gaji dari tabel "user_iuran"
        $data['iuran'] = $this->db->get_where('user_iuran', ['gaji' => $gaji])->row_array();
        // Ambil peran pengguna yang sedang login
        // Ambil id pengguna
        $user_id = $data['user']['id'];
        $data['peran'] = $this->User_model->getMemberRole($user_id);
        $data['recent_information'] = $this->db->order_by('id', 'DESC')->get('info')->result_array();
        $data['user_posts'] = $this->db->get('posting')->result_array();

        // Tentukan tab aktif

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    // Method untuk menangani tab 'userdetail'
    public function userdetail()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['active_tab'] = 'userdetail';

        // Ambil nilai gaji dari pengguna yang sedang login
        $gaji = $data['user']['gaji'];

        // Ambil data iuran sesuai dengan nilai gaji dari tabel "user_iuran"
        $data['iuran'] = $this->db->get_where('user_iuran', ['gaji' => $gaji])->row_array();
        // Ambil peran pengguna yang sedang login
        // Ambil id pengguna
        $user_id = $data['user']['id'];
        $data['peran'] = $this->User_model->getMemberRole($user_id);
        $data['recent_information'] = $this->db->order_by('id', 'DESC')->get('info')->result_array();
        $data['user_posts'] = $this->db->get('posting')->result_array();



        // Tentukan tab aktif

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    // Method untuk menangani tab 'settings'
    public function benefit()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['active_tab'] = 'benefit';

        // Ambil nilai gaji dari pengguna yang sedang login
        $gaji = $data['user']['gaji'];

        // Ambil data iuran sesuai dengan nilai gaji dari tabel "user_iuran"
        $data['iuran'] = $this->db->get_where('user_iuran', ['gaji' => $gaji])->row_array();
        // Ambil peran pengguna yang sedang login
        // Ambil id pengguna
        $user_id = $data['user']['id'];
        $data['peran'] = $this->User_model->getMemberRole($user_id);
        $data['recent_information'] = $this->db->order_by('id', 'DESC')->get('info')->result_array();
        $data['user_posts'] = $this->db->get('posting')->result_array();


        // Tentukan tab aktif

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kampus', 'Asal Kampus', 'trim');
        $this->form_validation->set_rules('telp', 'Nomor Whatsapp', 'required|trim');
        $this->form_validation->set_rules('gaji', 'Range Gaji', 'required|trim');
        $this->form_validation->set_rules('employer', 'Pemberi Upah', 'required|trim');
        $this->form_validation->set_rules('wilayah', 'Wilayah Provinsi Kampus', 'required|trim');
        $this->form_validation->set_rules('keahlian', 'Bidang Keahlian', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $update = [
                'name' => $this->input->post('name', true),
                'kampus' => $this->input->post('kampus', true),
                'prodi' => $this->input->post('prodi', true),
                'gender' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat', true),
                'telp' => $this->input->post('telp', true),
                'status' => $this->input->post('status', true),
                'employer' => $this->input->post('employer', true),
                'gaji' => $this->input->post('gaji', true),
                'personal' => $this->input->post('personal', true),
                'keahlian' => $this->input->post('keahlian', true),
                'wilayah' => $this->input->post('wilayah', true),
                'facebook' => $this->input->post('facebook', true),
                'twitter' => $this->input->post('twitter', true),
                'instagram' => $this->input->post('instagram', true),
                'linkedin' => $this->input->post('linkedin', true)
            ];
            $email = $this->input->post('email');

            //gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set($update);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil anda berhasil diubah!</div>');
            redirect('user/edit');
        }
    }

    public function formulir()
    {
        $data['title'] = 'Formulir Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kampus', 'Asal Kampus', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim');
        $this->form_validation->set_rules('telp', 'Nomor Whatsapp', 'required|trim');
        $this->form_validation->set_rules('gaji', 'Range Gaji', 'required|trim');
        $this->form_validation->set_rules('employer', 'Pemberi Upah', 'required|trim');
        $this->form_validation->set_rules('wilayah', 'Wilayah Provinsi Kampus', 'required|trim');
        $this->form_validation->set_rules('personal', 'Motivasi Mendaftar', 'required|trim');
        $this->form_validation->set_rules('keahlian', 'Bidang Keahlian', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/formulir', $data);
            $this->load->view('templates/footer');
        } else {
            $update = [
                'name' => $this->input->post('name', true),
                'kampus' => $this->input->post('kampus', true),
                'prodi' => $this->input->post('prodi', true),
                'gender' => $this->input->post('gender'),
                'alamat' => $this->input->post('alamat', true),
                'telp' => $this->input->post('telp', true),
                'status' => $this->input->post('status', true),
                'employer' => $this->input->post('employer', true),
                'gaji' => $this->input->post('gaji', true),
                'personal' => $this->input->post('personal', true),
                'keahlian' => $this->input->post('keahlian', true),
                'wilayah' => $this->input->post('wilayah', true),
                'facebook' => $this->input->post('facebook', true),
                'twitter' => $this->input->post('twitter', true),
                'instagram' => $this->input->post('instagram', true),
                'linkedin' => $this->input->post('linkedin', true)
            ];
            $email = $this->input->post('email');

            //gambar yang diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set($update);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil mendaftar! Mohon menunggu konfirmasi.</div>');
            redirect('user');
        }
    }

    public function adart()
    {
        $data['title'] = 'AD-ART';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Memuat tampilan PDF Viewer

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/adart', $data);
        $this->load->view('templates/footer');
    }

    public function manifesto()
    {
        $data['title'] = 'Manifesto';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/manifesto', $data);
        $this->load->view('templates/footer');
    }

    public function sejarah()
    {
        $data['title'] = 'Sejarah SPK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/sejarah', $data);
        $this->load->view('templates/footer');
    }

    public function confirm()
    {
        $data['title'] = 'Konfirmasi Calon Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->db->where('role_id =', 2);
        $data['member'] = $this->db->order_by('date_created', 'desc');
        $data['member'] = $this->db->get('user')->result_array();
        $this->db->where('role_id !=', 1);
        $this->db->where('role_id !=', 2);
        $data['active'] = $this->db->get('user')->result_array();
        $data['active'] = $this->User_model->getMemberRoleAnggota();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/confirm', $data);
        $this->load->view('templates/footer');
    }

    public function confirmrole()
    {
        $role_id = $this->input->post('isChecked');
        $role_id = $this->input->post('role_id');
        $user_id = $this->input->post('user_id'); // Mengambil nilai user_id dari AJAX

        $data = ['role_id' => 6];
        $unconfirm = ['role_id' => 2];

        // Update berdasarkan user_id, bukan semua data di tabel user
        $this->db->where('id', $user_id);

        if ($role_id) {
            $this->db->update('user', $data);
        } else {
            $this->db->update('user', $unconfirm);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota berhasil dikonfirmasi!</div>');
    }

    public function changepassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama salah!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
                    redirect('user/changepassword');
                } else {
                    // sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di ubah!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function informasi()
    {
        $data['title'] = 'Informasi Serikat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['recent_information'] = $this->db->order_by('id', 'DESC')->get('info')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/informasi', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Rincian Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('User_model');
        $data['active'] = $this->User_model->getUserById($id);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function bayar()
    {
        $data['title'] = 'Pembayaran Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('User_model');
        $data['total_bayar'] = $this->User_model->saldo();
        $data['pembayaran'] = $this->db->order_by('date_created', 'desc');
        $data['pembayaran'] = $this->db->get('user_bayar')->result_array();
        $data['member'] = $this->db->get('user')->result_array();
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/bayar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'date_created' => time(),
                'bulan' => $this->input->post('bulan'),
                'name' => $this->input->post('name'),
                'jumlah' => $this->input->post('jumlah'),
            ];
            $this->db->insert('user_bayar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran Berhasil Ditambahkan!</div>');
            redirect('user/bayar');
        }
    }

    public function Pdf_Viewer()
    {
        $this->load->view('user/pdf_viewer');
    }

    public function addinfo()
    {
        $data['title'] = 'Tambah Informasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Mengambil semua email dari tabel 'subscribe'
        $this->db->select('email');
        $query = $this->db->get('subscribe');
        $emails = $query->result_array(); // Mendapatkan seluruh row dalam bentuk array

        // Menggabungkan email dengan semicolon
        $email_list = [];
        foreach ($emails as $email) {
            $email_list[] = $email['email']; // Mengambil nilai email
        }

        // Gabungkan semua email dengan semicolon
        $data['subscriber'] = implode('; ', $email_list);


        $this->form_validation->set_rules('info_message', 'Informasi', 'required');
        $data['recent_information'] = $this->db->order_by('id', 'DESC')->get('info')->result_array();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/addinfo', $data);
            $this->load->view('templates/footer');
        } else {
            // Ambil informasi dari form
            $info_message = $this->input->post('info_message');

            // Proses upload file jika dibutuhkan
            $upload_file = $_FILES['info_file']['name'];
            $file_name = ''; // Inisialisasi nama file
            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/img/info/'; // Sesuaikan dengan path penyimpanan file
                $config['max_size'] = 2048; // Ukuran maksimal file (dalam kilobita)

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('info_file')) {
                    $file_info = $this->upload->data();
                    $file_name = $file_info['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    // Tampilkan pesan error jika upload gagal
                    // Misalnya: echo $error;
                }
            }
            $info_title = $this->input->post('info_title');
            // Simpan informasi ke dalam database
            $insert_data = array(
                'judul' => $info_title,
                'info' => $info_message,
                'gambar' => $file_name,
                // Sesuaikan dengan field lain yang ada di tabel database
            );

            $this->db->insert('info', $insert_data); // Sesuaikan dengan nama tabel database
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi berhasil disimpan!</div>');
            redirect('user/addinfo');
            // Redirect atau tampilkan pesan sukses
            // Misalnya: redirect('nama_controller/nama_method_lain');
        }
    }
    // public function deleteinfo()
    // {
    //     $info_id = $this->input->post('info_id');

    //     // Ambil nama file gambar berdasarkan ID sebelum menghapus dari database
    //     $info = $this->db->get_where('info', ['id' => $info_id])->row_array();
    //     $file_path = './assets/img/info/' . $info['gambar'];

    //     // Hapus file gambar jika ada
    //     if (file_exists($file_path)) {
    //         unlink($file_path);
    //     }

    //     // Hapus data dari database berdasarkan ID
    //     $this->db->where('id', $info_id);
    //     $this->db->delete('info');

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi berhasil dihapus!</div>');
    //     redirect('user/addinfo');
    // }
    
    public function deleteinfo()
{
    $info_id = $this->input->post('info_id');

    if (!$info_id) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus informasi! ID tidak ditemukan.</div>');
        redirect('user/addinfo');
        return;
    }

    // Ambil data berdasarkan ID
    $info = $this->db->get_where('info', ['id' => $info_id])->row_array();

    if (!$info) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak ditemukan!</div>');
        redirect('user/addinfo');
        return;
    }

    // Path file gambar
    $file_path = './assets/img/info/' . $info['gambar'];

    // Hapus file jika ada dan tidak null
    if (!empty($info['gambar']) && file_exists($file_path)) {
        unlink($file_path);
    }

    // Hapus data dari database
    $this->db->where('id', $info_id);
    $this->db->delete('info');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi berhasil dihapus!</div>');
    redirect('user/addinfo');
}

    
    
    public function addPost()
    {
        $data['title'] = 'Kirim Tulisan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_posts'] = $this->db->get_where('posting', ['penulis' => $data['user']['name']])->result_array();

        $this->form_validation->set_rules('judul_tulisan', 'Judul Tulisan', 'required');
        $this->form_validation->set_rules('isi_tulisan', 'Isi Tulisan', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan, seperti untuk 'gambar' atau 'tag'

        if ($this->form_validation->run() == false) {
            // Jika validasi form gagal, tampilkan view form
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/addpost', $data);
            $this->load->view('templates/footer');
        } else {
            // Ambil informasi dari form
            $judul_tulisan = $this->input->post('judul_tulisan');
            $slug = url_title($this->input->post('judul_tulisan'), '-', true);
            $isi_tulisan = $this->input->post('isi_tulisan');
            $jenis_tulisan = $this->input->post('jenis_tulisan');
            // Ambil nama penulis dari data user
            $penulis = $data['user']['name']; // Sesuaikan dengan nama kolom yang menyimpan nama user

            // Proses upload file jika dibutuhkan
            $upload_file = $_FILES['gambar']['name'];
            $file_name = ''; // Inisialisasi nama file
            if ($upload_file) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './assets/img/posting/'; // Sesuaikan dengan path penyimpanan file
                $config['max_size'] = 2048; // Ukuran maksimal file (dalam kilobita)

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $file_info = $this->upload->data();
                    $file_name = $file_info['file_name'];
                } else {
                    $error = $this->upload->display_errors();
                    // Tampilkan pesan error jika upload gagal
                    // Misalnya: echo $error;
                }
            }

            // Simpan informasi ke dalam database
            $insert_data = array(
                'judul_tulisan' => $judul_tulisan,
                'isi_tulisan' => $isi_tulisan,
                'jenis_tulisan' => $jenis_tulisan,
                'penulis' => $penulis,
                'gambar' => $file_name,
                'waktu_posting' => date('Y-m-d H:i:s'), // Tambahkan waktu posting saat ini
                'tag' => $this->input->post('tag'), // Sesuaikan dengan nama kolom untuk tag
                'slug' => $slug,
                // Sesuaikan dengan field lain yang ada di tabel database
            );

            $this->db->insert('posting', $insert_data); // Sesuaikan dengan nama tabel database
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tulisan berhasil diposting!</div>');
            redirect('user/addpost');
            // Redirect atau tampilkan pesan sukses
            // Misalnya: redirect('nama_controller/nama_method_lain');
        }
    }

    public function delete_post($slug)
    {
        // Ambil data postingan berdasarkan ID
        $post = $this->db->get_where('posting', ['slug' => $slug])->row_array();

        // Pastikan postingan ditemukan
        if (!$post) {
            // Tampilkan pesan bahwa postingan tslugak ditemukan atau error handling lainnya
            redirect('user/addPost'); // Ganti dengan halaman yang sesuai
        }

        // Hapus file gambar terkait jika ada
        $gambar = $post['gambar'];
        if ($gambar) {
            $path = './assets/img/posting/' . $gambar;
            if (file_exists($path)) {
                unlink($path); // Menghapus file gambar
            }
        }

        // Hapus postingan dari database
        $this->db->where('slug', $slug);
        $this->db->delete('posting');

        // Tampilkan pesan bahwa postingan berhasil dihapus atau redirect ke halaman lain
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Postingan berhasil dihapus.</div>');
        redirect('user/addPost'); // Ganti dengan halaman yang sesuai
    }
    public function updatePost($slug)
    {
        $judul_tulisan = $this->input->post('edit_judul_tulisan');
        $isi_tulisan = $this->input->post('edit_isi_tulisan');

        // Lakukan validasi input jika diperlukan

        $update_data = array(
            'judul_tulisan' => $judul_tulisan,
            'isi_tulisan' => $isi_tulisan,
            // Tambahan field lain yang ingin diubah
        );

        $this->db->where('slug', $slug);
        $this->db->update('posting', $update_data);

        // Set flashdata atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tulisan berhasil diperbarui!</div>');
        redirect('user/addPost'); // Ganti dengan halaman yang sesuai
    }

    public function kartu()
    {
        $data['title'] = 'Kartu Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/kartu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function eliminate()
    {
        $data['title'] = 'Hapus Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('User_model', 'userm');

        $this->db->where('role_id !=', 1);
        $data['member'] = $this->db->get('user')->result_array();
        $data['member'] = $this->User_model->getMemberRoleAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/eliminate', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->load->model('Admin_model'); // Memuat model Admin_model
        $this->Admin_model->hapus_data($where, 'user');

        // Set flashdata atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota Berhasil di Hapus!</div>');
        redirect('user/eliminate');
    }

    public function pengaduan()
    {
        $data['title'] = 'Pengaduan';
        $this->db->order_by('tanggal_pengaduan', 'DESC');
        $data['pengaduan'] = $this->db->get('pengaduan')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/pengaduan', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function download()
    {
        // Ambil data dari model
        $this->load->model('User_model');
        $data = $this->User_model->scrap_anggota();

        // Siapkan header untuk file CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="data_anggota.csv"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Buka output stream
        $output = fopen('php://output', 'w');

        // Tulis header kolom (gunakan semicolon sebagai delimiter)
        fputcsv($output, ['#', 'Nomor Anggota', 'Nama Anggota', 'Email', 'Jenis Kelamin', 'Alamat', 'Nomor Kontak', 'Asal Kampus', 'Wilayah Kampus', 'Status Kerja', 'Pemberi Upah', 'Rentang Gaji', 'Keahlian', 'Motivasi Berserikat'], ';');

        // Tulis data ke dalam CSV
        $i = 1;
        foreach ($data as $row) {
            fputcsv($output, [
                $i++,
                $row['date_created'],
                $row['name'],
                $row['email'],
                $row['gender'],
                $row['alamat'],
                $row['telp'],
                $row['kampus'],
                $row['wilayah'],
                $row['status'],
                $row['employer'],
                $row['gaji'],
                $row['keahlian'],
                $row['personal']
            ], ';'); // Gunakan semicolon sebagai delimiter
        }

        // Tutup output stream
        fclose($output);
        exit();
    }
}
