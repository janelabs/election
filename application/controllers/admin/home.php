<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "Logged In";
    }

}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */