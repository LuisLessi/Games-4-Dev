<?php

class Login_model extends CI_Model {

    public function index()
    {
        
        return $this->db->get("tb_users")->result_array();
    }

        public function get_by_email($email)
    {
        return $this->db->get_where("tb_users", array('email' => $email))->row_array();
    }
    
}
