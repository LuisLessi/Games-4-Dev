<?php

class Search_model extends CI_Model {

    public function index()
    {
        
        return $this->db->get("tb_games")->result_array();
    }
 
        public function search($searchTerm)
        {
            if (empty($searchTerm)) {
                return array();
            }
            $searchTerm = $this->input->post("busca");
            $this->db->like("name", $searchTerm);
            return $this->db->get("tb_games")->result_array();
        }
        
}
