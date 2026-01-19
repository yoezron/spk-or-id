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
    
    /**
     * Mengambil semua data kampus untuk dropdown.
     * @return array Daftar kampus (id, nama_pt).
     */
    public function get_all_kampus()
    {
        $this->db->select('id, nama_pt');
        $this->db->from('kampus');
        $this->db->order_by('nama_pt', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Mengambil nama kampus berdasarkan ID.
     * @param int $id_kampus ID kampus.
     * @return string|null Nama kampus atau null jika tidak ditemukan.
     */
    public function get_kampus_name_by_id($id_kampus)
    {
        $this->db->select('nama_pt');
        $this->db->from('kampus');
        $this->db->where('id', $id_kampus);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->nama_pt;
        }
        return null;
    }

    /**
     * Mengambil semua data dari tabel jenis_pt.
     * @return array
     */
    public function get_jenis_pt()
    {
        $this->db->order_by('jenis_pt', 'asc');
        $query = $this->db->get('jenis_pt');
        return $query->result_array();
    }

    /**
     * Mengambil daftar kampus untuk Select2, difilter berdasarkan jenis PT dan kata kunci pencarian.
     *
     * @param string $searchTerm   Kata kunci pencarian dari input Select2.
     * @param int    $id_jenis_pt  ID dari jenis perguruan tinggi yang dipilih.
     * @return array
     */
    public function get_list_kampus($searchTerm = "", $id_jenis_pt = 0)
    {
        $this->db->select('kampus.id, kampus.nama_pt as text');
        $this->db->from('kampus');

        // BAGIAN PENTING: Filter berdasarkan id_jenis_pt
        // Query ini HANYA akan menambahkan 'WHERE' jika $id_jenis_pt > 0
        if ($id_jenis_pt > 0) {
            $this->db->where('kampus.id_jenis_pt', $id_jenis_pt);
        }

        // Filter berdasarkan kata kunci pencarian jika ada
        if ($searchTerm != '') {
            $this->db->like('nama_pt', $searchTerm, 'both');
        }

        $this->db->order_by('nama_pt', 'asc');
        $this->db->limit(50);

        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Simpan data survei upah ke tabel `survei_upah`
     *
     * @param  array $data  Array assosiatif field=>value
     * @return bool         TRUE jika berhasil, FALSE jika gagal
     */

    /**
     * (Opsional) Ambil ID dari record terakhir yang di-insert
     *
     * @return int
     */
    public function get_last_insert_id()
    {
        return $this->db->insert_id();
    }

    public function get_survei_by_user($user_id)
    {
        return $this->db->get_where('survei_upah', ['user_id' => $user_id])->row_array();
    }
    public function insert_survei_upah($data)
    {
        $this->db->insert('survei_upah', $data);
        return $this->db->insert_id();
    }
    public function update_survei_upah($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('survei_upah', $data);
        return $this->db->affected_rows();
    }
    
    /**
     * Mengambil semua data survei (untuk data_survei_anggota).
     * @return array
     */
    public function get_all_survei()
    {
        return $this->db->get('survei_upah')->result_array();
    }

    /**
     * Ambil satu survei berdasarkan ID survei (kolom id).
     * @param int $id
     * @return array|null
     */
    public function get_survei_by_id($id)
    {
        return $this->db->get_where('survei_upah', ['id' => $id])->row_array();
    }

    /**
     * Update data survei berdasarkan ID survei.
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update_survei_by_id($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('survei_upah', $data);
    }

    /**
     * Hapus data survei berdasarkan ID survei.
     * @param int $id
     * @return bool
     */
    public function delete_survei_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('survei_upah');
    }
}
