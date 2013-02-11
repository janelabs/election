<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $dataOptions['header'] = $this->load->view('public/header', true);
        $dataOptions['footer'] = $this->load->view('public/footer', true);
        $this->load->view('public/login', $dataOptions);
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */