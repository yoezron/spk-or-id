<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mainpage_model extends CI_Model
{
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
}
