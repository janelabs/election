<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

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
        $header['title'] = 'Member';
        $header['menu'] = $this->load->view('admin/menu', null, true);
        $dataOptions['header'] = $this->load->view('admin/header', $header, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);

        $dataOptions['members'] = $mem = $this->Member_model->fetchData();
        $dataOptions['memcount'] = count($mem);

        $this->load->view('admin/member', $dataOptions);
    }

}

/* End of file member.php */
/* Location: ./application/controllers/admin/member.php */