<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lupa_password extends MX_Controller
{

    public function index()
    {
        $data['konten'] = 'v_lupa_password';

        $this->theme->change_password_theme($data);
    }
}
