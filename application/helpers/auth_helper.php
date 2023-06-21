<?php

    function permission(){
        $ci = get_instance();
        $loggedUser = $ci->session->userdata("user_data");
        if (!$loggedUser) {
            $ci->session->set_flashdata("danger", "Você precisar estar logado para acessar esta página");
            redirect("login");
        }
        return $loggedUser;
    }