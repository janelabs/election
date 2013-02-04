<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    protected $key;

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
        $title['title'] = 'Login';
        $dataOptions['header'] = $this->load->view('admin/header', $title, TRUE);
        $dataOptions['footer'] = $this->load->view('admin/footer', NULL, TRUE);
        $this->load->view('admin/login', $dataOptions);
    }

    /**
     * Verify admin login
     * Uses echo for 'javascript-disabled' browser :)
     */
    public function verify()
    {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        if (!empty($email) && !empty($password)) {
            //check email
            $var = $this->_getData('email_address', $email, 'Member_model');

            //check password
            if ($var) {
                $upass = $this->_getData('member_id', $var->id, 'Admin_model');
                if (!$upass):
                    $this->session->set_flashdata('login_error', "You are not an admin of this site.");
                    redirect('admin/login');
                else:
                    if ($upass->password != md5($password . $this->key)) {
                        $this->session->set_flashdata('login_error', "Incorrect password.");
                        redirect('admin/login');
                    }
                    else {
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
     * @param $col      //name of column
     * @param $val      //value of column
     * @param $model    //model name
     * @return bool|object
     */
    private function _getData($col, $val, $model)
    {
        $where = array($col => $val);
        $var = $this->$model->fetchSingleData(NULL, $where);
        if(! $var) {
            return FALSE;
        }
        return $var;
    }
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */