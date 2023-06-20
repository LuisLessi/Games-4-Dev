<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('games_model');
	}

	public function index()
	{
		
		$data["games"] = $this->games_model->index();
		$data["title"] = "Games";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/games', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
	}

	public function new() 
	{
		$data["title"] = "Games";

		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
	}

	public function insert()
    {
        
        
        // Obtenha os valores dos campos do formulário
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $release_date = $this->input->post('release_date');
        $price = $this->input->post('price');
        $developer = $this->input->post('developer');

		$user_id = 1;

        
        // Chame o método de inserção do model
		$inserted = $this->games_model->insert($name, $description, $release_date, $price, $developer, $user_id);
        
        if ($inserted) {
            // Inserção bem-sucedida, redirecione para a página de jogos
            redirect('games');
        } else {
            // Ocorreu um erro na inserção, você pode lidar com isso de acordo com sua lógica
            echo "Erro ao inserir o jogo.";
        }
	}

	public function edit($id)
	{
		
		$data["game"] = $this->games_model->show($id);
		$data["title"] = "Editar Game";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
	}

	public function update($id)
	{
		$this->load->model("games_model");
		$game = $_POST;
		$this->games_model->update($id, $game);
		redirect('games');
	}

	public function delete($id)
	{
		
		$this->games_model->destroy($id);
		redirect('games');
	}
}
