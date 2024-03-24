<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ubah_password extends MX_Controller
{

    public function index()
    {
        $data['konten'] = 'v_ubah_password';

        $this->theme->change_password_theme($data);
    }

}
