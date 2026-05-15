<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisitorHook {

    public function track()
    {
        $CI =& get_instance();

        $CI->load->model('Visitor_model');
        $CI->load->library('user_agent');

        $data = array(
            'ip_address' => $CI->input->ip_address(),
            'browser'    => $CI->agent->browser(),
            'device'     => $CI->agent->mobile() ? 'Mobile' : 'Desktop',
            'os'         => $CI->agent->platform(),
            'halaman'    => current_url(),
            'tanggal'    => date('Y-m-d')
        );

        $CI->Visitor_model->simpan_visitor($data);
    }
}