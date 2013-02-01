<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super_model extends CI_Model {

    public $table;
    public $tableAlias;

    public function __construct($tbl = '', $alias = '')
    {
        parent::__construct();
        $this->table = $tbl;
        $this->tableAlias = $alias;
    }

    /**
     * Returns all data from a table
     *
     * @return $query
     */
    public function fetchAllData()
    {
        if( ! $query = $this->db->get($this->table)->result()) $query = NULL;
        return $query;
    }

}

/* End of file super_model.php */
/* Location: ./application/models/super_model.php */