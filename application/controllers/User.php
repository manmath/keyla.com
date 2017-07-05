<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Keyla.Today
 * @copyright   (c) 2017, Man Math
 * @license     http://opensource.org/licenses/MIT
 * @link        http://www.keyla.today/
 * @since       Version 1.0.0
 */
class User extends MM_Controller
{

    public function index()
    {
        $this->load->view('backend/index.phtml', $this->_data);
    }

    public function add()
    {
        $this->load->view('backend/index.phtml', $this->_data);
    }
}
