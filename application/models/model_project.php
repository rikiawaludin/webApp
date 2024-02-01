<?php

class model_project extends CI_Model
{
    function get_project()
    {
        $result = $this->db->get('project');
        return $result;

    }

    function add( $nama_project)
    {
        $data = array(
            'nama_project' => $nama_project,
        );
        $this->db->insert('project', $data);
    }

    public function delete($project_id)
    {
        $this->db->where('project_id', $project_id);
        $this->db->delete('project');
    }

    public function edit($project_id, $nama_project)
    {
        $data = array(
            'nama_project' => $nama_project
        );
        $this->db->where('project_id', $project_id);
        $this->db->update('project', $data);
    }
}