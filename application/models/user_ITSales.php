<?php

class user_ITSales extends CI_Model
{
    function get_userITSales($username, $departemen_id)
    {
        $this->db->where('username', $username);
        $this->db->where('departemen_id', $departemen_id);
        $result = $this->db->get('userproject');
        return $result;

    }
}
