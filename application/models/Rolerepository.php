<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Keyla.Today
 * @copyright   (c) 2017, Man Math
 * @license     http://opensource.org/licenses/MIT
 * @link        http://www.keyla.today/
 * @since       Version 1.0.0
 */
class Rolerepository extends MM_Model
{
    protected $_entity = 'role';

    public function __construct()
    {
        parent::__construct();
    }
}