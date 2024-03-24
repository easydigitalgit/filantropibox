<?php if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Theme
{
    public $CI;

    public function mobile_dashboard_theme($data)
    {
        $CI =& get_instance();

        $data['menu'] = 'view_menu/mobile_menu';

        $CI->load->view('MobileDashboard', $data);
    }

    public function admin_dashboard_theme($data)
    {
        $CI =& get_instance();

        $data['menu'] = 'view_menu/admin_menu';

        $CI->load->view('AdminDashboard', $data);
    }
}