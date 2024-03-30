<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'AM');
        $this->AM->user_login() ? '' : $this->AM->logout();
    }

    public function index()
    {
        redirect('admin/dashboard', 'refresh');
    }
}
