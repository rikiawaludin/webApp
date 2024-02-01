<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DepartemenSales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('user_ITSales');
    }

    public function index()
    {
        $data['title'] = 'Departemen Sales';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('departemenSales/index', $data);
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
        if ($departemen_id == 2) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('departemenSales/userProject', $data);
            $this->load->view('templates/footer');
        }
    }


}