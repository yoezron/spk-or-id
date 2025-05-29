<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getMemberRole($user_id)
    {
        $this->db->select('user_role.role');
        $this->db->from('user_role');
        $this->db->join('user', 'user.role_id = user_role.id');
        $this->db->where('user.id', $user_id); // Filter berdasarkan id pengguna
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getMemberRoleAll()
    {
        $this->db->select('user.*, user_role.role'); // Memilih semua kolom dari tabel user dan kolom 'role' dari tabel user_role
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getMemberRoleAnggota()
    {
        $this->db->select('user.*, user_role.role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->where_not_in('user.role_id', array(1, 2)); // Menambahkan aturan untuk mengecualikan role_id 1 dan 2
        $query = $this->db->get();

        return $query->result_array();
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

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function saldo()
    {
        $this->db->select_sum('jumlah');
        $query = $this->db->get('user_bayar');
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah;
        } else {
            return 0;
        }
    }

    public function scrap_anggota()
    {
        // Query untuk mengambil semua user yang memiliki role_id bukan 1 atau 2
        $this->db->where_not_in('role_id', [1, 2]);
        $query = $this->db->get('user');

        return $query->result_array();
    }
}
