<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->checkLoggedStatus();

        $header['title'] = 'Home';
        $header['menu'] = $this->load->view('admin/menu', null, true);
        $dataOptions['header'] = $this->load->view('admin/header', $header, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);

        $this->load->view('admin/home', $dataOptions);
    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */