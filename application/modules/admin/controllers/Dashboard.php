<?php

defined('BASEPATH') or exit ('No direct script access allowed');

class Dashboard extends MX_Controller
{

    public function index()
    {
        $data['konten'] = 'v_dashboard';
        $this->theme->admin_dashboard_theme($data);
    }

}

/* End of file Dashboard.php */
