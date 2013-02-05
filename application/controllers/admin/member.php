<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $this->checkLoggedStatus();

        $header['title'] = 'Member - List';
        $header['menu'] = $this->load->view('admin/menu', null, true);
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
        $header['menu'] = $this->load->view('admin/menu', null, true);
        $dataOptions['header'] = $this->load->view('admin/header', $header, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);

        $this->load->view('admin/register', $dataOptions);
    }

}

/* End of file member.php */
/* Location: ./application/controllers/admin/member.php */