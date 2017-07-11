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
    /**
     * @var Userrepository
     */
    public $userRepository;

    /**
     * @var Rolerepository
     */
    public $roleRepository;

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Userrepository' => 'userRepository',
            'Rolerepository' => 'roleRepository'
        ]);
    }

    public function index()
    {
        $this->_data['title'] = $this->lang->line('title_user_list');
        $this->_data['users'] = $this->userRepository->findAll();
        $this->load->view('backend/index.phtml', $this->_data);
    }

    public function add()
    {
        $this->_data['title'] = $this->lang->line('title_user_add');
        $this->validate();
        if ($this->form_validation->run() === false) {
            $this->load->view('backend/index.phtml', $this->_data);
        } else {
            $data = $this->input->post();
            unset($data['con_password']);
            unset($data['save']);
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            $data['slug'] = md5($data['username'] . time());
            if ($this->userRepository->add($data)) {
                redirect('user');
            } else {
                $this->load->view('backend/index.phtml', $this->_data);
            }
        }

    }

    private function validate()
    {
        $config = [
            [
                'field' => 'username',
                'label' => $this->lang->line('username'),
                'rules' => 'trim|required|alpha_dash|is_unique[user.username]'
            ],
            [
                'field' => 'password',
                'label' => $this->lang->line('password'),
                'rules' => 'required|min_length[5]|max_length[16]'
            ],
            [
                'field' => 'con_password',
                'label' => $this->lang->line('con_password'),
                'rules' => 'required|matches[password]'
            ],
            [
                'field' => 'first_name',
                'label' => $this->lang->line('first_name'),
                'rules' => 'trim|alpha'
            ],
            [
                'field' => 'last_name',
                'label' => $this->lang->line('last_name'),
                'rules' => 'trim|alpha'
            ],
            [
                'field' => 'email',
                'label' => $this->lang->line('email'),
                'rules' => 'trim|valid_email|is_unique[user.email]'
            ]
        ];
        $this->form_validation->set_rules($config);
    }
}
