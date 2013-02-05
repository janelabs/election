<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $menuActive = array('mActive' => 'membernav');
        $this->session->set_userdata($menuActive);
    }

    public function index()
    {
        $this->checkLoggedStatus();

        $header['title'] = 'Member - List';
        $menu['active'] = $this->session->userdata('mActive');
        $header['menu'] = $this->load->view('admin/menu', $menu, true);
        $dataOptions['header'] = $this->load->view('admin/header', $header, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);

        $dataOptions['members'] = $mem = $this->Member_model->fetchData();
        $dataOptions['memcount'] = count($mem);

        $this->load->view('admin/member', $dataOptions);
    }

    /**
     * view registration form
     */
    public function register()
    {
        $this->checkLoggedStatus();

        $header['title'] = 'Member - Registration';
        $menu['active'] = $this->session->userdata('mActive');
        $header['menu'] = $this->load->view('admin/menu', $menu, true);
        $dataOptions['header'] = $this->load->view('admin/header', $header, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);

        $this->load->view('admin/register', $dataOptions);
    }

}

/* End of file member.php */
/* Location: ./application/controllers/admin/member.php */