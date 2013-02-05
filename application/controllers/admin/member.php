<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');

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

    private function validateForm()
    {
        $config = array(
            array(
                'field'   => 'lname',
                'label'   => 'Last Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'fname',
                'label'   => 'First Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'mname',
                'label'   => 'Middle Name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'address',
                'label'   => 'Address',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'mobile_no',
                'label'   => 'Mobile Number',
                'rules'   => 'min_length[11]|numeric'
            ),
            array(
                'field'   => 'eadd',
                'label'   => 'Email Address',
                'rules'   => 'required|valid_email|is_unique[member.email_address]'
            )
        );

        $this->form_validation->set_rules($config);
    }

    public function add()
    {
        $lname = trim($this->input->post('lname', true));
        $fname = trim($this->input->post('fname', true));
        $mname = trim($this->input->post('mname', true));
        $address = trim($this->input->post('address', true));
        $mobile_no = trim($this->input->post('mobile_no', true));
        $eadd = trim($this->input->post('eadd', true));

        $val = array(
            'lname' => $lname,
            'fname' => $fname,
            'mname' => $mname,
            'address' => $address,
            'mobile' => $mobile_no,
            'eadd' => $eadd
        );

        $this->validateForm();
        if ($this->form_validation->run() == false) {
            //prev fields value
            $this->session->set_flashdata($val);
            //error msg
            $this->session->set_flashdata('reg_error', validation_errors());
            redirect('admin/member/register');
        }
    }

}

/* End of file member.php */
/* Location: ./application/controllers/admin/member.php */