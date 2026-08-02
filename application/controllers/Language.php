<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language extends MY_Controller
{

    /**
     * Bahasa yang tersedia
     */
    private $available = [
        'indonesia',
        'english'
    ];

    /**
     * Ganti bahasa
     */
    public function change($language = 'indonesia')
    {

        $language = strtolower($language);

        if (!in_array($language, $this->available)) {

            $language = 'indonesia';

        }

        $this->session->set_userdata('site_language', $language);

        if ($this->input->server('HTTP_REFERER')) {

            redirect($this->input->server('HTTP_REFERER'));

        }

        redirect(base_url());

    }

}