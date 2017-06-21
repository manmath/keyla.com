<?php

defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MM_Model extends CI_Model
{
    const ORDER_ASCENDING = 'ASC';
    const ORDER_DESCENDING = 'DESC';

    /**
     * @var string
     */
    protected $_entity;

    /**
     * @var array
     */
    protected $_defaultOrdering = [];

    /**
     * @var CI_DB_query_builder
     */
    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->_defaultOrdering = [
            'crdate' => self::ORDER_DESCENDING
        ];
    }

    /**
     * @param array $data
     * @return bool
     */
    public function add($data = [])
    {
        $data['crdate'] = time();
        return $this->db->insert($this->_entity, $data) ? true : false;
    }

    /**
     * @param array $data
     * @param string $wValue
     * @param string $wField
     * @return bool
     */
    public function update($data = [], $wValue = '', $wField = 'id')
    {
        $data['modate'] = time();
        $this->db->where($wField, $wValue);
        return $this->db->update($this->_entity, $data) ? true : false;
    }

    /**
     * @param string $wValue
     * @param string $wField
     * @return bool
     */
    public function remove($wValue = '', $wField = 'id')
    {
        $this->db->where($wField, $wValue);
        return $this->db->delete($this->_entity) ? true : false;
    }
}
