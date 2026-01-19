<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Ambil nama kampus berdasarkan ID dari tabel kampus.
 * Cache pada request untuk efisiensi.
 * @param int $id_kampus
 * @return string
 */
if (!function_exists('get_kampus_name_by_id')) {
    function get_kampus_name_by_id($id_kampus)
    {
        static $cache = [];
        if (!$id_kampus) return '-';
        if (isset($cache[$id_kampus])) return $cache[$id_kampus];

        $ci = &get_instance();
        $ci->load->database();
        $row = $ci->db->get_where('kampus', ['id' => $id_kampus])->row();
        $cache[$id_kampus] = $row ? $row->nama_pt : $id_kampus;

        return $cache[$id_kampus];
    }
}

/**
 * Ambil nama jenis perguruan tinggi berdasarkan ID dari tabel jenis_pt.
 * Cache pada request untuk efisiensi.
 * @param int $id_jenis_pt
 * @return string
 */
if (!function_exists('get_jenis_pt_name_by_id')) {
    function get_jenis_pt_name_by_id($id_jenis_pt)
    {
        static $cache = [];
        if (!$id_jenis_pt) return '-';
        if (isset($cache[$id_jenis_pt])) return $cache[$id_jenis_pt];

        $ci = &get_instance();
        $ci->load->database();
        $row = $ci->db->get_where('jenis_pt', ['id' => $id_jenis_pt])->row();
        $cache[$id_jenis_pt] = $row ? $row->jenis_pt : $id_jenis_pt;

        return $cache[$id_jenis_pt];
    }
}
