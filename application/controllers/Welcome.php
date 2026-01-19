<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		// Load model pengaduan
		$this->load->model('Welcome_model');
	}

	public function index()
	{

		$data = [
			'title' => 'Beranda',
			'image' => 'beranda'
		];
		$data['all_posts'] = $this->db->get('posting')->result_array();
		$data['total_users'] = $this->db->where('role_id !=', 2)->count_all_results('user');

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/content/beranda', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}

	public function contact()
	{
		$data = [
			'title' => 'Hubungi Kami',
			'image' => 'hubungikami'
		];
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/contact', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}

	public function sejarah()
	{
		$data = [
			'title' => 'Sejarah',
			'image' => 'sejarah'
		];
		$data['content'] = $this->db->get('mainpage')->row_array();
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/sejarah', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}

	public function manifesto()
	{
		$data = [
			'title' => 'Manifesto',
			'image' => 'manifesto'
		];
		$data['content'] = $this->db->get('mainpage')->row_array();
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/manifesto', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}
	public function visimisi()
	{
		$data = [
			'title' => 'Visi Misi',
			'image' => 'visimisi'
		];
		$data['content'] = $this->db->get('mainpage')->row_array();
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/visimisi', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}
	public function adart()
	{
		$data = [
			'title' => 'AD/ART',
			'image' => 'adart'
		];
		$data['content'] = $this->db->get('mainpage')->row_array();
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/adart', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}
	public function pengurus()
	{
		$data = [
			'title' => 'Pengurus Serikat',
			'image' => 'pengurus'
		];
		$data['content'] = $this->db->get('mainpage')->row_array();
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/pengurus', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}
	public function regulasi()
	{
		$data = [
			'title' => 'Regulasi Pekerja Kampus',
			'image' => 'visimisi'
		];
		$data['content'] = $this->db->get('mainpage')->row_array();
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/regulasi', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}
	public function about()
	{
		$data = [
			'title' => 'Tentang Kami',
			'image' => 'about'
		];
		$data['content'] = $this->db->get('mainpage')->row_array();
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/about', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}
	public function publikasi()
	{
		$data = [
			'title' => 'Publikasi SPK',
			'image' => 'publikasi'
		];
		$data['content'] = $this->db->get('mainpage')->row_array();
		$data['all_posts'] = $this->db->get('posting')->result_array();

		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/breadcumb', $data);
		$this->load->view('page/content/publikasi', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}

	public function kirim_pengaduan()
	{

		// Validasi data yang dikirim dari form
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Perihal', 'required');
		$this->form_validation->set_rules('number', 'Nomor HP', 'required');
		$this->form_validation->set_rules('message', 'Pesan', 'required');

		// Jika validasi gagal, kembalikan ke form dengan error
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('page/content/contact'); // Ganti dengan view form pengaduan Anda
		} else {
			// Data valid, ambil data dari form
			$data = array(
				'nama' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'subject' => $this->input->post('subject'),
				'nomor_hp' => $this->input->post('number'),
				'pesan' => $this->input->post('message'),
				'tanggal_pengaduan' => date('Y-m-d H:i:s')
			);

			// Kirim data ke model untuk disimpan
			if ($this->Welcome_model->insert_pengaduan($data)) {
				// Jika berhasil, kirim pesan sukses
				$this->session->set_flashdata('success', 'Pesan Anda berhasil dikirim.');
			} else {
				// Jika gagal, kirim pesan error
				$this->session->set_flashdata('error', 'Gagal mengirim pesan.');
			}
		}
	}
	public function subscribe()
	{

		// Validasi data yang dikirim dari form

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');


		// Jika validasi gagal, kembalikan ke form dengan error
		if ($this->form_validation->run() == FALSE) {
			redirect('/');
		} else {
			// Data valid, ambil data dari form
			$data = array(

				'email' => $this->input->post('email'),
				'tanggal_subs' => date('Y-m-d H:i:s'),
				'tahun' => date('Y')
			);

			// Kirim data ke model untuk disimpan
			if ($this->Welcome_model->insert_subscribe($data)) {
				// Jika berhasil, kirim pesan sukses
				$this->session->set_flashdata('success', 'Email Anda berhasil dikirim.');
				redirect('contact');
			} else {
				// Jika gagal, kirim pesan error
				$this->session->set_flashdata('error', 'Gagal mengirim email.');
			}
		}
	}
	
	public function survei()
{
    $data['title'] = 'Survei Penghasilan Pekerja Kampus';
    $data['image'] = 'about';
    $data['content'] = $this->db->get('mainpage')->row_array(); 
    $data['all_posts'] = $this->db->get('posting')->result_array();
    // Asumsi method get_jenis_pt() ada di model Anda
    $data['jenis_pt_list'] = $this->Welcome_model->get_jenis_pt();
    
    // --- PERHITUNGAN MEDIAN PER KAMPUS ---
    $penghasilan_data = $this->Welcome_model->get_penghasilan_kampus();
    $hasil_median_kampus = [];
    if (!empty($penghasilan_data)) {
        // 1. Kelompokkan nilai THP berdasarkan nama kampus
        $kampus_thp_values = [];
        foreach ($penghasilan_data as $row) {
            $kampus = $row['nama_kampus'];
            $thp = (float)$row['thp_numerik'];
            if (!isset($kampus_thp_values[$kampus])) {
                $kampus_thp_values[$kampus] = [];
            }
            $kampus_thp_values[$kampus][] = $thp;
        }

        // 2. Hitung median untuk setiap kampus
        foreach ($kampus_thp_values as $kampus => $thp_list) {
            // Data sudah diurutkan oleh query di model
            $count = count($thp_list);
            if ($count == 0) continue;

            $middle_index = floor(($count - 1) / 2);
            if ($count % 2 == 1) { // Jumlah ganjil
                $median = $thp_list[$middle_index];
            } else { // Jumlah genap
                $median = ($thp_list[$middle_index] + $thp_list[$middle_index + 1]) / 2;
            }
            $hasil_median_kampus[] = [ 
                'nama_kampus' => $kampus,
                'median_thp'  => $median
            ];
        }
    }
    $data['hasil_median_kampus'] = $hasil_median_kampus;

    // --- PERHITUNGAN MEDIAN NASIONAL ---
    $overall_thp_list = [];
    $overall_median_thp = 0;
    if (!empty($penghasilan_data)) {
        // 1. Kumpulkan semua nilai THP
        foreach ($penghasilan_data as $row) {
            $overall_thp_list[] = (float)$row['thp_numerik'];
        }

        // 2. Hitung median dari daftar gabungan
        if (!empty($overall_thp_list)) {
            sort($overall_thp_list); // Urutkan semua data THP
            $count_overall = count($overall_thp_list);
            $middle_index_overall = floor(($count_overall - 1) / 2);
            if ($count_overall % 2 == 1) {
                $overall_median_thp = $overall_thp_list[$middle_index_overall];
            } else {
                $overall_median_thp = ($overall_thp_list[$middle_index_overall] + $overall_thp_list[$middle_index_overall + 1]) / 2;
            }
        }
    }
    $data['overall_median_thp'] = $overall_median_thp;

    // --- PERHITUNGAN MEDIAN PER JENIS PEKERJA ---
    // Asumsi Anda memiliki method get_penghasilan_by_jenis_pekerja() di model
    $penghasilan_jp_data = $this->Welcome_model->get_penghasilan_by_jenis_pekerja();
    $hasil_median_jenis_pekerja = [];
    if (!empty($penghasilan_jp_data)) {
        // 1. Kelompokkan nilai THP berdasarkan jenis pekerja
        $jp_thp_values = [];
        foreach ($penghasilan_jp_data as $row) {
            $jenis_pekerja_key = $row['jenis_pekerja'];
            $thp_jp = (float)$row['thp_numerik'];
            if (!isset($jp_thp_values[$jenis_pekerja_key])) {
                $jp_thp_values[$jenis_pekerja_key] = [];
            }
            $jp_thp_values[$jenis_pekerja_key][] = $thp_jp;
        }

        // 2. Hitung median untuk setiap jenis pekerja
        foreach ($jp_thp_values as $jenis_pekerja_key => $thp_list_jp) {
            // Data diasumsikan sudah terurut dari model
            $count_jp = count($thp_list_jp);
            if ($count_jp == 0) continue;

            $middle_index_jp = floor(($count_jp - 1) / 2);
            if ($count_jp % 2 == 1) { 
                $median_jp = $thp_list_jp[$middle_index_jp];
            } else { 
                $median_jp = ($thp_list_jp[$middle_index_jp] + $thp_list_jp[$middle_index_jp + 1]) / 2;
            }
            $hasil_median_jenis_pekerja[] = [ 
                'jenis_pekerja' => $jenis_pekerja_key,
                'median_thp'    => $median_jp
            ];
        }
    }
    $data['hasil_median_jenis_pekerja'] = $hasil_median_jenis_pekerja;

    // --- MEMUAT VIEW ---
    $this->load->view('page/head', $data);
    // $this->load->view('page/preloader');
    $this->load->view('page/sidemenu', $data);
    $this->load->view('page/header');
    $this->load->view('page/content/survei', $data);
    $this->load->view('page/cta');
    $this->load->view('page/footer');
}

    public function get_kampus_ajax()
    {
        header('Content-Type: application/json');

        // 1. Ambil parameter dari request GET yang dikirim oleh JavaScript
        $searchTerm = $this->input->get('q');
        $id_jenis_pt = (int) $this->input->get('id_jenis_pt'); // Pastikan dikonversi ke integer

        // 2. Jika id_jenis_pt tidak valid atau tidak ada, jangan proses lebih lanjut
        if ($id_jenis_pt <= 0) {
            echo json_encode(['results' => []]);
            return; // Hentikan eksekusi
        }

        // 3. Panggil model dengan kedua parameter untuk mendapatkan data yang sudah difilter
        $data = $this->Welcome_model->get_list_kampus($searchTerm, $id_jenis_pt);

        // 4. Kembalikan data dalam format JSON
        echo json_encode(['results' => $data]);
    }

    public function proses_survei()
{
    // Pastikan request adalah metode POST
    if ($this->input->server('REQUEST_METHOD') !== 'POST') {
        redirect('survei');
    }

    $this->load->library('form_validation');

    // 1. ATURAN VALIDASI
    // Aturan untuk dropdown
    $this->form_validation->set_rules('id_jenis_pt', 'Jenis Perguruan Tinggi', 'required|integer');
    $this->form_validation->set_rules('id_kampus', 'Nama Kampus', 'required|integer');

    // Aturan untuk input teks
    $this->form_validation->set_rules('nama_pekerja', 'Nama Pekerja', 'required|trim|max_length[150]');
    $this->form_validation->set_rules('nip_nik', 'NIP/NIK', 'required|trim|numeric|max_length[25]');
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|max_length[100]');
    $this->form_validation->set_rules('status_pekerja', 'Status Pekerja', 'required|in_list[Tetap,Kontrak,PNS,Tenaga Kerja Non-PNS,Honorer,Lainnya]');

    // Aturan untuk semua field numerik menggunakan callback
    $numeric_fields = [
        'gaji_pokok', 'tunjangan_lainnya', 'total_penghasilan_bruto', 'total_potongan', 'thp'
    ];
    
    foreach ($numeric_fields as $field) {
        $label = ucwords(str_replace('_', ' ', $field));
        $this->form_validation->set_rules($field, $label, 'required|trim|callback_validate_numeric_format');
    }

    // 2. JALANKAN VALIDASI
    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kembalikan ke halaman survei dengan pesan error.
        // CodeIgniter akan otomatis mengisi kembali nilai form (repopulate) dengan set_value().
        $this->session->set_flashdata('error', validation_errors('<p class="mb-1">', '</p>'));
        $this->survei();
    } else {
        // 3. JIKA VALIDASI BERHASIL
        
        // Dapatkan nama kampus dari ID untuk disimpan
        $id_kampus = $this->input->post('id_kampus');
        $nama_kampus = $this->Welcome_model->get_kampus_name_by_id($id_kampus);

        if (!$nama_kampus) {
            $this->session->set_flashdata('error', 'Terjadi kesalahan: Nama Kampus tidak valid.');
            redirect('survei');
            return;
        }

        // Siapkan data untuk dimasukkan ke database
        $data_insert = [
            'id_jenis_pt'       => $this->input->post('id_jenis_pt'),
            'id_kampus'         => $id_kampus,
            'nama_kampus'       => $nama_kampus,
            'jenis_pekerja'     => $this->input->post('jenis_pekerja'),
            'nama_pekerja'      => $this->input->post('nama_pekerja'),
            'nip_nik'           => $this->input->post('nip_nik'),
            'jabatan'           => $this->input->post('jabatan'),
            'status_pekerja'    => $this->input->post('status_pekerja'),
            
            // Sanitasi semua input numerik sebelum dimasukkan
            'gaji_pokok'        => $this->_sanitize_currency($this->input->post('gaji_pokok')),
            'tunjangan_lainnya' => $this->_sanitize_currency($this->input->post('tunjangan_lainnya')), // Sesuaikan nama kolom DB
            'total_penghasilan_bruto' => $this->_sanitize_currency($this->input->post('total_penghasilan_bruto')),
            'total_potongan'    => $this->_sanitize_currency($this->input->post('total_potongan')),
            'thp_numerik'       => $this->_sanitize_currency($this->input->post('thp')), // Kolom untuk kalkulasi
            'thp'               => 'Rp ' . number_format($this->_sanitize_currency($this->input->post('thp')), 0, ',', '.'), // Kolom untuk display
            'tanggal_submit'        => date('Y-m-d H:i:s')
        ];

        // Masukkan data melalui model
        if ($this->Welcome_model->insert_survei($data_insert)) {
            $this->session->set_flashdata('success', 'Terima kasih! Data survei Anda telah berhasil dikirim.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data survei ke database. Silakan coba lagi.');
        }

        redirect('survei');
    }
}

    public function validate_numeric_format($str) {
if ($str === null || $str === '') {
            // Validasi 'required' akan menangani field yang wajib diisi tapi kosong.
            // Callback ini hanya fokus pada format jika ada nilai.
            // Cek apakah field ini memiliki aturan 'required'.
            // (Catatan: CI 3.x $this->form_validation->get_field_data() mungkin tidak tersedia di semua konteks,
            //  namun logika _sanitize_currency sudah cukup untuk validasi format)
            return TRUE; // Biarkan 'required' rule yang menangani jika kosong tapi wajib
        }

        $cleaned = $this->_sanitize_currency($str);
        if (!is_numeric($cleaned)) {
            $this->form_validation->set_message('validate_numeric_format', 'Input {field} harus berupa angka yang valid (contoh: 1500000 atau 1.500.000).');
            return FALSE;
        }
        return TRUE;
    }

    private function _sanitize_currency($value) {
if ($value === null || trim((string)$value) === '') { 
            return 0; // Kembalikan 0 untuk string kosong atau null
        }
        $cleaned = (string) $value;
        // Hapus semua karakter kecuali digit, koma, dan titik (untuk menangani format internasional dan Indonesia)
        // $cleaned = preg_replace('/[^\d,\.]/', '', $cleaned);

        // Hapus titik sebagai pemisah ribuan
        $cleaned = str_replace('.', '', $cleaned);
        // Ganti koma desimal dengan titik
        $cleaned = str_replace(',', '.', $cleaned);

        if (!is_numeric($cleaned)) {
            // Fallback jika pembersihan standar gagal, coba hanya ambil digit dan satu titik
            $cleaned_fallback = preg_replace('/[^\d\.]/', '', (string)$value); 
            $parts = explode('.', $cleaned_fallback);
            if (count($parts) > 1) {
                $cleaned_fallback = $parts. '.'. implode('', array_slice($parts, 1));
            }
            if (is_numeric($cleaned_fallback)) {
                return (float)$cleaned_fallback;
            }
            return 0; // Jika semua gagal, kembalikan 0
        }
        return (float)$cleaned; // Konversi ke float
    }
    
    public function statistik_upah()
	{
		$data = [
			'title'    => 'Statistik Upah Pekerja Kampus',
			'image'    => 'about'
		];

		// Konten utama
		$data['content']      = $this->db->get('mainpage')->row_array();
		$data['all_posts']    = $this->db->get('posting')->result_array();

		// Helper mapping provinsi -> Highcharts key
		$this->load->helper('provinsi');

		// Statistik nasional
		$nasional = $this->Welcome_model->statistik_upah_nasional();
		$data['median_nasional']    = $nasional['median'];
		$data['mean_nasional']      = $nasional['mean'];
		$data['jumlah_responden']   = $nasional['jumlah'];

		// Statistik lengkap
		$data['per_provinsi']               = $this->Welcome_model->statistik_upah_per_provinsi();
		$data['distribusi_upah']            = $this->Welcome_model->distribusi_upah();
		$data['statistik_gender']           = $this->Welcome_model->statistik_gender();
		$data['statistik_pendidikan']       = $this->Welcome_model->statistik_pendidikan();
		$data['upah_per_gender']            = $this->Welcome_model->statistik_upah_per_gender();
		$data['upah_dosen_vs_tendik']       = $this->Welcome_model->statistik_upah_dosen_vs_tendik();
		$data['upah_per_provinsi_gender']   = $this->Welcome_model->statistik_upah_per_provinsi_gender();
		$data['distribusi_usia']            = $this->Welcome_model->distribusi_usia();
		$data['upah_per_pendidikan']        = $this->Welcome_model->statistik_upah_per_pendidikan();
		$data['upah_per_kepegawaian']       = $this->Welcome_model->statistik_upah_per_kepegawaian();
		$data['distribusi_upah_binned']     = $this->Welcome_model->distribusi_upah_binned();
		$data['distribusi_usia_binned']     = $this->Welcome_model->distribusi_usia_binned();
		$data['distribusi_lama_bekerja_binned'] = $this->Welcome_model->distribusi_lama_bekerja_binned();
		$data['per_kampus']                 = $this->Welcome_model->statistik_upah_per_kampus();
		$data['upah_per_jenis_pt']          = $this->Welcome_model->statistik_upah_per_jenis_pt();
		$data['upah_per_lama_bekerja']      = $this->Welcome_model->statistik_upah_per_lama_bekerja();

	// Urutkan per_kampus berdasarkan median_upah terkecil ke terbesar
		usort($data['per_kampus'], function ($a, $b) {
			return $a['median_upah'] <=> $b['median_upah'];
		});
	
	
		// Data persebaran responden untuk peta
		$per_provinsi = $data['per_provinsi'];
		$peta_data = [];
		foreach ($per_provinsi as $row) {
			$id  = $row['id']; // pastikan sudah ada 'id' di hasil query/model
			$key = get_prov_hckey($id); // mapping helper
			if ($key) {
				$peta_data[] = [
					'hc-key' => $key,
					'value'  => (int)$row['jumlah'],
					'name'   => strtoupper($this->Welcome_model->get_nama_provinsi($id)), // kapital semua
				];
			}
		}
		$data['peta_responden'] = $peta_data;

		// Render view
		$this->load->view('page/head', $data);
		// $this->load->view('page/preloader');
		$this->load->view('page/sidemenu', $data);
		$this->load->view('page/header');
		$this->load->view('page/content/statistik_vupah', $data);
		$this->load->view('page/cta');
		$this->load->view('page/footer');
	}
	
	
	public function jabar()
	{
	
		$this->load->view('jabar/jabarview');
	}

}

