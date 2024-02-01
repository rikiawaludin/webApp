<?php

class Chart_model extends CI_Model
{

    public function chart_database()
    {
        $result = $this->db->get('userProject')->result_array();
        return $result;

    }

    public function get_chartDepartemen()
    {
        $this->db->select('departemen.nama_departemen, COUNT(user.username) as jumlah_pengguna');
        $this->db->from('departemen');
        $this->db->join('user', 'user.departemen_id = departemen.departemen_id', 'left');
        $this->db->group_by('departemen.departemen_id');
        $result = $this->db->get()->result_array();

        return $result;

    }

    public function get_chartProject()
    {

        $this->db->select('project.nama_project, COUNT(userproject.project_id) as jumlah_userproject');
        $this->db->from('project');
        $this->db->join('userproject', 'userproject.project_id = project.project_id', 'left');
        $this->db->group_by('project.project_id');
        $result = $this->db->get()->result_array();

        return $result;
    }
}