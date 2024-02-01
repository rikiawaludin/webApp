<?php
class formSelect extends CI_Model
{
    public function getDataSelectUser()
    {

        $query = $this->db->get('user');
        return $query->result_array();

    }
    public function getSelectProjectId()
    {

        $query = $this->db->get('project');
        return $query->result_array();
    }

    public function getSelectDepartemen()
    {

        $query = $this->db->get('departemen');
        return $query->result_array();
    }

    public function getUserDataByUsername($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->row_array();
    }


}
