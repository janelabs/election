<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    protected $key;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

        $this->key = $this->config->item('encryption_key');
    }

    public function index()
    {
        $dataOptions['header'] = $this->load->view('public/header', TRUE);
        $dataOptions['footer'] = $this->load->view('public/footer', TRUE);

        $this->load->view('admin/login', $dataOptions);
    }

    public function verify()
    {

    }
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */