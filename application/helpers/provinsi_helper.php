<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('get_prov_hckey')) {
    function get_prov_hckey($id)
    {
        $prov_hckey = [
            '11' => 'id-ac', // Aceh
            '12' => 'id-su', // Sumatera Utara
            '13' => 'id-sb', // Sumatera Barat
            '14' => 'id-ri', // Riau
            '15' => 'id-ja', // Jambi
            '16' => 'id-ss', // Sumatera Selatan
            '17' => 'id-be', // Bengkulu
            '18' => 'id-1024', // Lampung
            '19' => 'id-bb', // Kep. Bangka Belitung
            '21' => 'id-kr', // Kep. Riau
            '31' => 'id-jk', // DKI Jakarta
            '32' => 'id-jr', // Jawa Barat
            '33' => 'id-jt', // Jawa Tengah
            '34' => 'id-yo', // DI Yogyakarta
            '35' => 'id-ji', // Jawa Timur
            '36' => 'id-bt', // Banten
            '51' => 'id-ba', // Bali
            '52' => 'id-nb', // Nusa Tenggara Barat
            '53' => 'id-nt', // Nusa Tenggara Timur
            '61' => 'id-kb', // Kalimantan Barat
            '62' => 'id-kt', // Kalimantan Tengah
            '63' => 'id-ks', // Kalimantan Selatan
            '64' => 'id-ki', // Kalimantan Timur
            '65' => 'id-ku', // Kalimantan Utara
            '71' => 'id-sw', // Sulawesi Utara
            '72' => 'id-st', // Sulawesi Tengah
            '73' => 'id-se', // Sulawesi Selatan
            '74' => 'id-sg', // Sulawesi Tenggara
            '75' => 'id-go', // Gorontalo
            '76' => 'id-sr', // Sulawesi Barat
            '81' => 'id-ma', // Maluku
            '82' => 'id-mu', // Maluku Utara
            '91' => 'id-ib', // Papua Barat
            '94' => 'id-pa', // Papua
        ];
        return $prov_hckey[$id] ?? null;
    }
}

if (!function_exists('get_nama_provinsi')) {
    function get_nama_provinsi($id)
    {
        $ci = &get_instance();
        static $cache = [];
        if (isset($cache[$id])) return $cache[$id];
        $row = $ci->db->get_where('wilayah_provinsi', ['id' => $id])->row();
        $cache[$id] = $row ? $row->nama : $id;
        return $cache[$id];
    }
}
