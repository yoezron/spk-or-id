<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Total anggota (exclude admin role_id = 1)
        $data['total_users'] = $this->db->where('role_id !=', 1)->count_all_results('user');

        // Gender statistics (role_id = 6 adalah member)
        $data['male_count'] = $this->db->where('role_id', 6)->where('gender', 'laki-laki')->count_all_results('user');
        $data['female_count'] = $this->db->where('role_id', 6)->where('gender', 'perempuan')->count_all_results('user');

        // Active vs inactive members
        $data['active_members'] = $this->db->where('is_active', 1)->where('role_id !=', 1)->count_all_results('user');
        $data['inactive_members'] = $this->db->where('is_active', 0)->where('role_id !=', 1)->count_all_results('user');

        // Recent registrations (last 30 days)
        $thirty_days_ago = date('Y-m-d', strtotime('-30 days'));
        $data['new_members_month'] = $this->db->where('date_created >=', $thirty_days_ago)->where('role_id !=', 1)->count_all_results('user');

        // Status kepegawaian breakdown
        $data['status_breakdown'] = $this->db->select('status, COUNT(*) as count')
            ->where('role_id !=', 1)
            ->where('status IS NOT NULL')
            ->group_by('status')
            ->order_by('count', 'DESC')
            ->limit(5)
            ->get('user')->result_array();

        // Top kampus dengan anggota terbanyak
        $data['top_kampus'] = $this->db->select('kampus, COUNT(*) as count')
            ->where('role_id !=', 1)
            ->where('kampus IS NOT NULL')
            ->group_by('kampus')
            ->order_by('count', 'DESC')
            ->limit(5)
            ->get('user')->result_array();

        // Recent members (last 10)
        $data['recent_members'] = $this->db->select('id, name, email, kampus, date_created')
            ->where('role_id !=', 1)
            ->order_by('date_created', 'DESC')
            ->limit(10)
            ->get('user')->result_array();

        // Monthly registration trend (last 6 months)
        $data['monthly_trend'] = [];
        for ($i = 5; $i >= 0; $i--) {
            $month_start = date('Y-m-01', strtotime("-$i months"));
            $month_end = date('Y-m-t', strtotime("-$i months"));
            $count = $this->db->where('date_created >=', $month_start)
                ->where('date_created <=', $month_end)
                ->where('role_id !=', 1)
                ->count_all_results('user');

            $data['monthly_trend'][] = [
                'month' => date('M Y', strtotime("-$i months")),
                'count' => $count
            ];
        }

        // Gaji distribution untuk charts
        $data['salary_data'] = $this->db->select('gaji, COUNT(*) as count')
            ->where('role_id !=', 1)
            ->where('gaji IS NOT NULL')
            ->where('gaji > 0')
            ->group_by('gaji')
            ->order_by('gaji', 'ASC')
            ->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Telah Berubah!</div>');
    }

    public function member()
    {
        $data['title'] = 'Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Admin_model');

        $this->db->where('role_id !=', 1);
        $data['member'] = $this->db->get('user')->result_array();
        $data['member'] = $this->Admin_model->getMemberRoleAll();

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
        redirect('admin/member');
    }

    public function mainpage()
    {
        $data['title'] = 'Page Content';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['content'] = $this->db->get('mainpage')->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/content', $data);
        $this->load->view('templates/footer');
    }

    public function update_sejarah()
    {
        // Ambil data dari form POST
        $data = [
            'sej_title' => $this->input->post('sej_title'),
            'sej_content' => $this->input->post('sej_content'),
            'sej_quotes' => $this->input->post('sej_quotes')
        ];

        $this->Admin_model->update_sejarah($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sejarah berhasil diperbarui!</div>');
        redirect('admin/mainpage');

        echo $this->db->last_query(); // Ini hanya untuk debugging, jangan lupa dihapus setelah selesai testing
    }

    public function update_manifesto()
    {
        // Ambil data dari form POST
        $data = [
            'manif_title' => $this->input->post('manif_title'),
            'manif_content' => $this->input->post('manif_content'),
            'manif_quotes' => $this->input->post('manif_quotes')
        ];

        $this->Admin_model->update_manifesto($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Manifesto berhasil diperbarui!</div>');
        redirect('admin/mainpage');
    }
    public function update_vm()
    {
        // Ambil data dari form POST
        $data = [
            'vm_title' => $this->input->post('vm_title'),
            'vm_content' => $this->input->post('vm_content'),
            'vm_quotes' => $this->input->post('vm_quotes')
        ];

        $this->Admin_model->update_visimisi($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Visi Misi berhasil diperbarui!</div>');
        redirect('admin/mainpage');
    }
    public function update_pengurus()
    {
        // Ambil data dari form POST
        $data = [
            'urus_title' => $this->input->post('urus_title'),
            'urus_content' => $this->input->post('urus_content')
        ];

        $this->Admin_model->update_pengurus($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengurus berhasil diperbarui!</div>');
        redirect('admin/mainpage');
    }
    public function update_link()
    {
        // Ambil data dari form POST
        $data = [
            'link_title' => $this->input->post('link_title'),
            'link' => $this->input->post('link')
        ];

        $this->Admin_model->update_link($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Link berhasil diperbarui!</div>');
        redirect('admin/mainpage');
    }
    public function update_about()
    {
        // Ambil data dari form POST
        $data = [
            'about_title' => $this->input->post('about_title'),
            'about_content' => $this->input->post('about_content')
        ];

        $this->Admin_model->update_link($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tentang Kami berhasil diperbarui!</div>');
        redirect('admin/mainpage');
    }
    public function update_publikasi()
    {
        // Ambil data dari form POST
        $data = [
            'publikasi_title' => $this->input->post('publikasi_title'),
            'publikasi' => $this->input->post('publikasi')
        ];

        $this->Admin_model->update_link($data);

        // Redirect atau tampilkan pesan sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Publikasi berhasil diperbarui!</div>');
        redirect('admin/mainpage');
    }
}
