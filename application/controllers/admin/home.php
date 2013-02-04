<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'Admin_model',
            'Member_model'
        ));

        $this->key = $this->config->item('encryption_key');
    }

    public function index()
    {
        $title['title'] = 'Home';
        $dataOptions['header'] = $this->load->view('admin/header', $title, true);
        $dataOptions['menu'] = $this->load->view('admin/menu', null, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);

        $this->load->view('admin/home', $dataOptions);
    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */