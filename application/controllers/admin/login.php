<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $dataOptions['header'] = $this->load->view('public/header', TRUE);
        $dataOptions['footer'] = $this->load->view('public/footer', TRUE);

        $dataOptions['data'] = $this->Admin_model->fetchAllData();

        $this->load->view('admin/login', $dataOptions);
    }
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */