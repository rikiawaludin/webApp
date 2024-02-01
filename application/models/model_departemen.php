<?php

class model_departemen extends CI_Model
{
    function get_departemen()
    {
        $result = $this->db->get('departemen');
        return $result;

    }

    function add( $nama_departemen)
    {
        $data = array(
            'nama_departemen' => $nama_departemen
        );
        $this->db->insert('departemen', $data);
    }

    public function delete($departemen_id)
    {
        $this->db->where('departemen_id', $departemen_id);
        $this->db->delete('departemen');
    }

    public function edit($departemen_id, $nama_departemen)
    {
        $data = array(
            'nama_departemen' => $nama_departemen
        );
        $this->db->where('departemen_id', $departemen_id);
        $this->db->update('departemen', $data);
    }
}