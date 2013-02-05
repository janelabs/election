<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $key;

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'Member_model'
        ));

        $this->key = $this->config->item('encryption_key');
    }

    /**
     * Check if logged in
     */
    public function checkLoggedStatus()
    {
        $uid = $this->session->userdata('auid');
        if (empty($uid)) {
            redirect('admin/login');
        }
    }

    /**
     * @param $col      //name of column
     * @param $val      //value of column
     * @param $model    //model name
     * @return bool|object
     */
    public function getData($col, $val, $model)
    {
        $where = array($col => $val);
        $var = $this->$model->fetchSingleData(null, $where);
        if(! $var) {
            return false;
        }
        return $var;
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */