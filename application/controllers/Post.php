<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
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
    public function index()
    {
        $data = [
            'title' => 'Tulisan Serikat Pekerja Kampus',
            'image' => 'about'
        ];
        $data['all_posts'] = $this->db->get('posting')->result_array();


        $this->load->view('page/head', $data);
        $this->load->view('page/preloader');
        $this->load->view('page/sidemenu');
        $this->load->view('page/header');
        $this->load->view('page/breadcumb', $data);
        $this->load->view('post/all_posts', $data);
        $this->load->view('page/cta');
        $this->load->view('page/footer', $data);
    }

    public function view($slug)
    {
        // Ambil semua postingan
        $data['all_posts'] = $this->db->get('posting')->result_array();

        // Ambil postingan berdasarkan ID
        $data['post'] = $this->db->get_where('posting', ['slug' => $slug])->row_array();

        // Periksa apakah data postingan ada
        if ($data['post']) {
            // Atur title berdasarkan judul_tulisan dari posting yang dipilih
            $data['title'] = $data['post']['judul_tulisan'];
            $data['image'] = $data['post']['gambar'];  // Bisa disesuaikan jika perlu

            // Load views dengan data yang benar
            $this->load->view('page/head', $data);
            $this->load->view('page/preloader');
            $this->load->view('page/sidemenu');
            $this->load->view('page/header');
            $this->load->view('page/breadcumb', $data);
            $this->load->view('post/view', $data);
            $this->load->view('page/cta');
            $this->load->view('page/footer', $data);
        } else {
            // Jika postingan tidak ditemukan, tampilkan pesan atau lakukan penanganan lainnya
            echo "Postingan tidak ditemukan";
        }
    }
}
