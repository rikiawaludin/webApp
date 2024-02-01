<?php

class DataUser extends CI_Model
{


    function get_user()
    {
        $result = $this->db->get('user');
        return $result;

    }

    public function delete($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('user');
    }

    public function edit( $username, $email, $name, $departemen_id, $role_id, $is_active)
    {
        $data = array(
            'email' => $email,
            'name' => $name,
            'departemen_id' => $departemen_id,
            'role_id' => $role_id,
            'is_active' => $is_active
        );
        $this->db->where('username', $username);
        $this->db->update('user', $data);
    }
}