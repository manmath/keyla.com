<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Keyla.Today
 * @copyright   (c) 2017, Man Math
 * @license     http://opensource.org/licenses/MIT
 * @link        http://www.keyla.today/
 * @since       Version 1.0.0
 */
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
    protected $_defaultSettings = [];

    public function __construct()
    {
        $this->_defaultSettings = [
            'order_by' => 'crdate ' . self::ORDER_DESCENDING
        ];
    }

    private function getDefaultSettings()
    {
        foreach ($this->_defaultSettings as $key => $value) {
            $this->db->$key($value);
        }
    }

    /**
     * Retreive all records
     *
     * @return array|null
     */
    public function findAll()
    {
        $this->getDefaultSettings();
        /** @var CI_DB_result $result */
        $result = $this->db->get($this->_entity);
        if ($result->num_rows() > 0) {
            return $result->result_object();
        }
        return null;
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
