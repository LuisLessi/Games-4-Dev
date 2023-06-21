<?php

class Users_model extends CI_Model {

    public function index()
    {
        
        return $this->db->get("tb_users")->result_array();
    }

    public function insert($name, $country, $email, $password)
    {
        $data = array(
            'name' => $name,
            'country' => $country,
            'email' => $email,
            'password' => $password
        );

        return $this->db->insert("tb_users", $data);
    }

        public function show($id)
        {
            return $this->db->get_where("tb_users", array(
                "id" => $id
            ))->row_array();
        }
    
        public function update($id, $game)
        {
            $this->db->where("id", $id);
            return $this->db->update("tb_users", $game);
        }

        public function destroy($id)
        {
            {
                $this->db->where("id", $id);
                return $this->db->delete("tb_users");
            }
        }

        public function get_by_email($email)
    {
        return $this->db->get_where("tb_users", array('email' => $email))->row_array();
    }
    
}
