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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
		$this->load->view('page/preloader');
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
}
