<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi_email extends MX_Controller
{

    public function index()
    {
        $data['konten'] = 'v_verifikasi_email';

        $this->theme->change_password_theme($data);
    }

}