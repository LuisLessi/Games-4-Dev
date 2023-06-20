<?php

class Games_model extends CI_Model {

    public function index()
    {
        
        return $this->db->get("tb_games")->result_array();
    }

    public function insert($name, $description, $release_date, $price, $developer, $user_id)
    {
        $data = array(
            'name' => $name,
            'description' => $description,
            'release_date' => $release_date,
            'price' => $price,
            'developer' => $developer,
            'user_id' => $user_id
        );

        return $this->db->insert("tb_games", $data);
    }

        public function show($id)
        {
            return $this->db->get_where("tb_games", array(
                "id" => $id
            ))->row_array();
        }
    
        public function update($id, $game)
        {
            $this->db->where("id", $id);
            return $this->db->update("tb_games", $game);
        }

        public function destroy($id)
        {
            {
                $this->db->where("id", $id);
                return $this->db->delete("tb_games");
            }
        }
    
}
