<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function hapus_data($where, $user)
    {
        $this->db->where($where);
        $this->db->delete($user);
    }

    public function getMemberRoleAll()
    {
        $this->db->select('user.*, user_role.role'); // Memilih semua kolom dari tabel user dan kolom 'role' dari tabel user_role
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function update_sejarah($data)
    {
        $this->db->where('id', 1);
        return $this->db->update('mainpage', $data);
    }

    public function update_manifesto($data)
    {
        $this->db->where('id', 1);
        return $this->db->update('mainpage', $data);
    }

    public function update_visimisi($data)
    {
        $this->db->where('id', 1);
        return $this->db->update('mainpage', $data);
    }

    public function update_pengurus($data)
    {
        $this->db->where('id', 1);
        return $this->db->update('mainpage', $data);
    }

    public function update_link($data)
    {
        $this->db->where('id', 1);
        return $this->db->update('mainpage', $data);
    }
}
