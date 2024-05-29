<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('model_departemen');
        $this->load->model('model_project');
        $this->load->model('DataUser');
        $this->load->model('userProject');
        $this->load->model('formSelect');
        // $this->load->library('dompdf_gen');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $this->load->database(); // Load database
        // Menghitung jumlah baris di tabel "user"
        $jumlah_departemen = $this->db->count_all('departemen');
        $jumlah_project = $this->db->count_all('project');
        $jumlah_pengguna = $this->db->count_all('user');
        $jumlah_userproject = $this->db->count_all('userproject');

        $data['jumlah_departemen'] = $jumlah_departemen;
        $data['jumlah_project'] = $jumlah_project;
        $data['jumlah_pengguna'] = $jumlah_pengguna;
        $data['jumlah_userproject'] = $jumlah_userproject;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function departemen()
    {
        $data['title'] = 'Departemen';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $data['departemen'] = $this->model_departemen->get_departemen();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/departemen', $data);
        $this->load->view('templates/footer');
    }

    public function addDepartemen()
    {
        $nama_departemen = $this->input->post('nama_departemen');

        $this->model_departemen->add($nama_departemen);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil ditambahkan!
        </div>'
        );
        redirect('admin/departemen');
    }

    public function deleteDepartemen()
    {
        $departemen_id = $this->uri->segment(3);
        $this->model_departemen->delete($departemen_id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil dihapus!
        </div>'
        );
        redirect('admin/departemen');
    }

    public function editDepartemen($departemen_id)
    {

        $nama_departemen = $this->input->post('nama_departemen');

        // Panggil fungsi edit pada model untuk menyimpan data yang telah diubah
        $this->model_departemen->edit($departemen_id, $nama_departemen);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>'
        );
        redirect('admin/departemen');
    }

    //Project

    public function project()
    {
        $data['title'] = 'Project';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $data['project'] = $this->model_project->get_project();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/project', $data);
        $this->load->view('templates/footer');

    }

    public function addProject()
    {
        $nama_project = $this->input->post('nama_project');

        $this->model_project->add($nama_project);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil ditambahkan!
        </div>'
        );
        redirect('admin/project');
    }

    public function deleteProject()
    {
        $project_id = $this->uri->segment(3);
        $this->model_project->delete($project_id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil dihapus!
        </div>'
        );
        redirect('admin/project');
    }

    public function editProject($project_id)
    {

        $nama_project = $this->input->post('nama_project');

        // Panggil fungsi edit pada model untuk menyimpan data yang telah diubah
        $this->model_project->edit($project_id, $nama_project);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>'
        );
        redirect('admin/project');
    }

    public function pengguna()
    {
        $data['title'] = 'Pengguna';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $data['user'] = $this->DataUser->get_user();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengguna', $data);
        $this->load->view('templates/footer');

    }

    public function deletePengguna()
    {
        $username = $this->uri->segment(3);
        $this->DataUser->delete($username);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil dihapus!
        </div>'
        );
        redirect('admin/pengguna');
    }

    public function editPengguna($username)
    {

        $email = $this->input->post('email');
        $name = $this->input->post('name');
        $departemen_id = $this->input->post('departemen_id');
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');

        // Panggil fungsi edit pada model untuk menyimpan data yang telah diubah
        $this->DataUser->edit($username, $email, $name, $departemen_id, $role_id, $is_active);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>'
        );
        redirect('admin/pengguna');
    }

    public function userProject()
    {
        $data['title'] = 'User Project';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
                $this->session->userdata('email')
        ])->row_array();

        $data['userProject'] = $this->userProject->get_userProject();

        $this->load->model('formSelect');
        $data['userId'] = $this->formSelect->getDataSelectUser();
        $data['projectId'] = $this->formSelect->getSelectProjectId();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/userProject', $data);
        $this->load->view('templates/footer');
    }

    public function addUserProject()
    {
        $username = $this->input->post('username');
        $project_id = $this->input->post('project_id');
        $departemen_id = $this->input->post('departemen_id');
        $nama_project = $this->input->post('nama_project');
        $deskripsi = $this->input->post('deskripsi');

        $this->userProject->add($username, $project_id, $departemen_id, $nama_project, $deskripsi);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil ditambahkan!
        </div>'
        );
        redirect('admin/userProject');
    }

    public function deleteUserProject()
    {
        $id = $this->uri->segment(3);
        $this->userProject->delete($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil dihapus!
        </div>'
        );
        redirect('admin/userProject');
    }

    public function editUserProject($id)
    {

        $username = $this->input->post('username');
        $project_id = $this->input->post('project_id');
        $departemen_id = $this->input->post('departemen_id');
        $nama_project = $this->input->post('nama_project');
        $deskripsi = $this->input->post('deskripsi');

        $selectedUserData = $this->formSelect->getUserDataByUsername($username);

        // Perbarui departemen_id dengan departemen_id pengguna yang dipilih
        $departemen_id = $selectedUserData['departemen_id'];

        // Panggil fungsi edit pada model untuk menyimpan data yang telah diubah
        $this->userProject->edit($id, $username, $project_id, $departemen_id, $nama_project, $deskripsi);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>'
        );
        redirect('admin/userProject');
    }

    //chart

    public function chart_data()
    {
        $this->load->model('Chart_model');
        $data = $this->Chart_model->chart_database();
        echo json_encode($data);
    }

    public function chart_departemen()
    {
        $this->load->model('Chart_model');
        $data = $this->Chart_model->get_chartDepartemen();
        echo json_encode($data);
    }
    public function chart_project()
    {
        $this->load->model('Chart_model');
        $data = $this->Chart_model->get_chartProject();
        echo json_encode($data);
    }

    //CETAK PDF
    // public function cetakPdfDepartemen()
    // {

    //     $this->load->library('dompdf_gen');


    //     $data['departemen'] = $this->model_departemen->get_departemen();
    //     $this->load->view('Admin/pdfDepartemen', $data);


    //     $paper_size = 'A4';
    //     $orientation = 'potrait';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("Departemen.pdf", array('Attachment' => 0));

    // }
    // public function cetakPdfProject()
    // {

    //     $this->load->library('dompdf_gen');


    //     $data['project'] = $this->model_project->get_project();
    //     $this->load->view('Admin/pdfProject', $data);


    //     $paper_size = 'A4';
    //     $orientation = 'potrait';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("Project.pdf", array('Attachment' => 0));

    // }
    // public function cetakPdfPengguna()
    // {

    //     $this->load->library('dompdf_gen');


    //     $data['user'] = $this->DataUser->get_user();
    //     $this->load->view('Admin/pdfUser', $data);


    //     $paper_size = 'A4';
    //     $orientation = 'potrait';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("Pengguna.pdf", array('Attachment' => 0));

    // }
    // public function cetakPdfUserProject()
    // {

    //     $this->load->library('dompdf_gen');


    //     $data['userProject'] = $this->userProject->get_userProject();
    //     $this->load->view('Admin/pdfUserProject', $data);


    //     $paper_size = 'A4';
    //     $orientation = 'potrait';
    //     $html = $this->output->get_output();
    //     $this->dompdf->set_paper($paper_size, $orientation);

    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("User Project.pdf", array('Attachment' => 0));

    // }
}
