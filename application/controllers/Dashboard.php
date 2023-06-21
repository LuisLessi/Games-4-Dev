<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		permission();
		$this->load->model('games_model');
		$data["games"] = $this->games_model->index();
		$data["title"] = "Dashboard";
		
		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
	}

	public function search()
{
    $this->load->model('search_model');
    $data['title'] = 'Pesquisa por: '. $_POST["busca"];

    // Obter o valor da barra de pesquisa
	$searchTerm = $_POST['busca'];

    // Chamar o método de pesquisa no modelo de jogos
    $data['results'] = $this->search_model->search($searchTerm);

    // Carregar as vistas com os resultados da pesquisa
    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav-top', $data);
    $this->load->view('pages/resultado', $data);
    $this->load->view('templates/footer', $data);
    $this->load->view('templates/js', $data);
}

}
