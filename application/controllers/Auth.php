<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $data['all_posts'] = $this->db->get('posting')->result_array();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK - Login Anggota';
            $data['image'] = 'hubungikami';

            $this->load->view('page/head', $data);
            $this->load->view('page/preloader');
            $this->load->view('page/sidemenu');
            $this->load->view('page/header');
            $this->load->view('page/breadcumb', $data);
            $this->load->view('auth/login');
            $this->load->view('page/cta');
            $this->load->view('page/footer');
        } else {
            //validasinya sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $data['all_posts'] = $this->db->get('posting')->result_array();

        //user ditemukan
        if ($user) {
            //user aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id'      => $user['id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']

                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum belum diaktivasi! Silakan cek inbox/folder spam untuk aktivasi</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'valid_email' => 'Email tidak Valid',
                'is_unique' => 'Email ini telah terdaftar'
            ]
        );
        $this->form_validation->set_rules('kampus', 'Kampus', 'required|trim');
        $this->form_validation->set_rules('telp', 'Whatsapp', 'required|trim|numeric|min_length[10]');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('status', 'Status Kepegawaian', 'required|trim');
        $this->form_validation->set_rules('wilayah', 'Wilayah Kampus', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password berbeda!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK - Registrasi Anggota';
            $data['image'] = 'tentangkami';
            $data['all_posts'] = $this->db->get('posting')->result_array();
            $this->load->view('page/head', $data);
            $this->load->view('page/preloader');
            $this->load->view('page/sidemenu');
            $this->load->view('page/header');
            $this->load->view('page/breadcumb', $data);
            $this->load->view('auth/registration');
            $this->load->view('page/cta');
            $this->load->view('page/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'telp' => $this->input->post('telp', true),
                'gender' => $this->input->post('gender', true),
                'status' => $this->input->post('status', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time(),
                'kampus' => htmlspecialchars($this->input->post('kampus', true)),
                'wilayah' => $this->input->post('wilayah', true),
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://www.twitter.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'instagram' => 'https://www.instagram.com/',
                'personal' => 'Hai, saya adalah...'
            ];

            // siapin token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()

            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Terdaftar! Silakan cek email untuk mengaktifkan akun.</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'spkwebadm@gmail.com',
            'smtp_pass' => 'bvgibneyaxlvoyjh',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('spkwebadm@gmail.com', 'Admin Serikat Pekerja Kampus');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun SPK');
            $this->email->message('Klik link berikut ini untuk memverifikasi akun Serikat Pekerja Kampus anda: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi Akun</a> (Mohon login dan mengisi lengkap formulir pendaftaran setelah mengaktivasi akun untuk mendafatar Serikat Pekerja Kampus)');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password Akun SPK');
            $this->email->message('Klik link berikut ini untuk reset password anda: <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' telah aktif! Silakan Login dan mengisi lengkap formulir pendaftaran.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Gagal! Token kadaluarsa!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Gagal! Token anda salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi Akun Gagal! Email anda salah!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Log Out! Selamat Berjuang!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $data['image'] = 'tentangkami';
            $data['all_posts'] = $this->db->get('posting')->result_array();
            $this->load->view('page/head', $data);
            $this->load->view('page/preloader');
            $this->load->view('page/sidemenu');
            $this->load->view('page/header');
            $this->load->view('page/breadcumb', $data);
            $this->load->view('auth/forgotpassword');
            $this->load->view('page/cta');
            $this->load->view('page/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()

                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silakan cek email untuk reset password anda!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar atau belum diaktifkan!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Token salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! Email salah!</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'trim|required|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Ubah Password';
            $data['image'] = 'tentangkami';
            $data['all_posts'] = $this->db->get('posting')->result_array();
            $this->load->view('page/head', $data);
            $this->load->view('page/preloader');
            $this->load->view('page/sidemenu');
            $this->load->view('page/header');
            $this->load->view('page/breadcumb', $data);
            $this->load->view('auth/changepassword');
            $this->load->view('page/cta');
            $this->load->view('page/footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah berhasil di ubah! Silakan Login.</div>');
            redirect('auth');
        }
    }
}
