<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_model extends CI_Model
{

    // Method untuk insert data ke tabel 'pengaduan'
    public function insert_pengaduan($data)
    {
        return $this->db->insert('pengaduan', $data);
    }

    public function insert_subscribe($data)
    {
        return $this->db->insert('subscribe', $data);
    }
}
