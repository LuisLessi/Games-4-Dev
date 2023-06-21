<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');

	}

	public function index()
	{
		$data["title"] = "Login";
        $this->load->view('pages/login', $data);
	}

    public function validAccount()
    {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Buscar usuário pelo email
    $user = $this->login_model->get_by_email($email);

    if ($user) {
        // Verificar se a senha fornecida coincide com a senha armazenada
        if (password_verify($password, $user['password'])) {
            // Senha correta, autenticação bem-sucedida
            // Iniciar a sessão e armazenar os dados do usuário
            $userData = array(
                'user_id' => $user['id'],
                'email' => $user['email'],
                'password' => $user['password'],
                'name' => $user['name'],
                'country' => $user['country']
            );
            $this->session->set_userdata('user_data', $userData);

            redirect('dashboard');
        } else {
            // Senha incorreta
            $this->session->set_flashdata('alert', 'Senha incorreta.');
            redirect('login');
        }
    } else {
        // Usuário não encontrado
        $this->session->set_flashdata('alert', 'Usuário não encontrado.');
        redirect('login');
    }
}
       public function logout()
{
    $this->session->unset_userdata('user_data');
    redirect("login");
}


}