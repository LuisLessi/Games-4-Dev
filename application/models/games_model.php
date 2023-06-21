<?php

class Games_model extends CI_Model {

    public function index()
    {
        
        return $this->db->get("tb_games")->result_array();
    }

    public function insert($name, $description, $category, $price, $developer, $user_id)
    {
        $data = array(
            'name' => $name,
            'description' => $description,
            'category' => $category,
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
    
        public function search($searchTerm)
        {
            // Use o termo de pesquisa para buscar jogos no banco de dados
            $this->db->like('name', $searchTerm); // Por exemplo, pesquisar pelo nome do jogo
        
            return $this->db->get('tb_games')->result_array();
        }
        
        public function mygames_index()
		{
			$this->db->where("user_id", $_SESSION["user_data"]["user_id"]);
			$this->db->order_by("id", "DESC");
			return $this->db->get("tb_games")->result_array();
		}

}
