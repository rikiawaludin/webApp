<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

class DepartemenIT extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('user_ITSales');
        $this->load->model('userProject');
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'Departemen IT';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('departemenIT/index', $data);
        $this->load->view('templates/footer');
    }

    public function userProject()
    {
        $data['title'] = 'User Project';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();
        $departemen_id = $data['user']['departemen_id'];
        $username = $data['user']['username'];
        $data['user_project'] = $this->user_ITSales->get_userITSales($username, $departemen_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('departemenIT/userProject', $data);
        $this->load->view('templates/footer');

    }

    //Kalkulator
    public function Kalkulator()
    {
        $data['title'] = 'Kalkulator';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('departemenIT/kalkulator', $data);
        $this->load->view('templates/footer');
    }

    public function hasilHitung()
    {
        $data['title'] = 'Kalkulator';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $angka1 = $this->input->post('angka1');
        $angka2 = $this->input->post('angka2');
        $pilihOperasi = $this->input->post('pilihOperasi');

        $hasil = 0;
        if ($pilihOperasi == '+') {
            $hasil = $angka1 + $angka2;
        } elseif ($pilihOperasi == '-') {
            $hasil = $angka1 - $angka2;
        } elseif ($pilihOperasi == '*') {
            $hasil = $angka1 * $angka2;
        } elseif ($pilihOperasi == '/') {
            $hasil = $angka1 / $angka2;
        }

        $data['angka1'] = $angka1;
        $data['angka2'] = $angka2;
        $data['pilihOperasi'] = $pilihOperasi;
        $data['hasil'] = $hasil;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('departemenIT/kalkulator', $data);
        $this->load->view('templates/footer');

    }


    // public function cetakPdf()
    // {

    //     $this->load->library('dompdf_gen');

    //     $departemen_id = 1;
    //     $data['user_project'] = $this->user_ITSales->get_userITSales($departemen_id);
    //     $this->load->view('DepartemenIT/test', $data);


    //     $paper_size = 'A4';
    //     $orientation = 'potrait';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("Daftar Project & Penugasan.pdf", array('Attachment' => 0));

    // }

}