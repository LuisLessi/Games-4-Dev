<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index()
	{
		$data["title"] = "Sign-up";
        $this->load->view('pages/signup', $data);
	}

    public function store()
    {
        
        
        // Obtenha os valores dos campos do formulário
        $name = $_POST['name'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $rawPassword = $_POST['password'];
        $password = password_hash($rawPassword, PASSWORD_BCRYPT);

        // Chame o método de inserção do model
		$inserted = $this->users_model->insert($name, $country, $email, $password);
        
        if ($inserted) {
            // Inserção bem-sucedida, redirecione para a página de jogos
            redirect('login');
        } else {
            // Ocorreu um erro na inserção, você pode lidar com isso de acordo com sua lógica
            echo "Erro ao criar conta.";
        }
	}
}