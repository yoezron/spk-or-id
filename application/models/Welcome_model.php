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

    /**
     * Menyimpan data survei penghasilan ke database.
     * @param array $data Data survei yang akan disimpan.
     * @return bool True jika berhasil, false jika gagal.
     */
    public function insert_survei($data)
    {
        return $this->db->insert('survei_penghasilan', $data);
    }

    /**
     * Mengambil data penghasilan (nama kampus dan THP numerik) dari database.
     * Data diurutkan berdasarkan nama_kampus dan kemudian thp_numerik
     * untuk mempermudah perhitungan median di sisi PHP.
     * @return array Hasil query.
     */
    public function get_penghasilan_kampus()
    {
        $this->db->select('nama_kampus, thp_numerik');
        $this->db->from('survei_penghasilan');
        $this->db->where('thp_numerik >', 0); // Hanya data THP valid
        $this->db->order_by('nama_kampus', 'ASC');
        $this->db->order_by('thp_numerik', 'ASC');
        $query = $this->db->get();
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
     * Mengambil data penghasilan berdasarkan jenis pekerja untuk perhitungan median.
     * Data diurutkan berdasarkan jenis_pekerja dan kemudian thp_numerik.
     * @return array Hasil query.
     */
    public function get_penghasilan_by_jenis_pekerja()
    {
        $this->db->select('jenis_pekerja, thp_numerik');
        $this->db->from('survei_penghasilan');
        $this->db->where('thp_numerik >', 0); // Hanya data THP valid

        // Inisialisasi $valid_jenis_pekerja.
        // Jika filter berdasarkan jenis pekerja tertentu diperlukan di masa depan,
        // logika untuk mengisi array ini perlu ditambahkan.
        // Saat ini, blok if di bawah tidak akan tereksekusi.
        $valid_jenis_pekerja = array();

        if (!empty($valid_jenis_pekerja)) {
            $this->db->where_in('jenis_pekerja', $valid_jenis_pekerja);
        }
        $this->db->order_by('jenis_pekerja', 'ASC');
        $this->db->order_by('thp_numerik', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // === Helper for median ===
    private function _median($arr)
    {
        sort($arr, SORT_NUMERIC);
        $n = count($arr);
        if ($n == 0) return 0;
        $mid = (int) floor(($n - 1) / 2);
        return ($n % 2) ? $arr[$mid] : ($arr[$mid] + $arr[$mid + 1]) / 2.0;
    }

    public function get_nama_provinsi($id)
    {
        $row = $this->db->get_where('wilayah_provinsi', ['id' => $id])->row();
        return $row ? $row->nama : $id;
    }

    // === Statistik nasional ===
    public function statistik_upah_nasional()
    {
        $this->db->select('thp');
        $q = $this->db->get('survei_upah');
        $vals = array_map('intval', array_column($q->result_array(), 'thp'));
        $jumlah = count($vals);
        return [
            'median' => $jumlah ? $this->_median($vals) : 0,
            'mean' => $jumlah ? array_sum($vals) / $jumlah : 0,
            'jumlah' => $jumlah,
        ];
    }

    // === Statistik per provinsi ===
    public function statistik_upah_per_provinsi()
    {
        $this->db->select('prov, thp');
        $q = $this->db->get('survei_upah');
        $stat = [];
        foreach ($q->result_array() as $row) {
            $stat[$row['prov']]['vals'][] = intval($row['thp']);
        }
        $result = [];
        foreach ($stat as $id => $d) {
            $prov_name = $this->get_nama_provinsi($id);
            $jumlah = count($d['vals']);
            $median = $this->_median($d['vals']);
            $mean = $jumlah ? array_sum($d['vals']) / $jumlah : 0;
            $result[] = [
                'id' => $id,
                'provinsi' => $prov_name,
                'median_upah' => $median,
                'mean_upah' => $mean,
                'jumlah' => $jumlah,
            ];
        }
        
        // *** Urutkan hasil dari median_upah terkecil ***
        usort($result, function ($a, $b) {
            return $a['median_upah'] <=> $b['median_upah'];
        });

        return $result;
    }

    // === Histogram upah ===
    public function distribusi_upah()
    {
        $this->db->select('thp');
        $q = $this->db->get('survei_upah');
        return array_map('intval', array_column($q->result_array(), 'thp'));
    }

    // === Histogram usia ===
    public function distribusi_usia()
    {
        $this->db->select('usia');
        $q = $this->db->get('survei_upah');
        return array_map('intval', array_column($q->result_array(), 'usia'));
    }

    // === Pie Gender ===
    public function statistik_gender()
    {
        $this->db->select('jenis_kelamin, COUNT(*) as jumlah');
        $this->db->group_by('jenis_kelamin');
        $q = $this->db->get('survei_upah');
        $r = [];
        foreach ($q->result_array() as $row) {
            $r[$row['jenis_kelamin']] = (int)$row['jumlah'];
        }
        return $r;
    }

    // === Pie Pendidikan ===
    public function statistik_pendidikan()
    {
        $this->db->select('tingkat_pendidikan, COUNT(*) as jumlah');
        $this->db->group_by('tingkat_pendidikan');
        $q = $this->db->get('survei_upah');
        $r = [];
        foreach ($q->result_array() as $row) {
            $r[$row['tingkat_pendidikan']] = (int)$row['jumlah'];
        }
        return $r;
    }

    // === Bar: Upah per gender ===
    public function statistik_upah_per_gender()
    {
        $this->db->select('jenis_kelamin, thp');
        $query = $this->db->get('survei_upah');
        $result = [];
        foreach ($query->result_array() as $row) {
            $gender = $row['jenis_kelamin'];
            $result[$gender][] = intval($row['thp']);
        }
        $stat = [];
        foreach ($result as $g => $arr) {
            $jumlah = count($arr);
            $stat[] = [
                'jenis_kelamin' => $g,
                'median_upah' => $this->_median($arr),
                'mean_upah'   => $jumlah ? array_sum($arr) / $jumlah : 0,
                'jumlah'      => $jumlah,
            ];
        }
        return $stat;
    }

    // === Bar: Upah dosen vs tendik ===
    public function statistik_upah_dosen_vs_tendik()
    {
        $this->db->select('jenis_pekerjaan, thp');
        $query = $this->db->get('survei_upah');
        $dosen = [];
        $tendik = [];
        foreach ($query->result_array() as $row) {
            if (strpos(strtolower($row['jenis_pekerjaan']), 'dosen') !== false) {
                $dosen[] = intval($row['thp']);
            } else {
                $tendik[] = intval($row['thp']);
            }
        }
        $result = [
            [
                'kategori' => 'Dosen',
                'median_upah' => $this->_median($dosen),
                'mean_upah' => count($dosen) ? array_sum($dosen) / count($dosen) : 0,
                'jumlah' => count($dosen)
            ],
            [
                'kategori' => 'Tenaga Kependidikan',
                'median_upah' => $this->_median($tendik),
                'mean_upah' => count($tendik) ? array_sum($tendik) / count($tendik) : 0,
                'jumlah' => count($tendik)
            ]
        ];
        return $result;
    }

    // === Stacked bar: provinsi x gender ===
    public function statistik_upah_per_provinsi_gender()
    {
        $this->db->select('prov, jenis_kelamin, thp');
        $query = $this->db->get('survei_upah');
        $stat = [];
        foreach ($query->result_array() as $row) {
            $prov = $row['prov'];
            $gender = $row['jenis_kelamin'];
            $stat[$prov][$gender][] = intval($row['thp']);
        }
        $result = [];
        foreach ($stat as $prov_id => $genders) {
            $prov_name = $this->get_nama_provinsi($prov_id);
            foreach ($genders as $gender => $arr) {
                $jumlah = count($arr);
                $result[] = [
                    'provinsi' => $prov_name,
                    'jenis_kelamin' => $gender,
                    'median_upah' => $this->_median($arr),
                    'mean_upah' => $jumlah ? array_sum($arr) / $jumlah : 0,
                    'jumlah' => $jumlah
                ];
            }
        }
        return $result;
    }

    // === Bar: Upah per pendidikan ===
    public function statistik_upah_per_pendidikan()
    {
        $this->db->select('tingkat_pendidikan, thp');
        $q = $this->db->get('survei_upah');
        $stat = [];
        foreach ($q->result_array() as $row) {
            $stat[$row['tingkat_pendidikan']][] = intval($row['thp']);
        }
        $result = [];
        foreach ($stat as $pend => $arr) {
            $jumlah = count($arr);
            $result[] = [
                'pendidikan' => $pend,
                'median_upah' => $this->_median($arr),
                'mean_upah' => $jumlah ? array_sum($arr) / $jumlah : 0,
                'jumlah' => $jumlah
            ];
        }
        return $result;
    }

    // === Bar: Upah per status kepegawaian ===
    public function statistik_upah_per_kepegawaian()
    {
        $this->db->select('status_kepegawaian, thp');
        $q = $this->db->get('survei_upah');
        $stat = [];
        foreach ($q->result_array() as $row) {
            $stat[$row['status_kepegawaian']][] = intval($row['thp']);
        }
        $result = [];
        foreach ($stat as $statpeg => $arr) {
            $jumlah = count($arr);
            $result[] = [
                'status_kepegawaian' => $statpeg,
                'median_upah' => $this->_median($arr),
                'mean_upah' => $jumlah ? array_sum($arr) / $jumlah : 0,
                'jumlah' => $jumlah
            ];
        }
        return $result;
    }

    public function distribusi_upah_binned($bin_size = 1000000, $max_bin = 20000000)
    {
        $this->db->select('thp');
        $q = $this->db->get('survei_upah');
        $bins = [];
        $labels = [];
        $counts = [];

        // Inisialisasi bin
        for ($i = 0; $i < $max_bin; $i += $bin_size) {
            $start = $i;
            $end = $i + $bin_size - 1;
            $label = 'Rp' . number_format($start, 0, ',', '.') . ' - ' . 'Rp' . number_format($end, 0, ',', '.');
            $bins[] = ['min' => $start, 'max' => $end, 'label' => $label];
            $counts[$label] = 0;
            $labels[] = $label;
        }
        // Overflow bin
        $labels[] = 'Rp' . number_format($max_bin, 0, ',', '.') . '+';
        $counts[end($labels)] = 0;

        foreach ($q->result_array() as $row) {
            $val = (int)$row['thp'];
            $found = false;
            foreach ($bins as $b) {
                if ($val >= $b['min'] && $val <= $b['max']) {
                    $counts[$b['label']]++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $counts[end($labels)]++; // Overflow
            }
        }

        return [
            'labels' => $labels,
            'series' => array_values($counts)
        ];
    }

    public function distribusi_usia_binned($bin_size = 5, $max_bin = 65)
    {
        $this->db->select('usia');
        $q = $this->db->get('survei_upah');
        $bins = [];
        $labels = [];
        $counts = [];
        for ($i = 0; $i < $max_bin; $i += $bin_size) {
            $start = $i;
            $end = $i + $bin_size - 1;
            $label = $start . '-' . $end . ' th';
            $bins[] = ['min' => $start, 'max' => $end, 'label' => $label];
            $counts[$label] = 0;
            $labels[] = $label;
        }
        $labels[] = $max_bin . '+ th';
        $counts[end($labels)] = 0;

        foreach ($q->result_array() as $row) {
            $val = (int)$row['usia'];
            $found = false;
            foreach ($bins as $b) {
                if ($val >= $b['min'] && $val <= $b['max']) {
                    $counts[$b['label']]++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $counts[end($labels)]++;
            }
        }

        return [
            'labels' => $labels,
            'series' => array_values($counts)
        ];
    }

    public function distribusi_lama_bekerja_binned($bin_size = 5, $max_bin = 35)
    {
        $this->db->select('tahun_mulai_bekerja');
        $q = $this->db->get('survei_upah');
        $bins = [];
        $labels = [];
        $counts = [];
        $tahun_sekarang = (int)date('Y');

        // Siapkan bin & label
        for ($i = 0; $i < $max_bin; $i += $bin_size) {
            $start = $i;
            $end = $i + $bin_size - 1;
            $label = $start . '-' . $end . ' th';
            $bins[] = ['min' => $start, 'max' => $end, 'label' => $label];
            $counts[$label] = 0;
            $labels[] = $label;
        }
        $labels[] = $max_bin . '+ th';
        $counts[end($labels)] = 0;

        // Hitung lama bekerja & masukkan ke bin
        foreach ($q->result_array() as $row) {
            $tahun_mulai = (int)$row['tahun_mulai_bekerja'];
            if ($tahun_mulai > 0 && $tahun_mulai <= $tahun_sekarang) {
                $lama = $tahun_sekarang - $tahun_mulai;
                $found = false;
                foreach ($bins as $b) {
                    if ($lama >= $b['min'] && $lama <= $b['max']) {
                        $counts[$b['label']]++;
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $counts[end($labels)]++;
                }
            }
        }

        return [
            'labels' => $labels,
            'series' => array_values($counts)
        ];
    }

    public function statistik_upah_per_kampus()
    {
        $this->db->select('id_kampus, thp');
        $q = $this->db->get('survei_upah');
        $stat = [];
        foreach ($q->result_array() as $row) {
            $stat[$row['id_kampus']]['vals'][] = intval($row['thp']);
        }
        $result = [];
        foreach ($stat as $id_kampus => $d) {
            $jumlah = count($d['vals']);
            $median = $this->_median($d['vals']);
            $mean = $jumlah ? array_sum($d['vals']) / $jumlah : 0;
            // Menggunakan get_kampus_name_by_id() untuk ambil nama kampus dari ID
            $nama_kampus = $this->get_kampus_name_by_id($id_kampus);

            $result[] = [
                'nama_kampus' => $nama_kampus,     // <-- nama kampus dalam bentuk teks
                'id_kampus'   => $id_kampus,
                'median_upah' => $median,
                'mean_upah'   => $mean,
                'jumlah'      => $jumlah,
            ];
        }
        // Urutkan berdasarkan median upah terkecil
        usort($result, fn($a, $b) => $a['median_upah'] <=> $b['median_upah']);
        return $result;
    }



    public function statistik_upah_per_jenis_pt()
    {
        $this->db->select('id_jenis_pt, thp');
        $query = $this->db->get('survei_upah');
        $stat = [];
        foreach ($query->result_array() as $row) {
            $stat[$row['id_jenis_pt']][] = intval($row['thp']);
        }

        // Ambil nama jenis PT
        $jenis_pt_list = [];
        $jenis_q = $this->db->get('jenis_pt')->result_array();
        foreach ($jenis_q as $jp) {
            $jenis_pt_list[$jp['id']] = $jp['jenis_pt'];
        }

        $result = [];
        foreach ($stat as $id_jenis_pt => $arr) {
            $jumlah = count($arr);
            $result[] = [
                'jenis_pt' => isset($jenis_pt_list[$id_jenis_pt]) ? $jenis_pt_list[$id_jenis_pt] : $id_jenis_pt,
                'median_upah' => $this->_median($arr),
                'mean_upah' => $jumlah ? array_sum($arr) / $jumlah : 0,
                'jumlah' => $jumlah
            ];
        }
        return $result;
    }

    public function statistik_upah_per_lama_bekerja($bin_size = 5, $max_bin = 35)
    {
        $this->db->select('tahun_mulai_bekerja, thp');
        $q = $this->db->get('survei_upah');
        $tahun_sekarang = (int)date('Y');
        $bins = [];
        $labels = [];
        $upah = [];

        // Siapkan bin & label
        for ($i = 0; $i < $max_bin; $i += $bin_size) {
            $start = $i;
            $end = $i + $bin_size - 1;
            $label = $start . '-' . $end . ' th';
            $bins[] = ['min' => $start, 'max' => $end, 'label' => $label];
            $labels[] = $label;
            $upah[$label] = [];
        }
        $labels[] = $max_bin . '+ th';
        $upah[end($labels)] = [];

        // Masukkan upah ke masing-masing bin lama bekerja
        foreach ($q->result_array() as $row) {
            $tahun_mulai = (int)$row['tahun_mulai_bekerja'];
            $thp = (int)$row['thp'];
            if ($tahun_mulai > 0 && $tahun_mulai <= $tahun_sekarang) {
                $lama = $tahun_sekarang - $tahun_mulai;
                $found = false;
                foreach ($bins as $b) {
                    if ($lama >= $b['min'] && $lama <= $b['max']) {
                        $upah[$b['label']][] = $thp;
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $upah[end($labels)][] = $thp;
                }
            }
        }

        // Hitung median & mean per bin
        $result = [
            'labels' => $labels,
            'median' => [],
            'mean' => [],
            'jumlah' => []
        ];
        foreach ($labels as $label) {
            $vals = $upah[$label];
            $n = count($vals);
            $result['median'][] = $n ? $this->_median($vals) : 0;
            $result['mean'][] = $n ? array_sum($vals) / $n : 0;
            $result['jumlah'][] = $n;
        }
        return $result;
    }
}
