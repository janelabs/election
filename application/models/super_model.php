<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super_model extends CI_Model {

    protected $table;
    protected $tableAlias;

    public function __construct($tbl = '', $alias = '')
    {
        parent::__construct();
        $this->table = $tbl;
        $this->tableAlias = $alias;
    }

    /**
     * Returns data from a table
     * Data: All or specific (based on given select and where options)
     * Single Table
     *
     * @param array $selectOptions
     * @param string $where
     * @return null|object $query
     */
    public function fetchData($selectOptions = null, $where = null)
    {
        if ($selectOptions) {
            $this->db->select($selectOptions);
        }

        if ($where) {
            $this->db->where($where);
        }

        if( ! $query = $this->db->get($this->table)->result()) $query = null;
        return $query;
    }

    /**
     * Returns data from a table
     * Data: All or specific (based on given select and where options)
     * Single Table
     *
     * @param array $selectOptions
     * @param string $where
     * @return null|object $query
     */
    public function fetchSingleData($selectOptions = null, $where = null)
    {
        if ($selectOptions) {
            $this->db->select($selectOptions);
        }

        if ($where) {
            $this->db->where($where);
        }

        if( ! $query = $this->db->get($this->table)->row()) $query = null;
        return $query;
    }
}

/* End of file super_model.php */
/* Location: ./application/models/super_model.php */