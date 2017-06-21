<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package     Keyla.Today
 * @copyright   (c) 2017, Man Math
 * @license     http://opensource.org/licenses/MIT
 * @link        http://www.keyla.today/
 * @since       Version 1.0.0
 */
abstract class MM_Controller extends CI_Controller
{
    /**
     * @var array
     */
    protected $_data = [];

    public function __construct()
    {
        parent::__construct();
    }
}
