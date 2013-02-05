<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->checkLoggedStatus();

        $menuActive = array('mActive' => 'homenav');
        $this->session->set_userdata($menuActive);

        $header['title'] = 'Home';
        $menu['active'] = $this->session->userdata('mActive');
        $header['menu'] = $this->load->view('admin/menu', $menu, true);
        $dataOptions['header'] = $this->load->view('admin/header', $header, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);

        $this->load->view('admin/home', $dataOptions);
    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */