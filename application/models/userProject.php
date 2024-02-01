<?php

class userProject extends CI_Model
{
    function get_userProject()
    {
        $result = $this->db->get('userProject');
        return $result;

    }

    function add( $username, $project_id, $departemen_id, $nama_project, $deskripsi)
    {
        $data = array(
            'username' => $username,
            'project_id' => $project_id,
            'departemen_id' => $departemen_id,
            'nama_project' => $nama_project,
            'deskripsi' => $deskripsi

        );
        $this->db->insert('userProject', $data);
    }

    public function delete($id)
    {
        $this->db->where('username', $id);
        $this->db->or_where('id', $id);
        $this->db->delete('userProject');
    }

    public function edit($id, $username, $project_id, $departemen_id, $nama_project, $deskripsi)
    {
        $data = array(
            'username' => $username,
            'project_id' => $project_id,
            'departemen_id' => $departemen_id,
            'nama_project' => $nama_project,
            'deskripsi' => $deskripsi
        );
        $this->db->where('id', $id);
        $this->db->update('userProject', $data);
    }

    
}