<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'Admin_model'
        ));

    }

    public function index()
    {
        if ($this->session->userdata('auid')) {
            redirect('admin/home');
        }

        $title['title'] = 'Login';
        $dataOptions['header'] = $this->load->view('admin/header', $title, true);
        $dataOptions['footer'] = $this->load->view('admin/footer', null, true);
        $this->load->view('admin/login', $dataOptions);
    }

    /**
     * Verify admin login
     * Uses echo for 'javascript-disabled' browser :)
     */
    public function verify()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        if (!empty($email) && !empty($password)) {
            //check email
            $var = $this->getData('email_address', $email, 'Member_model');

            //check password
            if ($var) {
                $upass = $this->getData('member_id', $var->id, 'Admin_model');
                if (!$upass):
                    $this->session->set_flashdata('login_error', "You are not an admin of this site.");
                    redirect('admin/login');
                else:
                    if ($upass->password != md5($password . $this->key)) {
                        $this->session->set_flashdata('login_error', "Incorrect password.");
                        redirect('admin/login');
                    }
                    else {
                        $this->_setLoggedAccount($upass->member_id);
                        redirect('admin/home');
                    }
                endif;
            }
            else {
                $msg = "Your email isn't registered.";
                $this->session->set_flashdata('login_error', $msg);
                redirect('admin/login');
            }
        }
        else {
            $this->session->set_flashdata('login_error', "Please enter a valid email and/or password.");
            redirect('admin/login');
        }
    }

    /**
     * set admin session
     *
     * @param $uid
     */
    private function _setLoggedAccount($uid)
    {
        $logged_account = array(
            'auid' => md5($uid . $this->key),
            'logged' => true
        );
        $this->session->set_userdata($logged_account);
    }

    /**
     * Destroy sessions
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */